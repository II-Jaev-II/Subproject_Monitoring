<?php

namespace App\Livewire;

use App\Models\Subproject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IReapSubprojectsTable extends Component
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
        $subprojects = Subproject::search($this->search)
            ->orderBy('created_at', 'desc')
            ->where('projectType', 'VCRI')
            ->paginate($this->perPage);

        foreach ($subprojects as $subproject) {
            $subproject->iReapStatus = in_array($subproject->iREAP, ['OK', 'Pending', 'Failed']);
        }

        return view('livewire.ireap-subprojects-table', [
            'subprojects' => $subprojects,
            'userType' => $this->userType,
        ]);
    }
}
