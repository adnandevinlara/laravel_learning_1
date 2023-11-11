@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-2">
                    	<div class="col">{{ __('Create Post!') }}</div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                    		<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    			@csrf
                    			<div class="form-group">
                    				<label>Title</label>
                    				<input type="text" name="title" name="title.." value="{{old('title')}}" class="form-control" />
                    				@error('title')
									    <div class="text-danger">{{ $message }}</div>
									@enderror
                    			</div>
                    			<div class="form-group">
                    				<label>Post image</label>
                    				<input type="file" name="post_image" class="form-control">
                    				@error('post_image')
									    <div class="text-danger">{{ $message }}</div>
									@enderror
                    			</div>
                    			<div class="form-group">
                    				<label>Body</label>
                    				<textarea name="body" placeholder="write you post.." value="{{old('body')}}" class="form-control"></textarea>
                    				@error('body')
									    <div class="text-danger">{{ $message }}</div>
									@enderror
                    			</div>
                    			<div class="form-group">
                    				<input type="submit" name="submit" value="Save" class="btn btn-sm btn-primary">
                    			</div>
                    		</form>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection