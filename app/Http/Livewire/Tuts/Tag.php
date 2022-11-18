<?php

namespace App\Http\Livewire\Tuts;

use Livewire\Component;

class Tag extends Component
{
    public function render()
    {
        return view('livewire.tuts.tag')->layout('layouts.app')->slot('main');
    }
}
