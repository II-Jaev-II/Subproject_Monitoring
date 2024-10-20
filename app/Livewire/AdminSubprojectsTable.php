<?php

namespace App\Livewire;

use App\Models\Subproject;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSubprojectsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $clearances = 'All';
    public $proponent = 'All';
    public $projectType = 'All';
    public $projectCategory = 'All';
    public $inactiveDays = 'All';

    public function render()
    {
        return view('livewire.admin-subprojects-table', [
            'subprojects' => Subproject::search($this->search)
                ->when($this->clearances !== 'All', function ($query) {
                    $query->where('total', $this->clearances);
                })
                ->when($this->proponent !== 'All', function ($query) {
                    $query->where('proponent', $this->proponent);
                })
                ->when($this->projectType !== 'All', function ($query) {
                    $query->where('projectType', $this->projectType);
                })
                ->when($this->projectCategory !== 'All', function ($query) {
                    $query->where('projectCategory', $this->projectCategory);
                })
                ->when($this->inactiveDays !== 'All', function ($query) {
                    $query->where('inactiveDays', '>=', $this->inactiveDays);
                })
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
