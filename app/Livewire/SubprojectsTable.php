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
        return view('livewire.subprojects-table', [
            'subprojects' => Subproject::search($this->search)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
                'userType' => $this->userType
        ]);
    }
}
