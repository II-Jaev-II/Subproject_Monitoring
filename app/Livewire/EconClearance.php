<?php

namespace App\Livewire;

use App\Models\Subproject;
use Livewire\Component;
use Livewire\WithPagination;

class EconClearance extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $validationStatus = '';

    public function render()
    {
        return view('livewire.econ-clearance', [
            'econRecords' => Subproject::search($this->search)
                ->when($this->validationStatus, function ($query) {
                    if ($this->validationStatus === 'Cleared') {
                        $query->where('econ', 'OK');
                    } elseif ($this->validationStatus === 'Not Cleared') {
                        $query->where(function ($q) {
                            $q->where('econ', '!=', 'OK')
                                ->orWhereNull('econ');
                        });
                    }
                })
                ->paginate($this->perPage)
        ]);
    }
}
