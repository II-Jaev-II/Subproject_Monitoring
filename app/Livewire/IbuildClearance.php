<?php

namespace App\Livewire;

use App\Models\Subproject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IbuildClearance extends Component
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
        return view('livewire.ibuild-clearance', [
            'iBuildRecords' => Subproject::search($this->search)
                ->when($this->validationStatus, function ($query) {
                    if ($this->validationStatus === 'Cleared') {
                        $query->where('iBUILD', 'OK');
                    } elseif ($this->validationStatus === 'Not Cleared') {
                        $query->where(function ($q) {
                            $q->where('iBUILD', '!=', 'OK')
                                ->orWhereNull('iBUILD');
                        });
                    }
                })
                ->paginate($this->perPage),
            'userType' => $this->userType
        ]);
    }
}
