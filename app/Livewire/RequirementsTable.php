<?php

namespace App\Livewire;

use Livewire\Component;

class RequirementsTable extends Component
{
    public $requirements = [
        ['requirement' => '', 'deadline' => '']
    ];

    public function addRow()
    {
        $this->requirements[] = ['requirement' => '', 'deadline' => ''];
    }

    public function removeRow($index)
    {
        unset($this->requirements[$index]);
        $this->requirements = array_values($this->requirements);
    }

    public function render()
    {
        return view('livewire.requirements-table');
    }
}
