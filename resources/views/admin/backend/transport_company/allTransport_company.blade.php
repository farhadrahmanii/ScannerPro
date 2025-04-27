@extends('admin.adminDashboard')
@section('admin')



<style>
    .large-checkbox {
        transform: scale(1.5);
    }
</style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">All Transport Companies</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('transport.company.add'))
            <div class="ms-auto">
                <a href="{{route('add.transportCompany')}}" class="px-5 btn btn-primary">add Transport
                    Company</a>
            </div>
        @endif
    </div>
    <!--end breadcrumb-->
    <hr />
    @if (Auth::user()->can('transport.company.list'))
        <livewire:transport-company.transport-company-listlivewire lazy />
    @endif

</div>


@endsection