<div class="col-lg-12 ">
   	<div class="container">
   		<div class="row col-lg-8 m-auto">
   			<div class="col bg-gray rounded-lg py-8 px-4">
   				{{$name}}
   				<form wire:submit.prevent="submit">
   					<h1 class="h2">Contact Us Form</h1>
   					<div class="form-group">
   						<label>Name</label>
   						<input type="text" wire:model="name" class="form-control" />
                     @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
   					</div>
   					<div class="form-group">
   						<label>Email</label>
   						<input type="email" wire:model="email" class="form-control" />
                     @error('message') <span class="error text-danger">{{ $message }}</span> @enderror
   					</div>
   					<div class="form-group">
   						<label>Message</label>
   						<textarea class="form-control" wire:model="message"></textarea>
                     @error('message') <span class="error text-danger">{{ $message }}</span> @enderror
   					</div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                  </div>	
   				</form>
   				
   			</div>
   		</div>
   	</div>
</div>
