<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">{{ __('messages.Add User') }}</h5>

        <form class="space-y-6" method="POST" action="" id="myForm" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('messages.Name') }}</label>
                    <input type="text" wire:model="name" name="name" id="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                        placeholder="{{ __('messages.Ahmad') }}">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('messages.Email') }}</label>
                    <input type="email" wire:model="email" name="email" id="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                        placeholder="{{ __('messages.example@gmail.com') }}">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('messages.Phone') }}</label>
                    <input type="text" wire:model="phone" name="phone" id="phone"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('phone') border-red-500 @enderror"
                        placeholder="{{ __('messages.07xxxxxxxx') }}">
                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('messages.Password') }}</label>
                    <input type="password" wire:model="password" name="password" id="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('password') border-red-500 @enderror"
                        placeholder="{{ __('messages.****************') }}">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="site_id" class="block text-sm font-medium text-gray-700">{{ __('messages.Select Site') }}</label>
                    <select wire:model="site_id" name="site_id" id="site_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('site_id') border-red-500 @enderror">
                        <option value="" disabled selected>{{ __('messages.Select Province') }}</option>
                        @foreach ($allSites as $site)
                            <option value="{{ $site->id }}">{{ $site->site_name }}</option>
                        @endforeach
                    </select>
                    @error('site_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="permissions" class="block text-sm font-medium text-gray-700">{{ __('messages.Permissions') }}</label>
                <div class="space-y-4">
                    @foreach ($permissions->groupBy('group_name') as $groupName => $groupedPermissions)
                        <div>
                            <h5 class="text-lg font-medium text-gray-700">{{ $groupName }}</h5>
                            <hr class="my-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($groupedPermissions as $permission)
                                    <div class="flex items-center">
                                        <input type="checkbox" wire:model="selectedPermissions"
                                            value="{{ $permission->name }}" id="permission-{{ $permission->id }}"
                                            class="form-check-input h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="permission-{{ $permission->id }}"
                                            class="ml-2 block text-sm text-gray-900">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('selectedPermissions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">{{ __('messages.Photo') }}</label>
                    <input type="file" wire:model="photo" name="photo" id="photo"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('photo') border-red-500 @enderror">
                    @error('photo') <span class="text-red-500 text-sm">{{ $message }} {{ __('messages.or may Check the Image size or May Check the Image Type should be | jpg | png | jpeg') }}</span> @enderror
                </div>

                <div>
                    <label for="photo_preview" class="block text-sm font-medium text-gray-700">{{ __('messages.Photo Preview') }}</label>
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="mt-2 h-24 w-24 rounded-md">
                    @endif
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" wire:click.prevent="save" class="btn btn-primary">
                    <span wire:loading.remove>{{ __('messages.Save') }}</span>
                    <span wire:loading class="spinner-border spinner-border-sm"></span>
                </button>
                <a href="{{ route('users.list') }}" class="btn btn-light">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>