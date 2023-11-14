<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Support\Str;

use Auth;
class PostController extends Controller
{
    public function index(){
        // https://code.tutsplus.com/gates-and-policies-in-laravel--cms-29780t
    	$posts = Post::with('auther')->whereUserId(Auth::user()->id)->latest()->paginate(10);
    	return view('post.index',compact('posts')); 
    }
    public function viewAny($id){
        $post = Post::findOrFail($id);
        $this->authorize('viewAny',$post);
        return view('post.view', compact('post'));

class PostController extends Controller
{
    public function index(){
    	$posts = Post::with('auther')->latest()->paginate(10);
    	return view('post.index',compact('posts'));

    }
    public function create(){
    	return view('post.create');
    }
    public function store(StorePostRequest $request){

    	$validated_data = $request->validated();
    	$image_name = $this->uploadImage($request);
    	$slug = Str::slug($validated_data['title']);
    	Post::create(
    		$validated_data + [
    		'slug' => $slug,
    		'image' => $image_name,
    		'user_id' => auth()->user()->id
    	]);

    	return redirect(route('post.index'))->with('status','Post created successfully..!');
    }
    public function delete($id){
    	$delete = Post::findOrFail($id);

        // way 1 to check authorize action
        // $this->authorize('view', $delete);
        // way 2 to check authorize action ( get auth user )
        $user = Auth::user();
        if(!$user->can('delete',$delete)) abort(401, 'Unauthorized: You do not have permission to perform this action.');


    	$image_name = $delete->image;
    	if($delete->delete()){
    		if($image_name != null || $image_name != '') $this->deleteImage($image_name);
    	}
    	return redirect(route('post.index'))->with('status','Post deleted successfully..!');

    }
    public function uploadImage($request){
    	// this code will store image in storage/app/posts directory
    	// $image_name = time().'.'.$request->post_image->extension();
    	// $path = $request->file('post_image')->storeAs(
    	// 	'posts',$image_name
    	// );

    	// this code will store image in public/posts directory
    	$image_name = time().'.'.$request->post_image->extension();
    	$request->post_image->move(public_path('posts'),$image_name);

    	return $image_name;
    }
    public function deleteImage($file_name){
    	if (file_exists(public_path('posts/' . $file_name))) {
		    unlink(public_path('posts/' . $file_name));
		}
    }
}
