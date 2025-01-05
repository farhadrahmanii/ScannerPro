<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Add Category</h5>
        <form class="row g-3" method="POST" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-3">
                <label for="goods_id" class="form-label">Goods ID</label>
                <input type="text" id="goods_id" wire:model="goods_id" name="goods_id" class="form-control rounded-lg
                    @error('goods_id')
                        in-valid
                    @enderror
                    " id="goods_id" placeholder="Data Science">
                @error('goods_id')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group col-md-3">
                <label for="bill_of_landing" class="form-label">Bill of Landing</label>
                <input type="text" id="bill_of_landing" name="bill_of_landing" wire:model="bill_of_landing" class="form-control rounded-lg
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
                <input type="text" id="exporting_country" wire:model="exporting_country" name="exporting_country" class="form-control rounded-lg
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
                <input type="text" id="production_origin" wire:model="production_origin" name="production_origin" class="form-control rounded-lg
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
                <input type="text" id="input1" wire:model="item_name" name="item_name" class="form-control rounded-lg
                    @error('item_name')
                        in-valid
                    @enderror
                    " id="item_name" placeholder="Data Science">
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
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach

                    </option>
                </select>
                @error('category_id')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror

            </div>


            <div class="form-group col-md-3">
                <label for="total_tonnage" class="form-label">Total Tonnage</label>
                <input type="text" id="total_tonnage" wire:model="total_tonnage" name="total_tonnage" class="form-control rounded-lg
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
                <input type="text" id="number_of_items" wire:model="number_of_items" name="number_of_items" class="form-control rounded-lg
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
                <input type="text" id="consignee_company" wire:model="consignee_company" name="consignee_company" class="form-control rounded-lg
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
                <input type="text" id="input1" wire:model="consignee_company_tin" name="consignee_company_tin" class="form-control rounded-lg
                    @error('consignee_company_tin')
                        in-valid
                    @enderror
                    " id="consignee_company_tin" placeholder="Data Science">
                @error('consignee_company_tin')
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
                <input type="text" id="delivery_location" wire:model="delivery_location" name="delivery_location" class="form-control rounded-lg
                    @error('delivery_location')
                        in-valid
                    @enderror
                    " id="delivery_location" placeholder="Data Science">
                @error('delivery_location')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-check form-switch form-check-success">
                <input class="form-check-input @error('scan_status') is-invalid @enderror" type="checkbox" role="switch"
                    id="scan_status" wire:model="scan_status">
                <label class="form-check-label" for="scan_status">
                    Transaction Status
                </label>
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

            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" wire:click.prevent="save" wire:loading.attr="disabled"
                        class="px-4 btn btn-primary">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>

                    </button>
                    <a href="{{route('all.transactions')}}" class="px-4 btn btn-light" wire:navigate>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>