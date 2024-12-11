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
        <div class="breadcrumb-title pe-3">All Vehicles</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('add.vehicle')}}" class="px-5 btn btn-primary">Add Vehicles</a>
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
                            <th>ID</th>
                            <th>Vehicle Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Capacity (Ton)</th>
                            <th>Vehicle Type</th>
                            <th>Plate #</th>
                            <th>VIN</th>
                            <th>Vehicle Colour</th>
                            <th>Extended Body Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $key => $vehicle)
                            <tr>
                                <td>
                                    {{ $key + 1}}
                                </td>
                                <td>
                                    {{ $vehicle->id}}
                                </td>
                                <td>
                                    {{ $vehicle->vehicle_make}}
                                </td>
                                <td>
                                    {{ $vehicle->vehicle_model}}
                                </td>
                                <td>
                                    {{ $vehicle->year}}
                                </td>
                                <td>
                                    {{ $vehicle->capacity}}
                                </td>
                                <td>
                                    {{ $vehicle->type}}
                                </td>
                                <td>
                                    {{ $vehicle->plate_number}}
                                </td>
                                <td>
                                    {{ $vehicle->vin}}
                                </td>
                                <td>
                                    {{ $vehicle->colour}}
                                </td>
                                <td>
                                    {{ $vehicle->extended_body_type}}
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger"><i class="bx bx-trash"></i></a>
                                    <a href="" class="btn btn-info"><i class="bx bx-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>ID</th>
                            <th>Vehicle Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Capacity (Ton)</th>
                            <th>Vehicle Type</th>
                            <th>Plate #</th>
                            <th>VIN</th>
                            <th>Vehicle Colour</th>
                            <th>Extended Body Type</th>
                            <th>Action</th>
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