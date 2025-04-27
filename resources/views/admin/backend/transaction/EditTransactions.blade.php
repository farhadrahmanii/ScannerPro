@extends('admin.adminDashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Transactions</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Transaction</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('all.transactions')}}" class="px-5 btn btn-primary">Cancel</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    @if (Auth::user()->can('transaction.edit'))
        <livewire:transactions.edit-transactionlivewire :transactionId="$transaction->id" />
    @endif

</div>
@endsection