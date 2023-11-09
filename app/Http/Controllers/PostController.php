<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Support\Str;
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
