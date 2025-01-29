<div class="rounded-lg">
    <form id="myForm" method="POST" action="{{ route('add.store.driver') }}" enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        <!-- Driver Name -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="name"
                    class="block text-sm font-medium text-gray-700">{{ __('messages.Driver Name') }}</label>
                <input type="text" wire:model.lazy="name" name="name" id="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Father Name -->
            <div>
                <label for="father_name"
                    class="block text-sm font-medium text-gray-700">{{ __('messages.Father Name') }}</label>
                <input type="text" wire:model.lazy="father_name" name="father_name" id="father_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('father_name') border-red-500 @enderror">
                @error('father_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- National ID -->
            <div>
                <label for="national_id"
                    class="block text-sm font-medium text-gray-700">{{ __('messages.National ID') }}</label>
                <input type="text" wire:model.lazy="national_id" name="national_id" id="national_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('national_id') border-red-500 @enderror">
                @error('national_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Contact Information -->
            <div>
                <label for="contact_information"
                    class="block text-sm font-medium text-gray-700">{{ __('messages.Contact Information') }}</label>
                <input type="text" wire:model.lazy="contact_information" name="contact_information"
                    id="contact_information"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('contact_information') border-red-500 @enderror">
                @error('contact_information') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Nationality -->
            <div>
                <label for="nationality"
                    class="block text-sm font-medium text-gray-700">{{ __('messages.Nationality') }}</label>
                <select wire:model="nationality" name="nationality" id="nationality"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nationality') border-red-500 @enderror">
                    <option value="">{{ __('messages.Select Nationality') }}</option>
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
                @error('nationality') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="transport_company_tin"
                    class="block text-sm font-medium text-gray-700">{{ __('messages.Transport Company TIN') }}</label>
                <input type="text" wire:model.lazy="transport_company_tin"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('transport_company_tin') border-red-500 @enderror">
                @error('transport_company_tin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

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
                        <h5 class="text-lg font-medium">{{ __('messages.Add New Transport Company') }}</h5>
                        <input type="text" wire:model="transport_company" placeholder="{{ __('messages.Company Name') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm mb-2 @error('transport_company') border-red-500 @enderror">
                        @error('transport_company') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <button type="button" wire:click="addTransportCompany" class="btn btn-primary btn-sm">
                            {{ __('messages.Add Transport Company') }}
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Transport Company Search/Selection -->
        <div class="grid grid-cols-1 md:grid-cols-3">

        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="flex justify-end space-x-4">
            <button type="submit" wire:click.prevent="save" wire:loading.attr="disabled" class="btn btn-primary">
                <span wire:loading.remove>{{ __('messages.Save') }}</span>
                <span wire:loading class="spinner-border spinner-border-sm"></span>
            </button>
            <a href="{{ route('all.drivers') }}" class="btn btn-light">{{ __('messages.Cancel') }}</a>
        </div>
    </form>
</div>