<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Personal Informations
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row" class="col-sm-5">ID</th>
                                    <td class="text-secondary">{{$driver->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td class="text-secondary">{{$driver->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Father Name</th>
                                    <td class="text-secondary">{{$driver->father_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">National ID</th>
                                    <td class="text-secondary">{{$driver->national_id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Passport Number</th>
                                    <td class="text-secondary">{{$driver->passport_no}}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Contact and Company Informations
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Contact Info</th>
                                    <td class="text-secondary">{{$driver->contact_information}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nationality</th>
                                    <td class="text-secondary">{{$driver->nationality}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Transport Company</th>
                                    <td class="text-secondary">{{$driver->transport_company}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Transport Company TIN</th>
                                    <td class="text-secondary">{{$driver->transport_company_tin}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">


                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-5">
                                <h5 class="mb-3">Vehicle Details</h5>
                            </div>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-outline-success mb-1">Total Vehicle <span
                                        class="badge bg-success">{{ count($vehicles)}}</span> </button>
                            </div>
                        </div>
                        <hr>
                        @foreach ($vehicles as $key => $vehicle)
                            <table class="table table-striped table-bordered" style="font-weight: 600;">
                                <tbody>
                                    <button type="button" class="btn btn-outline-success mb-1">Vehicle <span
                                            class="badge bg-danger">{{$key + 1}}
                                        </span> {{ $vehicle->created_at->diffForHumans() }}
                                    </button>

                                    <tr>
                                        <th scope="row">Vehicle ID</th>
                                        <td class="text-secondary">{{ $vehicle->id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Make</th>
                                        <td class="text-secondary">{{ $vehicle->vehicle_make }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Model</th>
                                        <td class="text-secondary">{{ $vehicle->vehicle_model }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Year</th>
                                        <td class="text-secondary">{{ $vehicle->year }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Capacity</th>
                                        <td class="text-secondary">{{ $vehicle->capacity }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Type</th>
                                        <td class="text-secondary">{{ $vehicle->type }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Plate Number</th>
                                        <td class="text-secondary">{{ $vehicle->plate_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">VIN</th>
                                        <td class="text-secondary">{{ $vehicle->vin }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Colour</th>
                                        <td class="text-secondary">{{ $vehicle->colour }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Extended Body Type</th>
                                        <td class="text-secondary">{{ $vehicle->extended_body_type }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>