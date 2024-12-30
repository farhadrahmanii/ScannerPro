<div class="container">
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">

                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-5">
                                <h5 class="mb-1">Transactions</h5>
                            </div>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-outline-success mb-1">Transactions ID
                                    {{ $transaction->transaction_id}}
                            </div>
                        </div>
                        <hr>
                        <table class="table table-striped table-bordered" style="font-weight: 600;">
                            <thead>

                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Goods ID</th>
                                    <td class="text-secondary">
                                        {{ $transaction->goods_id }}
                                    </td>
                                    <th scope="row">Transaction ID</th>
                                    <td class="text-secondary">
                                        {{ $transaction->transaction_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Bill of Landing</th>
                                    <td class="text-secondary">
                                        {{ $transaction->bill_of_landing }}
                                    </td>
                                    <th scope="row">Exporting Country</th>
                                    <td class="text-secondary">
                                        {{ $transaction->exporting_country }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Production Origin</th>
                                    <td class="text-secondary">
                                        {{ $transaction->production_origin }}
                                    </td>
                                    <th scope="row">Item Name</th>
                                    <td class="text-secondary">
                                        {{ $transaction->item_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Category</th>
                                    <td class="text-secondary">
                                        {{ $transaction->category->category_name }}
                                    </td>
                                    <th scope="row">Total Tonnage</th>
                                    <td class="text-secondary">
                                        {{ $transaction->total_tonnage }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Number of Items</th>
                                    <td class="text-secondary">
                                        {{ $transaction->number_of_items }}
                                    </td>
                                    <th scope="row">Consignee Company</th>
                                    <td class="text-secondary">
                                        {{ $transaction->consignee_company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Item List</th>
                                    <td class="text-secondary">
                                        {{ $transaction->item_list }}
                                    </td>
                                    <th scope="row">Delivery Location</th>
                                    <td class="text-secondary">
                                        {{ $transaction->delivery_location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Scan Status</th>
                                    <td class="text-secondary">
                                        @if ($transaction->scan_status == 1)
                                            <button type="button" class="btn btn-success position-relative me-sm-5"> <i
                                                    class="bx bx-check-circle"></i> Scanned
                                                <span @if($transaction->created_at->isToday())
                                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                @endif>
                                                    @if($transaction->created_at->isToday())
                                                        today
                                                        <span class="visually-hidden">unread messages</span>
                                                    @endif
                                                </span>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-danger position-relative me-sm-5"> <i
                                                    class="bx bx-x-circle"></i> Events
                                                <span @if($transaction->created_at->isToday())
                                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                                @endif>
                                                    @if($transaction->created_at->isToday())
                                                        today
                                                        <span class="visually-hidden">unread messages</span>
                                                    @endif
                                                </span>
                                            </button>
                                        @endif
                                    </td>
                                    <th scope="row">Scan Time</th>
                                    <td class="text-secondary">
                                        <span>
                                            {{ $transaction->scan_time ? $transaction->scan_time->diffForHumans() : 'Not Scanned Yet' }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Vehicle Informations
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row" class="col-sm-5">ID</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->system_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Vehicle Make</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->vehicle_make }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Vehicle Model</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->vehicle_model }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Year</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Capacity</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->capacity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Type</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Plate Number</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->plate_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">VIN</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->vin }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Colour</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->colour }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Extended Body Type</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->extended_body_type }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Driver Informations
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->driver->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Father Name</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->driver->father_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">National ID</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->driver->national_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Passport #</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->driver->passport_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Contact Informations</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->driver->contact_information }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Nationality</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->driver->nationality }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Transport Company</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->driver->transport_company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Transport Company TIN</th>
                                    <td class="text-secondary">
                                        {{ $transaction->vehicle->driver->transport_company_tin }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>