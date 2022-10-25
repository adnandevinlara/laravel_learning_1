<div>
  
    @if (session()->has('message'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ session('message') }}
        </div>
    @endif


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>{{$app_name}}</h1>
  
    @if($updateMode)
        @include('livewire.post_update')
    @else
        @include('livewire.post_create')
    @endif
  
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Body</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>
                <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Data Binding</h1>
    <label>Data</label>
    <input type="text" wire:model="app_name">
    <h1>Actions in livewire</h1>
    <label>{{$message}}</label>
    <p>Hydrate function call automatically : {{$counter}}</p>

    <br>
    <!-- <button type="text" class="btn btn-sm btn-primary" wire:click="updateMessage">Update</button> -->
    <button type="text" class="btn btn-sm btn-primary" wire:click="updateMessage('adnan')">Update</button>
    <button type="text" class="btn btn-sm btn-primary" wire:mouseover="updateMessage('adnan')">Update</button>

    <br>
    <p>Updated function call automatically : {{$counter}}</p>
    <h1>Data Binding with Updated function Hook</h1>
    <label>Data</label>
    <input type="text" wire:model="app_name">

</div>