@extends('admin.adminDashboard')
@section('admin')

<!-- Jquery is loaded Here  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            <a href="" class="px-5 btn btn-primary">Cancel</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />

    <div class="card">
        <div class="p-4 card-body">
            <h5 class="mb-4">Add Category</h5>
            <form class="row g-3" method="POST" id="myForm" enctype="multipart/form-data" action="">
                @csrf
                <div class="form-group col-md-3">
                    <label for="goods_id" class="form-label">Goods ID</label>
                    <input type="text" id="input1" name="goods_id" class="form-control rounded-lg
                    @error('goods_id')
                        in-valid
                    @enderror
                    " id="goods_id" placeholder="Data Science">
                    @error('goods_id')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>




                <div class="form-group col-md-3">
                    <label for="transaction_id" class="form-label">Transaction ID</label>
                    <input type="text" id="input1" name="transaction_id" class="form-control rounded-lg
                    @error('transaction_id')
                        in-valid
                    @enderror
                    " id="transaction_id" placeholder="Data Science">
                    @error('transaction_id')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="bill_of_landing" class="form-label">Bill of Landing</label>
                    <input type="text" id="input1" name="bill_of_landing" class="form-control rounded-lg
                    @error('bill_of_landing')
                        in-valid
                    @enderror
                    " id="bill_of_landing" placeholder="Data Science">
                    @error('bill_of_landing')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="exporting_country" class="form-label">Exporting country</label>
                    <input type="text" id="input1" name="exporting_country" class="form-control rounded-lg
                    @error('exporting_country')
                        in-valid
                    @enderror
                    " id="exporting_country" placeholder="Data Science">
                    @error('exporting_country')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="production_origin" class="form-label">Production Origin</label>
                    <input type="text" id="input1" name="production_origin" class="form-control rounded-lg
                    @error('production_origin')
                        in-valid
                    @enderror
                    " id="production_origin" placeholder="Data Science">
                    @error('production_origin')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="item_name" class="form-label">Item Name</label>
                    <input type="text" id="input1" name="item_name" class="form-control rounded-lg
                    @error('item_name')
                        in-valid
                    @enderror
                    " id="item_name" placeholder="Data Science">
                    @error('item_name')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" id="input1" name="category" class="form-control rounded-lg
                    @error('category')
                        in-valid
                    @enderror
                    " id="category" placeholder="Data Science">
                    @error('category')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="total_tonnage" class="form-label">Total Tonnage</label>
                    <input type="text" id="input1" name="total_tonnage" class="form-control rounded-lg
                    @error('total_tonnage')
                        in-valid
                    @enderror
                    " id="total_tonnage" placeholder="Data Science">
                    @error('total_tonnage')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="number_of_items" class="form-label">Number of Items</label>
                    <input type="text" id="input1" name="number_of_items" class="form-control rounded-lg
                    @error('number_of_items')
                        in-valid
                    @enderror
                    " id="number_of_items" placeholder="Data Science">
                    @error('number_of_items')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="consignee_company" class="form-label">consignee Company</label>
                    <input type="text" id="input1" name="consignee_company" class="form-control rounded-lg
                    @error('consignee_company')
                        in-valid
                    @enderror
                    " id="consignee_company" placeholder="Data Science">
                    @error('consignee_company')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="consignee_company_tin" class="form-label">consignee Company TIN</label>
                    <input type="text" id="input1" name="consignee_company_tin" class="form-control rounded-lg
                    @error('consignee_company_tin')
                        in-valid
                    @enderror
                    " id="consignee_company_tin" placeholder="Data Science">
                    @error('consignee_company_tin')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="items_list" class="form-label">Items list</label>
                    <input type="text" id="input1" name="items_list" class="form-control rounded-lg
                    @error('items_list')
                        in-valid
                    @enderror
                    " id="items_list" placeholder="Data Science">
                    @error('items_list')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="delivery_location" class="form-label">Delivery Location</label>
                    <input type="text" id="input1" name="delivery_location" class="form-control rounded-lg
                    @error('delivery_location')
                        in-valid
                    @enderror
                    " id="delivery_location" placeholder="Data Science">
                    @error('delivery_location')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="scan_status" class="form-label">Scan Status</label>
                    <input type="text" id="input1" name="scan_status" class="form-control rounded-lg
                    @error('scan_status')
                        in-valid
                    @enderror
                    " id="scan_status" placeholder="Data Science">
                    @error('scan_status')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="scan_timestamp" class="form-label">Scan TimeStamp</label>
                    <input type="text" id="input1" name="scan_timestamp" class="form-control rounded-lg
                    @error('scan_timestamp')
                        in-valid
                    @enderror
                    " id="scan_timestamp" placeholder="Data Science">
                    @error('scan_timestamp')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="gap-3 d-md-flex d-grid align-items-center">
                        <button type="submit" class="px-4 btn btn-primary">Submit</button>
                        <a href="" class="px-4 btn btn-light">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                vehicle_name: {
                    required: true,
                },
                image: {
                    required: true,
                },

            },
            messages: {
                vehicle_name: {
                    required: 'Please Enter category name',
                },
                image: {
                    required: 'Please Add Image',
                },


            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
<script>

    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection