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

        return view('livewire.rpab-table', [
            'subprojects' => $subprojects,
            'userType' => $this->userType,
        ]);
    }
}
