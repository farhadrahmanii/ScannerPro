@extends('admin.adminDashboard')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>
    .large-checkbox {
        transform: scale(1.5);
    }
</style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">All Provinces Site</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Site</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('add.province')}}" class="px-5 btn btn-primary" wire:navigate>Add Provinces Site</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <livewire:province-livewire lazy />

</div>


@endsection