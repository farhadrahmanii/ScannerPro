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
            <a href="{{route('all.vehicles')}}" class="px-5 btn btn-primary" wire:navigate>Cancel</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />


    <livewire:create-transaction lazy :vehicle_id="$vehicle->id" />

    <div class="card">
        <div class="p-4 card-body">
            <h5 class="mb-4">Add Category</h5>
            <form class="row g-3" method="POST" id="myForm" wire:submit.prevent="save" enctype="multipart/form-data">
                @csrf


                <div class="form-group col-md-3">
                    <label for="exporting_country" class="form-label">Exporting Country</label>
                    <select id="exporting_country" name="exporting_country" wire:model="exporting_country"
                        class="form-control rounded-lg @error('exporting_country') is-invalid @enderror">
                        <option value="">Select Exporting Country</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="China">China</option>
                        <option value="India">India</option>
                        <option value="United States">United States</option>
                        <option value="Germany">Germany</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Japan">Japan</option>
                        <option value="South Korea">South Korea</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Iran">Iran</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('exporting_country')
                        <span class="text-red-500 text-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-3" wire:ignore>
                    <label for="production_origin" class="form-label">Production Origin</label>
                    <select id="production_origin" wire:model="production_origin" data-pharaonic="select2"
                        data-component-id="112" class="form-control rounded-lg">
                        <option value="">Select Production Origin</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="China">China</option>
                        <option value="India">India</option>
                        <option value="United States">United States</option>
                        <option value="Germany">Germany</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Japan">Japan</option>
                        <option value="South Korea">South Korea</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Iran">Iran</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('production_origin')
                        <span class="text-red-500 text-bold">{{ $message }}</span>
                    @enderror
                </div>




                <div class="form-group col-md-3">
                    <label for="item_name" class="form-label">Item Name</label>
                    <input type="text" id="input1" wire:model="item_name" name="item_name" class="form-control rounded-lg
                    @error('item_name')
                        in-valid
                    @enderror
                    " id="item_name" placeholder="Item List">
                    @error('item_name')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="category_id" class="form-label">category</label>
                    <select class="form-control rounded-lg @error('category_id')
                        in-valid
                    @enderror" wire:model="category_id" name="category_id" id="category_id">
                        <option>Select Category</option>
                        <option value="123">1233</option>

                        </option>
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror

                </div>


                <div class="form-group col-md-3">
                    <label for="total_tonnage" class="form-label">Total Tonnage</label>
                    <input type="number" id="total_tonnage" wire:model="total_tonnage" name="total_tonnage" class="form-control rounded-lg
                    @error('total_tonnage')
                        in-valid
                    @enderror
                    " id="total_tonnage" placeholder="####">
                    @error('total_tonnage')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="number_of_items" class="form-label">Number of Items</label>
                    <input type="number" id="number_of_items" wire:model="number_of_items" name="number_of_items" class="form-control rounded-lg
                    @error('number_of_items')
                        in-valid
                    @enderror
                    " id="number_of_items" placeholder="#########">
                    @error('number_of_items')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>




                <div class="form-group col-md-3">
                    <label for="item_list" class="form-label">Items list</label>
                    <input type="text" id="input1" wire:model="item_list" name="item_list" class="form-control rounded-lg
                    @error('item_list')
                        in-valid
                    @enderror
                    " id="item_list" placeholder="Data Science">
                    @error('item_list')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group col-md-3">
                    <label for="delivery_location" class="form-label">Delivery Location</label>
                    <input type="text" id="delivery_location" wire:model="delivery_location" name="delivery_location"
                        class="form-control rounded-lg
                    @error('delivery_location')
                        in-valid
                    @enderror
                    " id="delivery_location" placeholder="Data Science">
                    @error('delivery_location')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror

                </div>


                <div class="form-group col-md-3">
                    <label for="scan_time" class="form-label">Scan TimeStamp</label>
                    <input type="datetime-local" id="scan_time" wire:model="scan_time" name="scan_time" class="form-control rounded-lg
                    @error('scan_time')
                        in-valid
                    @enderror
                    " id="scan_time" placeholder="Data Science">
                    @error('scan_time')
                        <span class="text-red-500 text-bold">{{$message}}</span>
                    @enderror
                </div>
                <!-- Consignee Company Search/Selection -->
                <div class="form-group col-md-6">
                    <label for="consignee_company_tin">Consignee Company TIN</label>
                    <input type="text" wire:model.lazy="consignee_company_tin"
                        class="form-control @error('consignee_company_tin') is-invalid @enderror">
                    @error('consignee_company_tin') <span class="text-danger">{{ $message }}</span> @enderror

                    <!-- Search Results -->
                    @if (!empty($consigneeSearchResults))
                        <ul class="list-group mt-2">
                            @foreach ($consigneeSearchResults as $result)
                                <li class="list-group-item list-group-item-action"
                                    wire:click="selectConsigneeCompany({{ $result['id'] }})">
                                    {{ $result['consignee_company_name'] }} - {{ $result['consignee_company_tin'] }}
                                </li>
                            @endforeach
                        </ul>
                    @endif


                </div>

                <div class="form-group col-md-3 mt-5">
                    <div class="form-check form-switch form-check-success">
                        <input class="form-check-input @error('scan_status') is-invalid @enderror" type="checkbox"
                            role="switch" id="scan_status" wire:model="scan_status">
                        <label class="form-check-label" for="scan_status">
                            Transaction Status
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="gap-3 d-md-flex d-grid align-items-center">
                        <button type="submit" wire:loading.attr="disabled" class="px-4 btn btn-primary">
                            <span wire:loading.remove>Save</span>
                            <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                        </button>
                        <a href="{{ route('all.transactions') }}" class="px-4 btn btn-light" wire:navigate>Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <script>

        </script>
    </div>



</div>
@endsection