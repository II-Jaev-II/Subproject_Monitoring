<?php

namespace App\Livewire;

use App\Models\RpabStatus;
use App\Models\Subproject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RpabTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $userType;

    public function mount()
    {
        $this->userType = Auth::check() ? Auth::user()->userType : null;
    }

    public function render()
    {
        // Modify the query logic
        $subprojects = Subproject::search($this->search)
            ->orderBy('created_at', 'desc')
            ->where(function ($query) {
                $query->where(function ($q) {
                    $q->where('projectType', 'VCRI')->where('total', '>', 5);
                })
                    ->orWhere(function ($q) {
                        $q->where('projectType', '!=', 'VCRI')->where('total', '=', 5);
                    });
            })
            ->paginate($this->perPage);

        $rpabStatuses = RpabStatus::all();

        foreach ($rpabStatuses as $rpabStatus) {
            $rpabStatus->iBuildStatus = in_array($rpabStatus->iBUILD, ['OK', 'Pending', 'Failed']);
            $rpabStatus->iPlanStatus = in_array($rpabStatus->iPLAN, ['OK', 'Pending', 'Failed']);
            $rpabStatus->iReapStatus = in_array($rpabStatus->iREAP, ['OK', 'Pending', 'Failed']);
            $rpabStatus->sesStatus = in_array($rpabStatus->SES, ['OK', 'Pending', 'Failed']);
            $rpabStatus->gguStatus = in_array($rpabStatus->GGU, ['OK', 'Pending', 'Failed']);
            $rpabStatus->econStatus = in_array($rpabStatus->ECON, ['OK', 'Pending', 'Failed']);
        }

        return view('livewire.rpab-table', [
            'subprojects' => $subprojects,
            'rpabStatuses' => $rpabStatuses,
            'userType' => $this->userType,
        ]);
    }
}
