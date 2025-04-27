<div class="col">
    <div class="flex justify-center">
        <div x-data="{open: false, toggle() { if (this.open) {
                                                                                                                                                                        return this.close()
                                                                                                                                                                    }

                                                                                                                                                                    this.$refs.button.focus()

                                                                                                                                                                    this.open = true
                                                                                                                                                                },
                                                                                                                                                                close(focusAfter) {
                                                                                                                                                                    if (! this.open) return
                                                                                                                                                                    this.open = false
                                                               focusAfter && focusAfter.focus()
                                                                                                                                                                }
                                                                                                                                                            }"
            x-on:keydown.escape.prevent.stop="close($refs.button)"
            x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
            class="relative">
            <!-- Button -->
            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                type="button"
                class="relative flex items-center whitespace-nowrap justify-center gap-2 py-2 rounded-lg shadow-sm bg-green bg-green-50 hover:bg-green-100 text-green-800 border border-green-200 hover:border-gray-200 px-4">
                <span>{{ __('messages.actions') }}</span>

                <!-- Heroicon: micro chevron-down -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd"
                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Panel -->
            <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                :id="$id('dropdown-button')" x-cloak
                class="absolute left-0 min-w-48 rounded-lg  shadow-sm mt-2 z-10 origin-top-left bg-white p-1.5 outline-none border border-gray-200">
                @if (Auth::user()->can('driver.edit'))
                    <a href="{{route('edit.driver', $drive->id)}}"
                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-yellow-50 focus-visible:bg-yellow-50 hover:text-yellow-600 disabled:opacity-50 disabled:cursor-not-allowed">
                        {{ __('messages.edit') }}
                    </a>
                @endif
                @if (Auth::user()->can('view.driver'))
                    <a href="{{route('driver.details', $drive->id)}}" onclick="closeModalAndReset()"
                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-blue-50 focus-visible:bg-blue-50 hover:text-blue-600 disabled:opacity-50 disabled:cursor-not-allowed">
                        {{ __('messages.driver_details') }}
                    </a>
                @endif

                @if (Auth::user()->can('add.vehicle.to.driver'))
                    <a href="{{route('add.vehicle', $drive->id)}}"
                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-green-50 hover:text-green-600 focus-visible:bg-red-50 focus-visible:text-red-600 disabled:opacity-50 disabled:cursor-not-allowed">
                        {{ __('messages.add_vehicle') }}
                    </a>
                @endif
                @if (Auth::user()->can('delete.driver'))
                    <a href="{{route('delete.driver', $drive->id)}}"
                        onclick="return confirm('{{ __('Are you sure you want to delete this driver?') }}')"
                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-red-50 focus-visible:bg-red-50 hover:text-red-600 disabled:opacity-50 disabled:cursor-not-allowed">
                        {{ __('messages.delete') }}
                    </a>
                @endif

            </div>
        </div>
    </div>
</div>