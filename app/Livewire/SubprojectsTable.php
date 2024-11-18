<?php

namespace App\Livewire;

use App\Models\Subproject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SubprojectsTable extends Component
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
            ->paginate($this->perPage);

        foreach ($subprojects as $subproject) {
            $subproject->iBuildStatus = in_array($subproject->iBUILD, ['OK', 'Pending', 'Failed']);
            $subproject->iPlanStatus = in_array($subproject->iPLAN, ['OK', 'Pending', 'Failed']);
            $subproject->sesStatus = in_array($subproject->ses, ['OK', 'Pending', 'Failed']);
            $subproject->gguStatus = in_array($subproject->ggu, ['Passed', 'Pending', 'Failed']);
        }

        return view('livewire.subprojects-table', [
            'subprojects' => $subprojects,
            'userType' => $this->userType,
        ]);
    }
}
