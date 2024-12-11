@extends('admin.adminDashboard')
@section('admin')

<!-- Jquery is loaded Here  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Province</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Province</li>
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
            <h5 class="mb-4">Add Driver</h5>
            <form class="row g-3" method="POST" id="myForm" enctype="multipart/form-data" action="">
                @csrf
                <div class="form-group col-md-6">
                    <label for="driver_name" class="form-label">Province Name</label>
                    <input type="text" id="input1" name="driver_name" class="form-control rounded-lg
                    @error('driver_name')
                        in-valid
                    @enderror
                    " id="driver_name" placeholder="Data Science">
                    @error('driver_name')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>




                <div class="form-group col-md-6">
                    <label for="father_name" class="form-label">Father Name</label>
                    <input type="text" id="input1" name="father_name" class="form-control rounded-lg
                    @error('father_name')
                        in-valid
                    @enderror
                    " id="father_name" placeholder="Data Science">
                    @error('father_name')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="national_id" class="form-label">national_id</label>
                    <input type="text" id="input1" name="national_id" class="form-control rounded-lg
                    @error('national_id')
                        in-valid
                    @enderror
                    " id="national_id" placeholder="Data Science">
                    @error('national_id')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="contact_information" class="form-label">Contact Information</label>
                    <input type="text" id="input1" name="contact_information" class="form-control rounded-lg
                    @error('contact_information')
                        in-valid
                    @enderror
                    " id="contact_information" placeholder="Data Science">
                    @error('contact_information')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" id="input1" name="nationality" class="form-control rounded-lg
                    @error('nationality')
                        in-valid
                    @enderror
                    " id="nationality" placeholder="Data Science">
                    @error('nationality')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="transport_company" class="form-label">Transport company</label>
                    <input type="text" id="input1" name="transport_company" class="form-control rounded-lg
                    @error('transport_company')
                        in-valid
                    @enderror
                    " id="transport_company" placeholder="Data Science">
                    @error('transport_company')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="transport_company_tin" class="form-label">Transport company TIN</label>
                    <input type="text" id="input1" name="transport_company_tin" class="form-control rounded-lg
                    @error('transport_company_tin')
                        in-valid
                    @enderror
                    " id="transport_company_tin" placeholder="Data Science">
                    @error('transport_company_tin')
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
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                vehicle_name: {
                    required: true,
                },
                image: {
                    required: true,
                },

            },
            messages: {
                vehicle_name: {
                    required: 'Please Enter category name',
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