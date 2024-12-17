<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Add User</h5>


        <form class="row g-3" method="POST" action="" id="myForm" enctype="multipart/form-data" action="">
            @csrf

            <div class="form-group col-md-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="input1" wire:model="name" name="name" class="form-control rounded-lg
                    @error('name')
                        is-invalid
                    @enderror
                    " id="name" placeholder="Data Science">
                @error('name')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="user_name" class="form-label">User Name</label>
                <input type="text" id="input1" wire:model="user_name" name="user_name" class="form-control rounded-lg
                    @error('user_name')
                        is-invalid
                    @enderror
                    " id="user_name" placeholder="Data Science">
                @error('user_name')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="input1" wire:model="email" name="email" class="form-control rounded-lg
                    @error('email')
                        is-invalid
                    @enderror
                    " id="email" placeholder="Data Science">
                @error('email')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="password" class="form-label">password</label>
                <input type="password" id="input1" wire:model="password" name="password" class="form-control rounded-lg
                    @error('password')
                        is-invalid
                    @enderror
                    " id="password" placeholder="Data Science">
                @error('password')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="province_id" class="form-label">Province ID</label>
                <input type="number" id="input1" wire:model="province_id" name="province_id" class="form-control rounded-lg
                    @error('province_id')
                        is-invalid
                    @enderror
                    " id="province_id" placeholder="Data Science">
                @error('province_id')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control rounded-lg
        @error('role') is-invalid @enderror" id="role" wire:model="role" name="role">
                    <option value="">Select Role</option> <!-- Default option -->
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <span class="text-red-500 text-bold">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group col-md-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" id="input1" wire:model="photo" name="photo" class="form-control rounded-lg
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
                <label for="photo" class="form-label">Photo Preview</label>
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" height="100px">
                @endif

            </div>


            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" wire:click.prevent="save" class="px-4 btn btn-primary">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading>
                            <div class="spinner-border spinner-border-sm">
                            </div>
                            Loading...
                        </span>
                    </button>
                    <a href="" class="px-4 btn btn-light">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Initialize form validation
        $('#myForm').validate({
            rules: {
                name: {
                    required: true
                },
                user_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                province_id: {
                    required: true
                },
                role: {
                    required: true
                },
                photo: {
                    required: true,
                    extension: "jpg|jpeg|png|gif"
                }
            },
            messages: {
                name: {
                    required: 'Please enter your name'
                },
                user_name: {
                    required: 'Please enter your username'
                },
                email: {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email address'
                },
                province_id: {
                    required: 'Please enter your province ID'
                },
                role: {
                    required: 'Please enter your role'
                },
                photo: {
                    required: 'Please upload a photo',
                    extension: 'Only image files (jpg, jpeg, png, gif) are allowed'
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function (form) {
                // Trigger Livewire save method on successful validation
                @this.save();
            }
        });
    });
</script>