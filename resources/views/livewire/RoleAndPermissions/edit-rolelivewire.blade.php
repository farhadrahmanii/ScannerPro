<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Edit Role</h5>
        <form class="row g-3" wire:submit.prevent="save" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" id="name" wire:model="name" name="name"
                    class="form-control rounded-lg @error('name') is-invalid @enderror" placeholder="Manager" required>
                @error('name')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" class="px-4 btn btn-primary">Save</button>
                    <button type="button" class="px-4 btn btn-danger" wire:click="deleteRole"
                        wire:loading.attr="disabled"
                        onclick="return confirm('Are you sure you want to delete this role?');">
                        <span wire:loading.remove>Delete</span>
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                    </button>

                    <a href="{{ route('all.roles') }}" class="px-4 btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>