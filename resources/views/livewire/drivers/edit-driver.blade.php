<div>
    <form class="row g-3" wire:submit.prevent="update">
        @csrf
        <!-- Driver Name -->
        <div class="form-group col-md-6">
            <label for="name" class="form-label">Driver Name</label>
            <input type="text" wire:model="name" name="name"
                class="form-control rounded-lg @error('name') is-invalid @enderror" id="name" placeholder="Driver Name">
            @error('name')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Father's Name -->
        <div class="form-group col-md-6">
            <label for="father_name" class="form-label">Father's Name</label>
            <input type="text" wire:model="father_name" name="father_name"
                class="form-control rounded-lg @error('father_name') is-invalid @enderror" id="father_name"
                placeholder="Father's Name">
            @error('father_name')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- National ID -->
        <div class="form-group col-md-6">
            <label for="national_id" class="form-label">National ID</label>
            <input type="text" wire:model="national_id" name="national_id"
                class="form-control rounded-lg @error('national_id') is-invalid @enderror" id="national_id"
                placeholder="National ID">
            @error('national_id')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Passport No -->
        <div class="form-group col-md-6">
            <label for="passport_no" class="form-label">Passport No</label>
            <input type="text" wire:model="passport_no" name="passport_no"
                class="form-control rounded-lg @error('passport_no') is-invalid @enderror" id="passport_no"
                placeholder="Passport No">
            @error('passport_no')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Contact Information -->
        <div class="form-group col-md-6">
            <label for="contact_information" class="form-label">Contact Information</label>
            <input type="text" wire:model="contact_information" name="contact_information"
                class="form-control rounded-lg @error('contact_information') is-invalid @enderror"
                id="contact_information" placeholder="Contact Information">
            @error('contact_information')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nationality -->
        <div class="form-group col-md-6">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" wire:model="nationality" name="nationality"
                class="form-control rounded-lg @error('nationality') is-invalid @enderror" id="nationality"
                placeholder="Nationality">
            @error('nationality')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Transport Company -->
        <div class="form-group col-md-6">
            <label for="transport_company_id" class="form-label">Transport Company</label>
            <select wire:model="transport_company_id" name="transport_company_id"
                class="form-control rounded-lg @error('transport_company_id') is-invalid @enderror"
                id="transport_company_id">
                <option value="">Select a transport company</option>
                @foreach($transportCompanies as $company)
                    <option value="{{ $company->id }}">{{ $company->transport_company_name }}</option>
                @endforeach
            </select>
            @error('transport_company_id')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Update Driver</button>
        </div>
    </form>
</div>