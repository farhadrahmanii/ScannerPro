@extends('admin.adminDashboard')
@section('admin')



<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">{{ __('driver_table.All_Drivers') }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('driver_table.Driver') }}</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            @if (Auth::user()->can('create.driver'))
                <a href="{{route('add.driver')}}" class="px-5 btn btn-primary">{{ __('driver_table.Add_Driver') }}</a>
            @endif
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <livewire:driver-list lazy />


</div>

<script>

</script>



@endsection