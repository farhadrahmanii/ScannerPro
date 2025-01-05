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
            <select class="form-control rounded-lg @error('nationality') is-invalid @enderror" wire:model="nationality"
                name="nationality" id="nationality">
                <option value="">Select Nationality</option>
                <option value="afghan">Afghan</option>
                <option value="albanian">Albanian</option>
                <option value="algerian">Algerian</option>
                <option value="american">American</option>
                <option value="andorran">Andorran</option>
                <option value="angolan">Angolan</option>
                <option value="antiguan">Antiguan</option>
                <option value="argentine">Argentine</option>
                <option value="armenian">Armenian</option>
                <option value="australian">Australian</option>
                <option value="austrian">Austrian</option>
                <option value="azerbaijani">Azerbaijani</option>
                <option value="bahamian">Bahamian</option>
                <option value="bahraini">Bahraini</option>
                <option value="bangladeshi">Bangladeshi</option>
                <option value="barbadian">Barbadian</option>
                <option value="belarusian">Belarusian</option>
                <option value="belgian">Belgian</option>
                <option value="belizean">Belizean</option>
                <option value="beninese">Beninese</option>
                <option value="bhutanese">Bhutanese</option>
                <option value="bolivian">Bolivian</option>
                <option value="bosnian">Bosnian</option>
                <option value="botswanan">Botswanan</option>
                <option value="brazilian">Brazilian</option>
                <option value="british">British</option>
                <option value="bruneian">Bruneian</option>
                <option value="bulgarian">Bulgarian</option>
                <option value="burkinabe">Burkinabe</option>
                <option value="burmese">Burmese</option>
                <option value="burundian">Burundian</option>
                <option value="cambodian">Cambodian</option>
                <option value="cameroonian">Cameroonian</option>
                <option value="canadian">Canadian</option>
                <option value="cape_verdean">Cape Verdean</option>
                <option value="central_african">Central African</option>
                <option value="chadian">Chadian</option>
                <option value="chilean">Chilean</option>
                <option value="chinese">Chinese</option>
                <option value="colombian">Colombian</option>
                <option value="comoran">Comoran</option>
                <option value="congolese">Congolese</option>
                <option value="costa_rican">Costa Rican</option>
                <option value="croatian">Croatian</option>
                <option value="cuban">Cuban</option>
                <option value="cypriot">Cypriot</option>
                <option value="czech">Czech</option>
                <option value="danish">Danish</option>
                <option value="djiboutian">Djiboutian</option>
                <option value="dominican">Dominican</option>
                <option value="dutch">Dutch</option>
                <option value="ecuadorian">Ecuadorian</option>
                <option value="egyptian">Egyptian</option>
                <option value="emirati">Emirati</option>
                <option value="equatoguinean">Equatorial Guinean</option>
                <option value="eritrean">Eritrean</option>
                <option value="estonian">Estonian</option>
                <option value="ethiopian">Ethiopian</option>
                <option value="fijian">Fijian</option>
                <option value="filipino">Filipino</option>
                <option value="finnish">Finnish</option>
                <option value="french">French</option>
                <option value="gabonese">Gabonese</option>
                <option value="gambian">Gambian</option>
                <option value="georgian">Georgian</option>
                <option value="german">German</option>
                <option value="ghanaian">Ghanaian</option>
                <option value="greek">Greek</option>
                <option value="grenadian">Grenadian</option>
                <option value="guatemalan">Guatemalan</option>
                <option value="guinean">Guinean</option>
                <option value="guyanese">Guyanese</option>
                <option value="haitian">Haitian</option>
                <option value="honduran">Honduran</option>
                <option value="hungarian">Hungarian</option>
                <option value="icelandic">Icelandic</option>
                <option value="indian">Indian</option>
                <option value="indonesian">Indonesian</option>
                <option value="iranian">Iranian</option>
                <option value="iraqi">Iraqi</option>
                <option value="irish">Irish</option>
                <option value="israeli">Israeli</option>
                <option value="italian">Italian</option>
                <option value="jamaican">Jamaican</option>
                <option value="japanese">Japanese</option>
                <option value="jordanian">Jordanian</option>
                <option value="kazakh">Kazakh</option>
                <option value="kenyan">Kenyan</option>
                <option value="korean">Korean</option>
                <option value="kuwaiti">Kuwaiti</option>
                <option value="kyrgyz">Kyrgyz</option>
                <option value="laotian">Laotian</option>
                <option value="latvian">Latvian</option>
                <option value="lebanese">Lebanese</option>
                <option value="liberian">Liberian</option>
                <option value="libyan">Libyan</option>
            </select>


            @error('nationality')
                <span class="text-red-500 text-bold">{{ $message }}</span>
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
                    class="px-4 btn btn-primary">
                    <span wire:loading.remove>Save</span>
                    <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

                </button>
                <a href="{{route('all.drivers')}}" class="px-4 btn btn-light" wire:navigate>Cancel</a>
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