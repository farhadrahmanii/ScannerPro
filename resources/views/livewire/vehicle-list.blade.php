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