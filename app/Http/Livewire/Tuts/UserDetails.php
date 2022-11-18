<?php

namespace App\Http\Livewire\Tuts;

use Livewire\Component;

class UserDetails extends Component
{
    public $first_name="adnan";
    public $last_name;
    public function render()
    {
        return view('livewire.tuts.user-details')->layout('layouts.app')->slot('main');
    }

    public function update(){
        $this->first_name = 'Sahir';
        $this->last_name = 'zaib';
    }
}
