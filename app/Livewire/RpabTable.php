<?php

namespace App\Livewire;

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

        // Update the status flags for the subprojects
        foreach ($subprojects as $subproject) {
            $subproject->iBuildStatus = in_array($subproject->iBUILD, ['OK', 'Pending', 'Failed']);
            $subproject->iPlanStatus = in_array($subproject->iPLAN, ['OK', 'Pending', 'Failed']);
            $subproject->sesStatus = in_array($subproject->ses, ['OK', 'Pending', 'Failed']);
            $subproject->gguStatus = in_array($subproject->ggu, ['OK', 'Pending', 'Failed']);
            $subproject->econStatus = in_array($subproject->econ, ['OK', 'Pending', 'Failed']);
        }

        return view('livewire.rpab-table', [
            'subprojects' => $subprojects,
            'userType' => $this->userType,
        ]);
    }
}
