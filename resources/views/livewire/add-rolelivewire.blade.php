<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Add Permissions</h5>
        <form class="row g-3" wire:submit.prevent="save" id="myForm" enctype="multipart/form-data" action="">
            @csrf
            <div class="form-group col-md-6">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" id="input1" wire:model="name" name="name" class="form-control rounded-lg
                    @error('name')
                        in-valid
                    @enderror
                    " id="name" placeholder="Manager" required>
                @error('name')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" wire:click="save" wire:loading.attr="disabled" class="px-4 btn btn-primary">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading>Saving...</span>
                    </button>
                    <a href="{{route('all.roles')}}" class="px-4 btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>