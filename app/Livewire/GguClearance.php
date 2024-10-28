<?php

namespace App\Livewire;

use App\Models\Subproject;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class GguClearance extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $validationStatus = '';
    public $userType;

    public function mount()
    {
        $this->userType = Auth::check() ? Auth::user()->userType : null;
    }

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
                ->paginate($this->perPage),
            'userType' => $this->userType
        ]);
    }
}


