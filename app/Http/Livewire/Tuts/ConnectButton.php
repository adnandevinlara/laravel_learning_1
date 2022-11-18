<?php

namespace App\Http\Livewire\Tuts;

use Livewire\Component;

class ConnectButton extends Component
{
	public $storeName = 'super sonic';
	public $isOpen = true;
	protected $listeners = ['openStore','postAdded'];
    public function render()
    {
        return view('livewire.tuts.connect-button',[
        	'storeName'=>$this->storeName,
        ])->layout('layouts.app')->slot('main');
    }

    public function connect() {
    	// dd('connected');
    	// $this->emit('openStore');
    	$this->dispatchBrowserEvent('openTheShop');
    	// $this->dispatchBrowserEvent('openStore');
    }
    public function connectMe($first=null,$last=null) {
    	$this->storeName = $first." ".$last;	
    }

    public function openStore() {
    	$this->isOpen = true;
    }


    public function postAdded() {
    	// dd('post added');
    }
}
