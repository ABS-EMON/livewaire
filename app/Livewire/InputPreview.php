<?php

namespace App\Livewire;

use Livewire\Component;

class InputPreview extends Component
{
    public $inputText = '';
    public function render()
    {
        return view('livewire.input-preview');
    }
}