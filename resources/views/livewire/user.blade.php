<div>
	<h1>Nested Component Component</h1>
    <h3>User Component</h3>
    @foreach($users as $user)
    @livewire('user-list',['user'=>$user])
    @endforeach
    
</div>
