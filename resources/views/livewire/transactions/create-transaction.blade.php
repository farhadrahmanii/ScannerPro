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
                <select id="production_origin" wire:model="production_origin" data-pharaonic="select2" multiple
                    data-component-id="{{ $id }}" class="form-control rounded-lg">
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
                <input type="text" id="number_of_items_input" class="form-control rounded-lg @error('number_of_items') is-invalid @enderror" placeholder="Enter Number of Items">
                @error('number_of_items')
                    <span class="text-red-500 text-bold">{{ $message }}</span>
                @enderror
                <div id="number_of_items_tags" class="mt-2">
                    @foreach ($number_of_items as $item)
                        <span class="badge bg-primary">{{ $item }} <i class="fas fa-times" wire:click="removeNumberOfItems('{{ $item }}')"></i></span>
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-3">
                <label for="item_list" class="form-label">Items List</label>
                <select id="item_list" wire:model="item_list" class="form-control rounded-lg @error('item_list') is-invalid @enderror">
                    <option value="">Select Item</option>
                    @foreach ($defaultItemList as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                @error('item_list')
                    <span class="text-red-500 text-bold">{{ $message }}</span>
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

                <!-- Add New Company Form -->
                @if ($showAddConsigneeCompanyForm)
                    <div class="mt-3">
                        <h5>Add New Consignee Company</h5>
                        <input type="text" wire:model="consignee_company" placeholder="Company Name"
                            class="form-control mb-2 @error('consignee_company') is-invalid @enderror">
                        @error('consignee_company') <span class="text-danger">{{ $message }}</span> @enderror

                        <button type="button" wire:click="addConsigneeCompany" class="btn btn-primary btn-sm">
                            Add Consignee Company
                        </button>
                    </div>
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
        document.addEventListener('livewire:load', () => {
            $('#production_origin').select2({
                placeholder: "Select Production Origin",
                allowClear: true
            });
            $('#production_origin').on('change', function () {
                @this.set('production_origin', $(this).val());
            });

            const input = document.getElementById('number_of_items_input');
            input.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    @this.call('addNumberOfItems', input.value);
                    input.value = '';
                }
            });
        });

        Livewire.hook('message.processed', (message, component) => {
            $('#production_origin').select2({
                placeholder: "Select Production Origin",
                allowClear: true
            });
        });
    </script>
</div>