<div>
    <form id="myForm" method="POST" action="{{ route('add.store.driver') }}" enctype="multipart/form-data"
        class="row g-3">
        @csrf

        <!-- Driver Name -->
        <div class="form-group col-md-6">
            <label for="name">Driver Name</label>
            <input type="text" wire:model.lazy="name" name="name" id="name"
                class="form-control @error('name') is-invalid @enderror">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Father Name -->
        <div class="form-group col-md-6">
            <label for="father_name">Father Name</label>
            <input type="text" wire:model.lazy="father_name" name="father_name" id="father_name"
                class="form-control @error('father_name') is-invalid @enderror">
            @error('father_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- National ID -->
        <div class="form-group col-md-6">
            <label for="national_id">National ID</label>
            <input type="text" wire:model.lazy="national_id" name="national_id" id="national_id"
                class="form-control @error('national_id') is-invalid @enderror">
            @error('national_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Contact Information -->
        <div class="form-group col-md-6">
            <label for="contact_information">Contact Information</label>
            <input type="text" wire:model.lazy="contact_information" name="contact_information" id="contact_information"
                class="form-control @error('contact_information') is-invalid @enderror">
            @error('contact_information') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Nationality -->
        <div class="form-group col-md-6">
            <label for="nationality">Nationality</label>
            <select wire:model="nationality" name="nationality" id="nationality"
                class="form-control @error('nationality') is-invalid @enderror">
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
            @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <!-- Transport Company Search/Selection -->
        <div class="form-group col-md-6">
            <label for="transport_company_tin">Transport Company TIN</label>
            <input type="text" wire:model.lazy="transport_company_tin"
                class="form-control @error('transport_company_tin') is-invalid @enderror">
            @error('transport_company_tin') <span class="text-danger">{{ $message }}</span> @enderror

            <!-- Search Results -->
            @if (!empty($searchResults))
                <ul class="list-group mt-2">
                    @foreach ($searchResults as $result)
                        <li class="list-group-item list-group-item-action"
                            wire:click="selectTransportCompany({{ $result['id'] }})">
                            {{ $result['transport_company_name'] }} - {{ $result['transport_company_tin'] }}
                        </li>
                    @endforeach
                </ul>
            @endif

            <!-- Add New Company Form -->
            @if ($showAddCompanyForm)
                <div class="mt-3">
                    <h5>Add New Transport Company</h5>
                    <input type="text" wire:model="transport_company" placeholder="Company Name"
                        class="form-control mb-2 @error('transport_company') is-invalid @enderror">
                    @error('transport_company') <span class="text-danger">{{ $message }}</span> @enderror

                    <button type="button" wire:click="addTransportCompany" class="btn btn-primary btn-sm">
                        Add Transport Company
                    </button>
                </div>
            @endif
        </div>
        <!-- Submit and Cancel Buttons -->
        <div class="col-md-12">
            <div class="d-flex gap-3 align-items-center">
                <button type="submit" wire:click.prevent="save" wire:loading.attr="disabled" class="btn btn-primary">
                    <span wire:loading.remove>Save</span>
                    <span wire:loading class="spinner-border spinner-border-sm"></span>
                </button>
                <a href="{{ route('all.drivers') }}" class="btn btn-light">Cancel</a>
            </div>
        </div>
    </form>
</div>