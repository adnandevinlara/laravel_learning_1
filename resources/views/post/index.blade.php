@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-2">
                    	<div class="col">{{ __('User Post Data!') }}</div>
                    	<div class="col"><a href="{{route('post.create')}}" class="btn btn-sm btn-primary float-right">Create post</a></div>
                    </div>
                    
                    <table class="table table-sm">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Image</th>
					      <th scope="col">Title</th>
					      <th scope="col">Auther</th>
					      <th scope="col">Publish date time</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($posts as $index => $post)
					    <tr>
					      <th scope="row">{{$index+1}}</th>
					      <td>
					      	<img src="{{asset('posts/'.$post->image)}}" class="img-thumbnail rounded " width="50" >
					      </td>
					      <td>{{$post->title}}</td>
					      <td>{{$post->auther['name']}}</td>
					      <td>{{date_format($post->created_at,'Y-m-d')}}</td>
					      <td><a href="{{route('post.delete',['id'=>$post->id])}}">Del</a></td>
					    </tr>
					    @endforeach
					    
					  </tbody>
					</table>
					<div class="float-right">
					  {{ $posts->links() }}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection