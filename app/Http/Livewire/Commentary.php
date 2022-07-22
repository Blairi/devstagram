<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Commentary extends Component
{

    public $commentary;

    public function render()
    {
        return view('livewire.commentary');
    }
}
