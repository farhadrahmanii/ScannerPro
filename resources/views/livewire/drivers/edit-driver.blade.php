<div>
    <form class="row g-3" wire:submit.prevent="update">
        @csrf
        <!-- Driver Name -->
        <div class="form-group col-md-6">
            <label for="name" class="form-label">{{ __('driver.name') }}</label>
            <input type="text" wire:model="name" name="name"
                class="form-control rounded-lg @error('name') is-invalid @enderror" id="name"
                placeholder="{{ __('driver.name_placeholder') }}">
            @error('name')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Father's Name -->
        <div class="form-group col-md-6">
            <label for="father_name" class="form-label">{{ __('driver.father_name') }}</label>
            <input type="text" wire:model="father_name" name="father_name"
                class="form-control rounded-lg @error('father_name') is-invalid @enderror" id="father_name"
                placeholder="{{ __('driver.father_name_placeholder') }}">
            @error('father_name')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- National ID -->
        <div class="form-group col-md-6">
            <label for="national_id">{{ __('driver.national_id') }}</label>
            <select wire:model="national_id" data-pharaonic="select2" data-component-id="{{ $this->getId() }}"
                name="national_id" id="national_id" class="form-control @error('national_id') is-invalid @enderror">
                <option value="">{{ __('driver.select_national_id') }}</option>
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
            @error('national_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Passport No -->
        <div class="form-group col-md-6">
            <label for="passport_no" class="form-label">{{ __('driver.passport_no') }}</label>
            <input type="text" wire:model="passport_no" name="passport_no"
                class="form-control rounded-lg @error('passport_no') is-invalid @enderror" id="passport_no"
                placeholder="{{ __('driver.passport_no_placeholder') }}">
            @error('passport_no')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Contact Information -->
        <div class="form-group col-md-6">
            <label for="contact_information" class="form-label">{{ __('driver.contact_information') }}</label>
            <input type="text" wire:model="contact_information" name="contact_information"
                class="form-control rounded-lg @error('contact_information') is-invalid @enderror"
                id="contact_information" placeholder="{{ __('driver.contact_information_placeholder') }}">
            @error('contact_information')
                <span class="text-danger text-bold">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nationality -->
        <div class="form-group col-md-6">
            <label for="nationality">{{ __('driver.nationality') }}</label>
            <select wire:model="nationality" data-pharaonic="select2" data-component-id="{{ $this->getId() }}"
                name="nationality" id="nationality" class="form-control @error('nationality') is-invalid @enderror">
                <option value="">{{ __('driver.select_nationality') }}</option>
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

        <!-- Transport Company -->
        <div class="form-group col-md-6">
            <label for="transport_company_id" class="form-label">{{ __('driver.transport_company') }}</label>
            <select wire:model="transport_company_id" data-pharaonic="select2" data-component-id="{{ $this->getId() }}"
                name="transport_company_id"
                class="form-control rounded-lg @error('transport_company_id') is-invalid @enderror"
                id="transport_company_id">
                <option value="">{{ __('driver.select_transport_company') }}</option>
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
            <button type="submit" class="btn btn-primary">{{ __('driver.update_button') }}</button>
        </div>
    </form>

</div>