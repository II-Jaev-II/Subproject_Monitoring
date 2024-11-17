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
            // Include records with the selected component or NULL for Pending
            $query->where(function ($q) {
                $q->whereNotNull($this->component)->orWhereNull($this->component);
            });
        }

        // Clearance filter
        if ($this->clearances) {
            if ($this->clearances === 'All') {
                // No additional filter for "All"
            } elseif ($this->clearances === 'OK') {
                // Include records with total = 5
                $query->where('total', '=', 5);
            } elseif ($this->clearances === 'Pending') {
                // Include records with total < 5 and exclude Failed
                $query->where('total', '<', 5)->where(function ($q) {
                    $q->where('iPLAN', '!=', 'Failed')->where('iBUILD', '!=', 'Failed')->where('econ', '!=', 'Failed')->where('SES', '!=', 'Failed')->where('GGU', '!=', 'Failed');
                });
            } elseif ($this->clearances === 'Failed') {
                // Include records where any component has a value of Failed
                $query->where(function ($q) {
                    $q->where('iPLAN', 'Failed')->orWhere('iBUILD', 'Failed')->orWhere('econ', 'Failed')->orWhere('SES', 'Failed')->orWhere('GGU', 'Failed');
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
                $components = ['iPLAN', 'iBUILD', 'econ', 'SES', 'GGU'];

                // Check for "Failed" in components
                foreach ($components as $component) {
                    if ($subproject->{$component} === 'Failed') {
                        $subproject->status = 'Failed';
                        return $subproject;
                    }
                }

                // Check the total column
                if ($subproject->total == 5) {
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
