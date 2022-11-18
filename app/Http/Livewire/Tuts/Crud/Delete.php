<?php

namespace App\Http\Livewire\Tuts\Crud;

use Livewire\Component;
use App\Tag;
class Delete extends Component
{
    public $tag_id = null;
	protected $listeners = ['deleteMode'=>'delete','setTagDeleteID'=>'getID'];
    public function render()
    {
        return view('livewire.tuts.crud.delete');
    }
    public function getID($tag_id){
        // dd($tag_id);
        $this->tag_id = $tag_id;
    }
    public function delete($id=null){
        // dd($id);
        // $tag = Tag::where('id',$id)->first();
    	$tag = Tag::where('id',$this->tag_id)->first();
        if($tag){
            $tag->delete();
    	    notify()->success('Record deleted successfully ⚡️', 'Congratulations!');
        }
    	$this->emit('refreshIndex',true,'success','Tag deleted successfuly!');
    	// $this->dispatchBrowserEvent('showToast');

    }
}
