<div>
    <form class="row g-3" method="POST" action="{{ route('add.vehicle.store') }}" id="myForm"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="vehicle_make" class="form-label">Vehicle Make</label>
            <select id="vehicle_make" name="vehicle_make" wire:model="vehicle_make"
                class="form-control rounded-lg @error('vehicle_make') is-invalid @enderror">
                <option value="">Select Vehicle Make</option>
                <option value="Mercedes-Benz">Mercedes-Benz</option>
                <option value="Volvo">Volvo</option>
                <option value="Scania">Scania</option>
                <option value="MAN">MAN</option>
                <option value="DAF">DAF</option>
                <option value="Iveco">Iveco</option>
                <option value="Kenworth">Kenworth</option>
                <option value="Freightliner">Freightliner</option>
                <option value="Peterbilt">Peterbilt</option>
                <option value="Mack">Mack</option>
                <option value="Hino">Hino</option>
                <option value="Isuzu">Isuzu</option>
                <option value="Ford">Ford</option>
                <option value="GMC">GMC</option>
            </select>
            @error('vehicle_make')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>




        <input type="hidden" id="driverId" name="driverId" wire:model="driverId"
            class="form-control rounded-lg @error('driverId') is-invalid @enderror" placeholder="{{ $driverName }}">
        @error('driverId')
            <span class="text-red-500 text-bold">{{ $message }}</span>
        @enderror

        <div class="form-group col-md-6">
            <label for="driverId" class="form-label">Driver</label>
            <input type="text" id="driverName" name="driverName" wire:model="driverName" disabled
                class="form-control rounded-lg @error('driverId') is-invalid @enderror" placeholder="{{ $driverName }}">
            @error('driverName')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="vehicle_model" class="form-label">Model</label>
            <input type="text" id="vehicle_model" name="vehicle_model" wire:model="vehicle_model"
                class="form-control rounded-lg @error('vehicle_model') is-invalid @enderror"
                placeholder="Vehicle Model">
            @error('vehicle_model')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="year" class="form-label">Year</label>
            <select id="year" name="year" wire:model="year"
                class="form-control rounded-lg @error('year') is-invalid @enderror">
                <option value="">Select Year</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2010-2014">2010-2014</option>
                <option value="2000-2009">2000-2009</option>
                <option value="1990-1999">1990-1999</option>
                <option value="1980-1989">1980-1989</option>
                <option value="Before 1980">Before 1980</option>
            </select>
            @error('year')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group col-md-6">
            <label for="type" class="form-label">Type</label>
            <select id="type" wire:model="type" name="type"
                class="form-control rounded-lg @error('type') is-invalid @enderror">
                <option value="">Select Vehicle Type</option>
                <option value="Truck">Truck</option>
                <option value="Bus">Bus</option>
                <option value="Trailer">Trailer</option>
                <option value="Tanker">Tanker</option>
                <option value="Pickup">Pickup</option>
                <option value="Van">Van</option>
                <option value="Container">Container</option>
            </select>
            @error('type')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group col-md-6">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="number" id="capacity" wire:model="capacity" name="capacity"
                class="form-control rounded-lg @error('capacity') is-invalid @enderror" placeholder="Vehicle Capacity">
            @error('capacity')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="plate_number" class="form-label">Plate Number</label>
            <input type="text" id="plate_number" wire:model="plate_number" name="plate_number"
                class="form-control rounded-lg @error('plate_number') is-invalid @enderror" placeholder="Plate Number">
            @error('plate_number')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="vin" class="form-label">VIN</label>
            <input type="text" id="vin" name="vin" wire:model="vin"
                class="form-control rounded-lg @error('vin') is-invalid @enderror"
                placeholder="Vehicle Identification Number">
            @error('vin')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="colour" class="form-label">Colour</label>
            <select id="colour" wire:model="colour" name="colour"
                class="form-control rounded-lg @error('colour') is-invalid @enderror">
                <option value="">Select Vehicle Colour</option>
                <option value="White">White</option>
                <option value="Black">Black</option>
                <option value="Silver">Silver</option>
                <option value="Blue">Blue</option>
                <option value="Red">Red</option>
                <option value="Green">Green</option>
                <option value="Yellow">Yellow</option>
                <option value="Gray">Gray</option>
                <option value="Orange">Orange</option>
                <option value="Brown">Brown</option>
                <option value="Purple">Purple</option>
            </select>
            @error('colour')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group col-md-6">
            <label for="extended_body_type" class="form-label">Extended Body Type</label>
            <select id="extended_body_type" name="extended_body_type" wire:model="extended_body_type"
                class="form-control rounded-lg @error('extended_body_type') is-invalid @enderror">
                <option value="">Select Extended Body Type</option>
                <option value="Flatbed">Flatbed</option>
                <option value="Refrigerated">Refrigerated</option>
                <option value="Tanker">Tanker</option>
                <option value="Curtain Side">Curtain Side</option>
                <option value="Box">Box</option>
                <option value="Dump">Dump</option>
                <option value="Lowboy">Lowboy</option>
                <option value="Car Carrier">Car Carrier</option>
                <option value="Logging">Logging</option>
                <option value="Livestock">Livestock</option>
                <option value="Tipper">Tipper</option>
                <option value="Dropside">Dropside</option>
                <option value="Container Carrier">Container Carrier</option>
                <option value="Bulk Carrier">Bulk Carrier</option>
                <option value="Other">Other</option>
            </select>
            @error('extended_body_type')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-12">
            <div class="gap-3 d-md-flex d-grid align-items-center">
                <button type="submit" wire:click.prevent="save" class="px-4 btn btn-primary">
                    <span wire:loading.remove>Save</span>
                    <span wire:loading>
                        <div class="spinner-border spinner-border-sm">
                        </div>
                        Loading...
                    </span>
                </button>
                <a href="#" class="px-4 btn btn-light">Cancel</a>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        // Initialize form validation
        $('#myForm').validate({
            rules: {
                vehicle_make: {
                    required: true
                },
                vehicle_model: {
                    required: true
                },
                year: {
                    required: true
                },
                type: {
                    required: true
                },
                capacity: {
                    required: true
                },
                plate_number: {
                    required: true
                },
                vin: {
                    required: true
                },
                colour: {
                    required: true
                },
                extended_body_type: {
                    required: true
                }
            },
            messages: {
                vehicle_make: {
                    required: 'Please enter vehicle make'
                },
                vehicle_model: {
                    required: 'Please enter vehicle model'
                },
                year: {
                    required: 'Please enter year'
                },
                type: {
                    required: 'Please enter vehicle type'
                },
                capacity: {
                    required: 'Please enter vehicle capacity'
                },
                plate_number: {
                    required: 'Please enter plate number'
                },
                vin: {
                    required: 'Please enter VIN'
                },
                colour: {
                    required: 'Please enter vehicle colour'
                },
                extended_body_type: {
                    required: 'Please enter extended body type'
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function (form) {
                // Trigger Livewire save method on successful validation
                @this.save();
            }
        });
    });
</script>