<div>
    <form class="row g-3" method="POST" action="{{ route('add.vehicle.store') }}" id="myForm"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="vehicle_make" class="form-label">Vehicle Make</label>
            <input type="text" id="vehicle_make" name="vehicle_make" wire:model="vehicle_make"
                class="form-control rounded-lg @error('vehicle_make') is-invalid @enderror" placeholder="Vehicle Make">
            @error('vehicle_make')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="driver_id" class="form-label">Driver</label>
            <select id="driver_id" name="driver_id" wire:model="driver_id"
                class="form-control rounded-lg @error('driver') is-invalid @enderror">
                <option value="" selected disabled>Select Driver</option>
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach

                <!-- Add more options as needed -->
            </select>
            @error('driver_id')
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
            <input type="text" id="year" name="year" wire:model="year"
                class="form-control rounded-lg @error('year') is-invalid @enderror" placeholder="Year">
            @error('year')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="type" class="form-label">Type</label>
            <input type="text" id="type" wire:model="type" name="type"
                class="form-control rounded-lg @error('type') is-invalid @enderror" placeholder="Vehicle Type">
            @error('type')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="text" id="capacity" wire:model="capacity" name="capacity"
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
            <input type="text" id="colour" name="colour" wire:model="colour"
                class="form-control rounded-lg @error('colour') is-invalid @enderror" placeholder="Vehicle Colour">
            @error('colour')
                <span class="text-red-500 text-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="extended_body_type" class="form-label">Extended Body Type</label>
            <input type="text" id="extended_body_type" wire:model="extended_body_type" name="extended_body_type"
                class="form-control rounded-lg @error('extended_body_type') is-invalid @enderror"
                placeholder="Extended Body Type">
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