<div class="container">
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
                                        {{ $vehicle->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Vehicle Make</th>
                                    <td class="text-secondary">
                                        {{ $vehicle->vehicle_make }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Vehicle Model</th>
                                    <td class="text-secondary">
                                        {{ $vehicle->vehicle_model }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Year</th>
                                    <td class="text-secondary">

                                        {{ $vehicle->year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Capacity</th>
                                    <td class="text-secondary">
                                        {{ $vehicle->capacity }}
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
                        Contact and Company Informations
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Type</th>
                                    <td class="text-secondary">
                                        {{ $vehicle->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Plate Number</th>
                                    <td class="text-secondary">

                                        {{ $vehicle->plate_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">VIN</th>
                                    <td class="text-secondary">
                                        {{ $vehicle->vin }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Colour</th>
                                    <td class="text-secondary">
                                        {{ $vehicle->colour }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Extended Body Type</th>
                                    <td class="text-secondary">
                                        {{ $vehicle->extended_body_type}}
                                    </td>
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
                                <h5 class="mb-3">Transactions List</h5>
                            </div>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-outline-success mb-1">Total Transactions <span
                                        class="badge bg-success">
                                        {{ count($transactions) }}
                                    </span></button>
                            </div>
                        </div>
                        <hr>
                        @foreach ($transactions as $key => $item)
                            <table class="table table-striped table-bordered" style="font-weight: 600;">
                                <thead>
                                    <tr>
                                        <button type="button" class="btn btn-outline-success mb-1">
                                            Transaction <span class="badge bg-danger">{{$key + 1}}</span>
                                            {{ $item->created_at->diffForHumans() }}
                                        </button>
 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Goods ID</th>
                                        <td class="text-secondary">
                                            {{ $item->goods_id }}
                                        </td>
                                        <th scope="row">Transaction ID</th>
                                        <td class="text-secondary">
                                            {{ $item->transaction_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bill of Landing</th>
                                        <td class="text-secondary">
                                            {{ $item->bill_of_landing }}
                                        </td>
                                        <th scope="row">Exporting Country</th>
                                        <td class="text-secondary">
                                            {{ $item->exporting_country }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Production Origin</th>
                                        <td class="text-secondary">
                                            {{ $item->production_origin }}
                                        </td>
                                        <th scope="row">Item Name</th>
                                        <td class="text-secondary">
                                            {{ $item->item_name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Category</th>
                                        <td class="text-secondary">
                                            {{ $item->category->category_name}}
                                        </td>
                                        <th scope="row">Total Tonnage</th>
                                        <td class="text-secondary">
                                            {{ $item->total_tonnage}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Number of Items</th>
                                        <td class="text-secondary">
                                            {{ $item->number_of_items}}
                                        </td>
                                        <th scope="row">Consignee Company</th>
                                        <td class="text-secondary">
                                            {{ $item->consignee_company}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Item List</th>
                                        <td class="text-secondary">
                                            {{ $item->item_list}}
                                        </td>
                                        <th scope="row">Delivery Location</th>
                                        <td class="text-secondary">
                                            {{ $item->delivery_location}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Scan Status</th>
                                        <td class="text-secondary">
                                            {{ $item->scan_status}}
                                        </td>
                                        <th scope="row">Scan Time</th>
                                        <td class="text-secondary">
                                            {{ $item->scan_time}}
                                        </td>
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