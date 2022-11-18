<div class="container">
    
    <div class="row col-lg-12">
    	<div class="col-md-6">
    		<h3>Action in livewire</h3>
    		<livewire:tuts.connect-button />
    		<!-- @include('livewire.tuts.connect-button') -->

    	</div>
	    <div class="col-md-6">
	    	<h3>Data Binding in Livewire</h3>
	    	First Name: <strong>{{$first_name}}</strong>
    		last Name: <strong>{{$last_name}}</strong>
    		<br/>
		    Enter Name: <input type="text" wire:model.lazy="first_name" class="form-control" />
		    <br/>
		    <button class="btn btn-secondary" wire:click='update'>Update</button>
		 </div>
		    
	</div>
    
</div>

