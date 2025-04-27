@extends('admin.adminDashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">{{ __('messages.Drivers') }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.All Drivers') }}</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('all.drivers')}}" class="px-5 btn btn-primary">{{ __('messages.Cancel') }}</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />

    <div class="card">
        <div class="p-4 card-body">
            <h5 class="mb-4">{{ __('messages.Add Driver') }}</h5>
            <livewire:create-driver />
        </div>
    </div>
</div>

@endsection