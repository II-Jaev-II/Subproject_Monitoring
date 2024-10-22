<?php

namespace App\Livewire;

use App\Models\Subproject;
use Livewire\Component;
use Livewire\WithPagination;

class GguClearance extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $validationStatus = '';

    public function render()
    {
        return view('livewire.ggu-clearance', [
            'gguRecords' => Subproject::search($this->search)
                ->when($this->validationStatus, function ($query) {
                    if ($this->validationStatus === 'Cleared') {
                        $query->where('ggu', 'OK');
                    } elseif ($this->validationStatus === 'Not Cleared') {
                        $query->where(function ($q) {
                            $q->where('ggu', '!=', 'OK')
                                ->orWhereNull('ggu');
                        });
                    }
                })
                ->paginate($this->perPage)
        ]);
    }
}
