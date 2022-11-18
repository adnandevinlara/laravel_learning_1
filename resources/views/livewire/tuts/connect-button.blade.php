<div>
	<h1 class="h2">Actions in Livewire</h1>
    <button wire:click="connect" class="btn btn-primary btn-md my-2 mx-2">Click Event Button</button>
    <button wire:keydown.enter="connect" class="btn btn-primary btn-md my-2 mx-2">(Keydown + Enter btn) Event Button</button>
    <button wire:keydown.arrow-up="connect" class="btn btn-primary btn-md my-2 mx-2">(Keydown + arrow-up) Event Button</button>
    <button wire:keydown.caps-lock="connect" class="btn btn-primary btn-md my-2 mx-2">(Keydown + CapsLock) Event Button</button>
    <h2>Pass parameters to method</h2>
    My Store Name: <strong>{{$storeName}}</strong>
    <button wire:click="connectMe('adnan','zaib')" class="btn btn-primary btn-md my-2 mx-2">Click Event Button</button>
    <h3>Rerender(Refresh) the component with click</h3>
    <button wire:click="$refresh" class="btn btn-primary btn-md my-2 mx-2">Refresh Component Button</button>
    <h3>Direct bind with property using $set() method</h3>
    <p>Dinding without calling/using method!</p>
    <button wire:click="$set('storeName','Madina Store')" class="btn btn-primary btn-md my-2 mx-2">Direct Bind Button</button>
    <h3>If you want to use boolean event (True/False)</h3>
    <p>Use $toggle()</p>
    Store is <strong>{{$isOpen? 'Open Now' : 'Closed Now'}}</strong>
    <button wire:click="$toggle('isOpen')" class="btn btn-primary btn-md my-2 mx-2">Toggle Button</button>
    <h3>Emit Browser Event on Click</h3>
    <button wire:click="$emit('openStore')" class="btn btn-primary btn-md my-2 mx-2">Emit Event</button>
    monjasrebeldes


    <button wire:click="$emitSelf('postAdded')" class="btn btn-primary btn-md my-2 mx-2">Emit Self</button>
</div>
