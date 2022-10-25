<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Post;
class Posts extends Component
{
    public $posts, $title, $body, $post_id;
    public $updateMode = false;

    public $app_name = "Livewire_App";

    public $message = "this is some message";
    public $counter = 0;
    function updateMessage($prop){
        $this->message = $prop.' This message is updated';
    }
    function mount(){
        $this->app_name = "My_Livewire_App";
    }
    function hydrate(){
        $this->counter++;
    }

    function updated($field){
        
        $this->counter++;
        $this->validateOnly($field,[
            'title' => 'required|min:6',
            'body' => 'required|min:20|max:150',
        ]);
    }

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
        // return view('livewire.posts');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
  
        Post::create($validatedDate);
  
        session()->flash('message', 'Post Created Successfully.');
  
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
            
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;
  
        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // dd($this->title);
  
        $post = Post::find($this->post_id);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
// end post component
