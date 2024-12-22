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
        <div class="breadcrumb-title pe-3">All Drivers</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Driver</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            @if (Auth::user()->can('create.driver'))
            @endif
            <a href="{{route('add.driver')}}" class="px-5 btn btn-primary" wire:navigate>Add Driver</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <livewire:driver-list lazy />


</div>

<script>

</script>



@endsection