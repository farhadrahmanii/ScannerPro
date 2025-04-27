<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Edit User</h5>

        <form class="row g-3" method="POST" action="" id="myForm" enctype="multipart/form-data" action="">
            @csrf

            <div class="form-group col-md-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" wire:model="name" name="name" class="form-control rounded-lg
                    @error('name')
                        is-invalid
                    @enderror
                    " id="name" placeholder="Ahmad">
                @error('name')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" wire:model="email" name="email" class="form-control rounded-lg
                    @error('email')
                        is-invalid
                    @enderror
                    " id="email" placeholder="example@gmail.com">
                @error('email')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" wire:model="password" name="password" class="form-control rounded-lg
                    @error('password')
                        is-invalid
                    @enderror
                    " id="password" placeholder="****************">
                @error('password')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="site_id" class="form-label">Select Site</label>
                <select class="form-control rounded-lg @error('site_id') is-invalid @enderror" wire:model="site_id"
                    name="site_id" id="site_id">
                    <option value="" disabled selected>Select Province</option>
                    @foreach ($allSites as $site)
                        <option value="{{ $site->id }}">{{ $site->site_name }}</option>
                    @endforeach
                </select>
                @error('site_id')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="permissions" class="form-label">Permissions</label>
                <div class="row">
                    @foreach ($permissions->groupBy('group_name') as $groupName => $groupedPermissions)
                        <div class="col-md-12 mb-3">
                            <h5 class="text-primary">{{ $groupName }}</h5>
                            <hr>
                            <br>
                            <div class="row">
                                @foreach ($groupedPermissions as $permission)
                                    <div class="col-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedPermissions"
                                                value="{{ $permission->name }}" id="permission-{{ $permission->id }}"
                                                @if(in_array($permission->name, $selectedPermissions)) checked @endif>
                                            <label class="form-check-label"
                                                for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('selectedPermissions')
                    <span class="text-red-500 text-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" id="photo" wire:model="photo" name="photo" class="form-control rounded-lg
                    @error('photo')
                        is-invalid
                    @enderror
                    " id="photo" placeholder="Data Science">
                @error('photo')
                    <span class="text-red-500 text-bold">{{$message}} or may Check the Image size or May Check the Image
                        Type should be | jpg | png | jpeg </span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="photoPreview" class="form-label">Photo Preview</label>
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" height="100px">
                @elseif ($photoPreview)
                    <img src="{{ asset('storage/' . $photoPreview) }}" height="100px">
                @endif
            </div>

            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" wire:click.prevent="update" class="px-4 btn btn-primary">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading>
                            <div class="spinner-border spinner-border-sm">
                            </div>
                            Loading...
                        </span>
                    </button>
                    <a href="{{ route('users.list')}}" class="px-4 btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>