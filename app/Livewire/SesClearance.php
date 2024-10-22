<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subproject;
use Livewire\WithPagination;

class SesClearance extends Component
{

    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $validationStatus = '';

    public function render()
    {
        return view('livewire.ses-clearance', [
            'sesRecords' => Subproject::search($this->search)
                ->when($this->validationStatus, function ($query) {
                    if ($this->validationStatus === 'Cleared') {
                        $query->where('ses', 'OK');
                    } elseif ($this->validationStatus === 'Not Cleared') {
                        $query->where(function ($q) {
                            $q->where('ses', '!=', 'OK')
                                ->orWhereNull('ses');
                        });
                    }
                })
                ->paginate($this->perPage)
        ]);
    }
}
