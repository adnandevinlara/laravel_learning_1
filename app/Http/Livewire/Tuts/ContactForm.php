<?php

namespace App\Http\Livewire\Tuts;

use Livewire\Component;

class ContactForm extends Component
{
	public $name;
	public $email;
	public $message;
	protected $rules = [
		'name' => ['required'],
		'email' => ['required','email'],
		'message' => ['required', 'max:10']
	];
    public function render()
    {
        return view('livewire.tuts.contact-form')->layout('layouts.app')->slot('main');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit(){
    	$this->validate();
    	dd('submitted');
    }
}
