<div class="container">
    First Name: {{$first_name}}
    last Name: {{$last_name}}
    <div class="row">
    <div class="md-3">
    Enter Name: <input type="text" wire:model.lazy="first_name" class="form-control" />
    </div>
    <button wire:click='update'>update</button>
    </div>
    
</div>

