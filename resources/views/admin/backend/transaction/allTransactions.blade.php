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
        <div class="breadcrumb-title pe-3">All Transations</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

            <!-- <a href="{{route('add.transactions')}}"  class="px-5 btn btn-primary">
                    <div wire:loading><button class="btn btn-primary" type="button" disabled=""> <span
                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...</button></div>
                    <span wire:loading.remove>Add Transactions</span>
            </a> -->

        </div>
    </div>
    <!--end breadcrumb-->

    <livewire:all-transaction lazy />

</div>

<script>

</script>

@endsection