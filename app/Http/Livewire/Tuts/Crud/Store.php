<?php

namespace App\Http\Livewire\Tuts\Crud;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Tag;
class Store extends Component
{
	public $name;
	public $disabled = false;


    //================================
    public $openModel = false;
	protected $rules = [
		'name' => ['required','unique:tags,name']
	];
    public function render()
    {
        return view('livewire.tuts.crud.store')->layout('layouts.app')->slot('main');
    }

    public function updated($propertyName) {
    	$this->validateOnly($propertyName);
    }
    public function openModelToCreateTag() {
        $this->resetErrorBag();
        $this->openModel = true;
    }
    public function store(){
    	$this->validate();

    	Tag::create([
    		'name' => $this->name,
    		'slug' => Str::slug($this->name)
    	]);
        // session()->flash('message','Tag created Successfully!');
        $this->reset();
        $this->dispatchBrowserEvent('closeTagCreateModel');
        $this->emit('refreshIndex',true,'success','Tag created successfuly!');
    }

    public function resetValues() {
        $this->name = "";
    }


}
