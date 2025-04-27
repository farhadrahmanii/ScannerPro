<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Add Permissions</h5>
        <form class="row g-3" method="POST" id="myForm" enctype="multipart/form-data" action="">
            @csrf
            <div class="form-group col-md-6">
                <label for="name" class="form-label">Permission Name</label>
                <input type="text" id="input1" wire:model="name" name="name" class="form-control rounded-lg
                    @error('name')
                        is-invalid
                    @enderror
                    " id="name" placeholder="site.view">
                @error('name')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="group_name" class="form-label">Permission Group Name</label>
                <select id="group_name" name="group_name" wire:model="group_name" class="form-control rounded-lg
                    @error('group_name')
                        is-invalid
                    @enderror
                    " id="group_name" placeholder="Data Science">
                    <option selected>Select Permission Category</option>
                    <option value="Category">User</option>
                    <option value="Site Manager">Site Manager</option>
                    <option value="Coupon">Driver</option>
                    <option value="Setting">Vehicle</option>
                    <option value="Report">Report</option>
                    <option value="Transactions">Transactions</option>
                    <option value="Review">Review</option>
                    <option value="Print">print</option>
                    <option value="All User">All User</option>
                    <option value="Role and Permission">Role and Permission</option>
                </select>
                @error('group_name')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" wire:click.prevent="save" wire:loading.attr="disabled"
                        class="px-4 btn btn-primary">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>

                    </button>
                    <a href="{{route('all.permissions')}}" class="px-4 btn btn-light" >Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>