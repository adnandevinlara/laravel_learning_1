<?php

namespace App\Http\Livewire\Tuts\Crud;

use Livewire\Component;
use Livewire\withPagination;
use App\Tag;
class Index extends Component
{
	use WithPagination;

	public $perPage = 25;
	public $search = '';
	public $orderBy = 'id';
	public $orderAsc = 'true';
    protected $listeners = ['refreshIndex'=>'refresh'];
    public function render()
    {

        return view('livewire.tuts.crud.index',[
        	'tags' => Tag::search($this->search)
        	->orderBy($this->orderBy, $this->orderAsc? 'asc' : 'desc')
        	->paginate($this->perPage)
        ])->layout('layouts.app')->slot('main');
    }

    public function refresh($alert=false,$type=false,$alert_message=null) {
        // dd($alert_message);
        if($alert==true){
            if($type == 'success') {
                notify()->success($alert_message.' ⚡️', 'Congratulations!');
            }elseif($type == 'info') {
                notify()->info($alert_message.' ⚡️', 'Information!');
            }elseif($type == 'warning') {
                notify()->warning($alert_message.' ⚡️', 'oOPS!');
            }
        }

        $this->render();
        
    }
}
