<?php

namespace App\Livewire;

use App\Models\Subproject;
use Livewire\Component;

class ClearancesModal extends Component
{
    public function render()
    {
        return view('livewire.clearances-modal', [
            'subprojects' => Subproject::select('iPLAN')->get()
        ]);
    }
}
