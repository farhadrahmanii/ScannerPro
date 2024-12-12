@extends('admin.adminDashboard')
@section('admin')

<!-- Jquery is loaded Here  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Users</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Users</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="" class="px-5 btn btn-primary">Cancel</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="p-4 card-body">
            <h5 class="mb-4">Add Update</h5>


            <form class="row g-3" method="POST" action="{{route('update.admin.user')}}" id="myForm"
                enctype="multipart/form-data" action="">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}" />
                <div class="form-group col-md-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="input1" name="name" value="{{$user->name}}" class="form-control rounded-lg
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
                    <input type="text" id="input1" name="user_name" value="{{$user->user_name}}" class="form-control rounded-lg
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
                    <input type="email" id="input1" name="email" value="{{$user->email}}" class="form-control rounded-lg
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
                    <input type="password" id="input1" name="password" class="form-control rounded-lg
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
                    <select name="province_id" class="form-select mb-3 form-control rounded-lg   @error('province_id')
                        is-invalid
                    @enderror">
                        @php
                            $provinces = App\Models\Provinces::all();
                        @endphp
                        @foreach ($provinces as $province)
                            <option value="{{$province->id}}" {{ $province->Province_name == $user->province->Province_name ? 'selected' : '' }}>
                                {{$province->Province_name}}
                            </option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-select mb-3 form-control rounded-lg   @error('role')
                        is-invalid
                    @enderror">
                        <option>
                            Select Role
                        </option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                            User
                        </option>
                    </select>
                    @error('role')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" id="input1" name="photo" class="form-control rounded-lg
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


                </div>


                <div class="col-md-12">
                    <div class="gap-3 d-md-flex d-grid align-items-center">
                        <button type="submit" class="px-4 btn btn-primary">
                            Save
                        </button>
                        <a href="{{route('users.list')}}" class="px-4 btn btn-light">Cancel</a>
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

            });
        });
    </script>
</div>
@endsection