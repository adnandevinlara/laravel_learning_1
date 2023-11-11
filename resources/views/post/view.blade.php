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
                    	<div class="col">{{ __('View Post Data!') }}</div>
                    	<div class="col"><a href="{{route('post.create')}}" class="btn btn-sm btn-primary float-right">Create post</a></div>
                    </div>
                    <div class="row mb-2">
                    	<div class="col-12">Title: {{$post->title}}</div>
                    	<div class="col-12">
                    		<p>Post body: {{$post->body}}</p>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection