<div class="col-lg-12">
   @php
   $disabled = $errors->any() || empty($this->tag->name) ? true : false;
   @endphp
   <div class="d-none">
      <!-- Button trigger modal -->
      <button wire:model.click="openModelToCreateTag" wire:loading.attr="disabled" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tagEditModel">Edit</button>
   </div>
   <div class="col-lg-6">
   </div>
   <!-- Modal -->
   <div class="modal fade" wire:ignore.self id="tagEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Update tag</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form wire:submit.prevent="update"  id="tagModelUpdateForm-{{$this->formId}}">
               	@csrf
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" wire:model.debounce.500ms="name" class="form-control" placeholder="Enter tag name" />
                     <small id="tag.name" class="form-text text-muted">Slug of this name will be created automatically.</small>
                     @error('name')<span class="text-danger">{{$message}}</span>@enderror
                  </div>
                  
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button wire:target='update' wire:loading.attr='disabled' type="submit"  class="btn btn-primary" form="tagModelUpdateForm-{{$this->formId}}">Update</button>
            </div>
         </div>
      </div>
   </div>
 </div>
