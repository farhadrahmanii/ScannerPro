<div>
    <form class="row g-3" id="myForm" method="POST" action="{{route('add.store.driver')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="name" class="form-label">Driver Name</label>
            <input type="text" wire:model="name" name="name"
                class="form-control rounded-lg @error('name') is-invalid @enderror" id="name"
                placeholder="Data Science">
            @error('name')
                <span class="text-red-500 text-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="father_name" class="form-label">Father Name</label>
            <input type="text" wire:model="father_name" name="father_name"
                class="form-control rounded-lg @error('father_name') is-invalid @enderror" id="father_name"
                placeholder="Data Science">
            @error('father_name')
                <span class="text-red-500 text-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="national_id" class="form-label">National ID</label>
            <input type="text" wire:model="national_id" name="national_id"
                class="form-control rounded-lg @error('national_id') is-invalid @enderror" id="national_id"
                placeholder="Data Science">
            @error('national_id')
                <span class="text-red-500 text-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="passport_no" class="form-label">Passport No</label>
            <input type="text" wire:model="passport_no" name="passport_no"
                class="form-control rounded-lg @error('passport_no') is-invalid @enderror" id="passport_no"
                placeholder="Data Science">
            @error('passport_no')
                <span class="text-red-500 text-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="contact_information" class="form-label">Contact Information</label>
            <input type="text" wire:model="contact_information" name="contact_information"
                class="form-control rounded-lg @error('contact_information') is-invalid @enderror"
                id="contact_information" placeholder="Data Science">
            @error('contact_information')
                <span class="text-red-500 text-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" wire:model="nationality" name="nationality"
                class="form-control rounded-lg @error('nationality') is-invalid @enderror" id="nationality"
                placeholder="Data Science">
            @error('nationality')
                <span class="text-red-500 text-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="transport_company" class="form-label">Transport Company</label>
            <input type="text" wire:model="transport_company" name="transport_company"
                class="form-control rounded-lg @error('transport_company') is-invalid @enderror" id="transport_company"
                placeholder="Data Science">
            @error('transport_company')
                <span class="text-red-500 text-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="transport_company_tin" class="form-label">Transport Company TIN</label>
            <input type="text" wire:model="transport_company_tin" name="transport_company_tin"
                class="form-control rounded-lg @error('transport_company_tin') is-invalid @enderror"
                id="transport_company_tin" placeholder="Data Science">
            @error('transport_company_tin')
                <span class="text-red-500 text-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <div class="gap-3 d-md-flex d-grid align-items-center">
                <button type="submit" wire:click.prevent="save" wire:loading.attr="disabled"
                    class="px-4 btn btn-primary" wire:navigate>
                    <span wire:loading.remove>Save</span>
                    <span wire:loading>Saving...</span>
                </button>
                <a href="#" class="px-4 btn btn-light">Cancel</a>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            // Initialize jQuery Validation
            $('#myForm').validate({
                rules: {
                    name: { required: true },
                    father_name: { required: true },
                    national_id: { required: true },
                    contact_information: { required: true },
                    nationality: { required: true },
                    transport_company: { required: true },
                    transport_company_tin: { required: true }
                },
                messages: {
                    name: { required: 'Please Enter Driver Name' },
                    father_name: { required: 'Please Enter Father Name' },
                    national_id: { required: 'Please Enter National ID' },
                    contact_information: { required: 'Please Enter Contact Information' },
                    nationality: { required: 'Please Enter Nationality' },
                    transport_company: { required: 'Please Enter Transport Company' },
                    transport_company_tin: { required: 'Please Enter Transport Company TIN' }
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
                submitHandler: function () {
                    // Trigger the Livewire save method
                    @this.save(); // This will call the `save()` method in Livewire
                }
            });
        });

    </script>
</div>