@extends('admin.adminDashboard')
@section('admin')



<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Permissions</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Permissions</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            @if (Illuminate\Support\Facades\Auth::user()->can('permission.create'))
                <a href="{{route('add.permission')}}" class="px-5 btn btn-primary" >Add Permissions</a>
            @endif
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <livewire:permission-livewire lazy />

</div>
@endsection