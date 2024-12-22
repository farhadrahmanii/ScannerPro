<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Transactions ID</th>
                        <th>Bill of Landing</th>
                        <th>Exporting Country</th>
                        <th>Total Tonnage</th>
                        <th>consignee Company</th>
                        <th>Delivery Location</th>
                        <th>Scan Status</th>
                        <th>Scan Time Stamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transac)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $transac->transaction_id }}</td>
                            <td>{{ $transac->bill_of_landing }}</td>
                            <td>{{ $transac->exporting_country }}</td>
                            <td>{{ $transac->total_tonnage }}</td>
                            <td>{{ $transac->consignee_company }}</td>
                            <td>{{ $transac->delivery_location }}</td>
                            <td class="text-center">
                                @if($transac->scan_status == 0)
                                    <span class="btn btn-danger px-3">
                                        <i class="bx bx-x-circle mr-1"></i>
                                        Not Scanned
                                    </span>
                                @else
                                    <span class="btn btn-success px-3">
                                        <i class="bx bx-check-circle mr-1"></i>
                                        Scanned
                                    </span>
                                @endif
                            </td>

                            <td>{{ $transac->scan_time }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Transactions ID</th>
                        <th>Bill of Landing</th>
                        <th>Exporting Country</th>
                        <th>Total Tonnage</th>
                        <th>consignee Company</th>
                        <th>Delivery Location</th>
                        <th>Scan Status</th>
                        <th>Scan Time Stamp</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>