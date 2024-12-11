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
            <h5 class="mb-4">Add User</h5>
            <form class="row g-3" method="POST" action="" id="myForm" enctype="multipart/form-data" action="">
                @csrf
                <div class="form-group col-md-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="input1" name="name" class="form-control rounded-lg
                    @error('name')
                        in-valid
                    @enderror
                    " id="name" placeholder="Data Science">
                    @error('name')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" id="input1" name="user_name" class="form-control rounded-lg
                    @error('user_name')
                        in-valid
                    @enderror
                    " id="user_name" placeholder="Data Science">
                    @error('user_name')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="input1" name="email" class="form-control rounded-lg
                    @error('email')
                        in-valid
                    @enderror
                    " id="email" placeholder="Data Science">
                    @error('email')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="province_id" class="form-label">Province ID</label>
                    <input type="text" id="input1" name="province_id" class="form-control rounded-lg
                    @error('province_id')
                        in-valid
                    @enderror
                    " id="province_id" placeholder="Data Science">
                    @error('province_id')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" id="input1" name="role" class="form-control rounded-lg
                    @error('role')
                        in-valid
                    @enderror
                    " id="role" placeholder="Data Science">
                    @error('role')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="role" class="form-label">Photo</label>
                    <input type="file" id="input1" name="photo" class="form-control rounded-lg
                    @error('photo')
                        in-valid
                    @enderror
                    " id="photo" placeholder="Data Science">
                    @error('photo')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="col-md-12">
                    <div class="gap-3 d-md-flex d-grid align-items-center">
                        <button type="submit" class="px-4 btn btn-primary">Submit</button>
                        <a href="" class="px-4 btn btn-light">Cancel</a>
                    </div>
                </div>
            </form>
            <form class="row g-3" method="POST" id="myForm" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                image: {
                    required: true,
                },

            },
            messages: {
                name: {
                    required: 'Please Enter name',
                },
                image: {
                    required: 'Please Add Image',
                },


            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
<script>

    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection