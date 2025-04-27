@extends('admin.adminDashboard')
@section('admin')
@php
    $id = Auth::user()->id;
    $admin = App\models\User::findOrFail($id);
@endphp
<!-- Jquery is loaded Here  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">User Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center d-flex flex-column align-items-center">
                                <img src="{{!empty($admin->photo)
    ? url($admin->photo)
    : url('upload/default.png')
                                 }}" alt="Admin" class="p-1 rounded-circle bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>{{$admin->name}}</h4>
                                    <p class="text-muted font-size-sm">{{$admin->email}}</p>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <span class="text-secondary">Name</span>
                                    </h6>
                                    <span class="text-secondary">{{$admin->name}}</span>
                                </li>
                                <li class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <span class="text-secondary">User Name</span>
                                    </h6>
                                    <span class="text-secondary">{{$admin->username}}</span>
                                </li>
                                <li class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <span class="text-secondary">Email</span>
                                    </h6>
                                    <span class="text-secondary">{{$admin->email}}</span>
                                </li>
                                <li class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <span class="text-secondary">Phone</span>
                                    </h6>
                                    <span class="text-secondary">{{$admin->phone}}</span>
                                </li>
                                <li class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <span class="text-secondary">Address</span>
                                    </h6>
                                    <span class="text-secondary">{{$admin->address}}</span>
                                </li>
                                <li class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0"></span>
                                        Website</h6>
                                    <span class="text-secondary">https://codervent.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.updateProfile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <div class="col-sm-12 text-secondary">
                                        <x-input name="name" value="{{ $admin->name }}" label="Name" />
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <div class="col-sm-12 text-secondary">
                                        <x-input type="email" label="Email" name="email" value="{{ $admin->email }}" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-12 text-secondary">
                                        <x-input type="text" label="Phone" name="phone" value="{{ $admin->phone }}" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-12 text-secondary">
                                        <x-input type="text" label="Address" name="address" value="{{ $admin->address }}" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-12 text-secondary">
                                        <x-input type="file" id="image" label="Profile Image" name="photo" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-12 text-secondary">
                                        <img src="{{ !empty($admin->photo) ? url($admin->photo) : url('upload/default.png') }}" alt="Admin" id="showImage" class="rounded-circle" width="110">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-secondary">
                                        <x-button type="submit" class="px-4 btn btn-primary">Save Changes</x-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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