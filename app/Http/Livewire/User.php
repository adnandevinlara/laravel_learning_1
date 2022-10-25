<?php

namespace App\Http\Livewire;

use Livewire\Component;

class User extends Component
{
	public $users = ['adnan','ali','Zaib'];
    public function render()
    {
        return view('livewire.user');
    }
}
