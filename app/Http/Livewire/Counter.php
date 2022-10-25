<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
	public $count = 0;
 
    public function increment()
    {
        $this->count++;
        // return view('livewire.counter');
    }
    public function decrement()
    {
        $this->count--;
        // return view('livewire.counter');
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
