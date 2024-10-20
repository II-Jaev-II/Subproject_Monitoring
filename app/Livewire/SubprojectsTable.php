<?php

namespace App\Livewire;

use App\Models\Subproject;
use Livewire\Component;
use Livewire\WithPagination;

class SubprojectsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;

    public function render()
    {
        return view('livewire.subprojects-table', [
            'subprojects' => Subproject::search($this->search)
                ->paginate($this->perPage)
        ]);
    }
}
