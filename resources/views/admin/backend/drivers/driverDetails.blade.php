@extends('admin.adminDashboard')
@section('admin')
<!-- Jquery is loaded Here  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">{{ __('driver.driver') }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('driver.driver_details') }}</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('all.drivers')}}" class="px-5 btn btn-primary" >{{ __('driver.cancel') }}</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <livewire:driver-detailslivewire :driverId="$driver->id" lazy />
</div>
@endsection