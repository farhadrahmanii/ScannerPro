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
                    @foreach ($transactions as $key => $transac)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $transac->goods_id }}</td>
                            <td>{{ $transac->transaction_id }}</td>
                            <td>{{ $transac->bill_of_landing }}</td>
                            <td>{{ $transac->exporting_country }}</td>
                            <td>{{ $transac->production_origin }}</td>
                            <td>{{ $transac->item_name }}</td>
                            <td>{{ $transac->category }}</td>
                            <td>{{ $transac->total_tonnage }}</td>
                            <td>{{ $transac->number_of_items }}</td>
                            <td>{{ $transac->consignee_company }}</td>
                            <td>{{ $transac->consignee_company_tin }}</td>
                            <td>{{ $transac->item_list }}</td>
                            <td>{{ $transac->delivery_location }}</td>
                            <td>{{ $transac->scan_status }}</td>
                            <td>{{ $transac->scan_time_stamp }}</td>
                        </tr>
                    @endforeach
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