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
            <a href="{{route('add.transactions')}}" class="px-5 btn btn-primary">Add Transactions</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Goods ID</th>
                            <th>Transactions ID</th>
                            <th>Bill of Landing</th>
                            <th>Exporting Country</th>
                            <th>Production Origin (optional)</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Total Tonnage</th>
                            <th>Number of Items</th>
                            <th>consignee Company</th>
                            <th>consignee Company TIN</th>
                            <th>Item list</th>
                            <th>Delivery Location</th>
                            <th>Scan Status</th>
                            <th>Scan Time Stamp</th>
                        </tr>
                    </thead>
                    <tbody>



                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Goods ID</th>
                            <th>Transactions ID</th>
                            <th>Bill of Landing</th>
                            <th>Exporting Country</th>
                            <th>Production Origin (optional)</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Total Tonnage</th>
                            <th>Number of Items</th>
                            <th>consignee Company</th>
                            <th>consignee Company TIN</th>
                            <th>Item list</th>
                            <th>Delivery Location</th>
                            <th>Scan Status</th>
                            <th>Scan Time Stamp</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

<script>

</script>

@endsection