<?php

namespace App\Livewire;

use Livewire\Component;

class VisibilityToggle extends Component
{
    public $isVisible = false;

    public function toggleVisibility()
    {
        $this->isVisible = !$this->isVisible;
    }
    public function render()
    {
        return view('livewire.visibility-toggle');
    }
}