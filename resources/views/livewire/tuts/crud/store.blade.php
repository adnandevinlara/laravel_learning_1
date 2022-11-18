<div class="col-lg-12">
   @php
   $disabled = $errors->any() || empty($this->name) ? true : false;
   @endphp
   <div>
      <!-- Button trigger modal -->
      <button wire:model.click="openModelToCreateTag" wire:loading.attr="disabled" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter">Create New</button>
   </div>
   <div class="col-lg-6">
   </div>
   <!-- Modal -->
   <div class="modal fade" wire:ignore.self id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">New tag</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               @if ($message = Session::get('status'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
               <form wire:submit.prevent="store"  id="tagModelForm">
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" wire:model.debounce.500ms="name" class="form-control" placeholder="Enter tag name" />
                     <small id="name" class="form-text text-muted">Slug of this name will be created automatically.</small>
                     @error('name')<span class="text-danger">{{$message}}</span>@enderror
                  </div>
                  <!-- <button wire:target='store' wire:loading.attr='disabled' type="submit" class="btn btn-sm btn-primary">Submit</button> -->
               </form>
            </div>
            <div class="modal-footer">
               <button wire:click="resetValues" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button wire:targset='store' wire:loading.attr='disabled' type="submit"  class="btn btn-primary" form="tagModelForm">Save</button>
            </div>
         </div>
      </div>
   </div>



</div>