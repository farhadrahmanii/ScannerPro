<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        {{ __('driver.personal_informations') }}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row" class="col-sm-5">{{ __('driver.id') }}</th>
                                    <td class="text-secondary">{{$driver->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('driver.name') }}</th>
                                    <td class="text-secondary">{{$driver->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('driver.father_name') }}</th>
                                    <td class="text-secondary">{{$driver->father_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('driver.national_id') }}</th>
                                    <td class="text-secondary">{{$driver->national_id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('driver.passport_number') }}</th>
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
                        {{ __('driver.contact_and_company_informations') }}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('driver.contact_info') }}</th>
                                    <td class="text-secondary">{{$driver->contact_information}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('driver.nationality') }}</th>
                                    <td class="text-secondary">{{$driver->nationality}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('driver.transport_company') }}</th>
                                    <td class="text-secondary">{{$driver->transport_company}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('driver.transport_company_tin') }}</th>
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
                                <h5 class="mb-3">{{ __('driver.vehicle_details') }}</h5>
                            </div>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-outline-success mb-1">{{ __('driver.total_vehicle') }} <span
                                        class="badge bg-success">{{ count($vehicles)}}</span> </button>
                            </div>
                        </div>
                        <hr>
                        @foreach ($vehicles as $key => $vehicle)
                            <table class="table table-striped table-bordered" style="font-weight: 600;">
                                <tbody>
                                    <button type="button" class="btn btn-outline-success mb-1">{{ __('driver.vehicle') }} <span
                                            class="badge bg-danger">{{$key + 1}}
                                        </span> {{ $vehicle->created_at->diffForHumans() }}
                                    </button>

                                    <tr>
                                        <th scope="row">{{ __('driver.vehicle_id') }}</th>
                                        <td class="text-secondary">{{ $vehicle->id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.make') }}</th>
                                        <td class="text-secondary">{{ $vehicle->vehicle_make }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.model') }}</th>
                                        <td class="text-secondary">{{ $vehicle->vehicle_model }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.year') }}</th>
                                        <td class="text-secondary">{{ $vehicle->year }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.capacity') }}</th>
                                        <td class="text-secondary">{{ $vehicle->capacity }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.type') }}</th>
                                        <td class="text-secondary">{{ $vehicle->type }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.plate_number') }}</th>
                                        <td class="text-secondary">{{ $vehicle->plate_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.vin') }}</th>
                                        <td class="text-secondary">{{ $vehicle->vin }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.colour') }}</th>
                                        <td class="text-secondary">{{ $vehicle->colour }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('driver.extended_body_type') }}</th>
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