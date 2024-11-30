<?php

namespace App\Livewire;

use App\Models\Subproject;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSubprojectsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $component = '';
    public $clearances = '';
    public $inactiveDays = '';
    public $perPage = 5;
    public $filtersApplied = false;

    protected $updatesQueryString = [
        'search' => ['except' => ''],
        'component' => ['except' => ''],
        'clearances' => ['except' => ''],
        'inactiveDays' => ['except' => ''],
        'perPage' => ['except' => 5],
    ];

    public function updated()
    {
        $this->filtersApplied = $this->search || $this->component || $this->clearances || $this->inactiveDays;
    }

    public function render()
    {
        $query = Subproject::query();

        // Search filter
        if ($this->search) {
            $query->where('projectName', 'like', '%' . $this->search . '%');
        }

        // Component filter
        if ($this->component && $this->component !== 'All') {
            // Filter by component
            $query->where(function ($q) {
                $q->whereNotNull($this->component)->orWhereNull($this->component);
            });

            // Additional condition for iREAP to filter by projectType
            if ($this->component === 'iREAP') {
                $query->where('projectType', 'VCRI');
            }

            // Filter by clearances for specific component
            if ($this->clearances === 'OK') {
                $query->where($this->component, 'OK')->orWhere($this->component, 'Passed');
            } elseif ($this->clearances === 'Pending') {
                $query->whereNull($this->component)->orWhere($this->component, 'Pending');
            } elseif ($this->clearances === 'Failed') {
                $query->where($this->component, 'Failed');
            }
        }

        // Clearance filter for "All" components
        if ($this->component === 'All') {
            if ($this->clearances === 'OK') {
                $query->where('total', '>=', 5);
            } elseif ($this->clearances === 'Pending') {
                $query->where('total', '<', 5)->where(function ($q) {
                    $q->where('iPLAN', '!=', 'Failed')
                        ->where('iBUILD', '!=', 'Failed')
                        ->where('econ', '!=', 'Failed')
                        ->where('SES', '!=', 'Failed')
                        ->where('GGU', '!=', 'Failed')
                        ->where('iREAP', '!=', 'Failed');
                });
            } elseif ($this->clearances === 'Failed') {
                $query->where(function ($q) {
                    $q->where('iPLAN', 'Failed')
                        ->orWhere('iBUILD', 'Failed')
                        ->orWhere('econ', 'Failed')
                        ->orWhere('SES', 'Failed')
                        ->orWhere('GGU', 'Failed')
                        ->orWhere('iREAP', 'Failed');
                });
            }
        }

        // Inactive Days filter
        if ($this->inactiveDays && $this->inactiveDays !== 'All') {
            $query->where('inactiveDays', '=', $this->inactiveDays);
        }

        // Paginate the results
        $subprojects = $query->paginate($this->perPage);

        // Add "status" calculation to each paginated item
        $subprojects->getCollection()->transform(function ($subproject) {
            if ($this->component === 'All') {
                $components = ['iPLAN', 'iBUILD', 'econ', 'SES', 'GGU', 'iREAP'];

                // Check for "Failed" in components
                foreach ($components as $component) {
                    if ($subproject->{$component} === 'Failed') {
                        $subproject->status = 'Failed';
                        return $subproject;
                    }
                }

                // Check the total column
                if ($subproject->total >= 5) {
                    $subproject->status = 'OK';
                } elseif ($subproject->total < 5) {
                    $subproject->status = 'Pending';
                } else {
                    $subproject->status = 'N/A';
                }
            } else {
                // Specific component logic
                if ($subproject->{$this->component} === null) {
                    $subproject->status = 'Pending';
                } elseif ($subproject->{$this->component} === 'Failed') {
                    $subproject->status = 'Failed';
                } elseif ($subproject->{$this->component} === 'OK' || $subproject->{$this->component} === 'Passed') {
                    $subproject->status = 'OK';
                } else {
                    $subproject->status = 'Pending';
                }
            }

            return $subproject;
        });

        return view('livewire.admin-subprojects-table', [
            'subprojects' => $subprojects,
            'filtersApplied' => $this->filtersApplied,
        ]);
    }
}
