<div class="col-lg-12">
    <livewire:tuts.crud.store :wire:key="34234" />
    @livewire('tuts.crud.edit', key('edit-tag'.now()))
    @livewire('tuts.crud.delete', key('del-tag'.now()))
    <div class="my-4 mx-2">
    	<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Slug</th>
		      <th scope="col">Created at</th>
		      <th class="text-center" colspan="2">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($tags as $index => $tag)
		  	
		    <tr>
		      <th scope="row">{{$index+1}}</th>
		      <td>{{$tag['name']}}</td>
		      <td>{{$tag['slug']}}</td>
		      <td>{{$tag['created_at']->format('M-d-y')}}</td>
		      <td>
		      	 	<button wire:click="$emit('editMode',{{$tag->id}})" class="btn btn-sm btn-primary">Edit</button>
		      </td>
		      <td>
		      		<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#my-modal"  wire:click="$emit('setTagDeleteID',{{$tag->id}})">Del</a>
		      		<!-- <a class="btn btn-sm btn-danger" wire:click="$emit('deleteMode',{{$tag->id}})">Del</a> -->
		      </td>
		    </tr>
		   
		    @endforeach
		  </tbody>
		</table>
    </div>

    
<!-- 
    <script>
    	Livewire.on('refreshIndex', function(e) { -->
    		@include('notify::messages')
    	<!--});	
    </script>
     -->














<div class="container d-flex justify-content-center">
    <button class="btn btn-danger  d-none" data-toggle="modal" data-target="#my-modal">Confirm Delete</button>
    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">   
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                        <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p><p class="text-muted "> This change will reflect in your portal after an hour.</p>     </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
                            <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button></div><div class="col-auto"><button type="button" class="btn btn-danger px-4" data-dismiss="modal" wire:click="$emit('deleteMode')">Delete</button></div></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>



</div>
