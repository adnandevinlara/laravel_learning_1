<?php

namespace App\Http\Livewire\Tuts\Crud;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Tag;
class Edit extends Component
{
	public $tag;
	public $name;
	public $openModel = false;
	public $formId;
	protected $listeners = ['editMode'];
	protected $rules = [
		'name' => ['required','unique:tags,name']
	];
	public function mount() {
		
	}
    public function render()
    {
        return view('livewire.tuts.crud.edit',[
        	'tag' => $this->tag,
        	'name' => $this->name,
        	'formId' => $this->formId
        ])->layout('layouts.app')->slot('main');
    }
    public function editMode($id){
    	$this->formId = $id;
    	$this->tag = Tag::where('id',$id)->first();
    	$this->name = $this->tag->name;
    	$this->openModelToUpdateTag();
    }
    public function updated($propertyName) {
    	$this->validateOnly($propertyName);
    }
    public function openModelToUpdateTag() {
    	$this->resetErrorBag();
    	$this->dispatchBrowserEvent('openTagEditModel');
    }
    public function update() {
        $this->validate();
    	Tag::where('id',$this->tag->id)->update([
    		'name' => $this->name,
    		'slug' => Str::slug($this->name)
    	]);

    	
    	$this->reset();
    	$this->dispatchBrowserEvent('closeTagEditModel');
        $this->emit('refreshIndex',true,'info','Tag updated successfuly!');
    }
}
