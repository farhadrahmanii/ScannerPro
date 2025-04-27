@extends('admin.adminDashboard')
@section('admin')

<!-- Jquery is loaded Here  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Permissions</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Permission</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('all.roles')}}" class="px-5 btn btn-primary" >Cancel</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />

    <livewire:add-rolelivewire lazy />
</div>
<script>
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                category_id: {
                    required: true,
                },

            },
            messages: {
                name: {
                    required: 'Please Enter Permission name',
                },

                group_name: {
                    required: 'Please Select Group Name',
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
@endsection