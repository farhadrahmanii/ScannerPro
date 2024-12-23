<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>ID</th>
                        <th>driver name</th>
                        <th>Vehicle Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Capacity (Ton)</th>
                        <th>Vehicle Type</th>
                        <th>Plate #</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $key => $vehicle)
                        <tr>
                            <td>
                                {{ $key + 1}}
                            </td>
                            <td>
                                {{ $vehicle->id}}
                            </td>
                            <td>
                                {{ $vehicle->driver->name}}
                            </td>
                            <td>
                                {{ $vehicle->vehicle_make}}
                            </td>
                            <td>
                                {{ $vehicle->vehicle_model}}
                            </td>
                            <td>
                                {{ $vehicle->year}}
                            </td>
                            <td>
                                {{ $vehicle->capacity}}
                            </td>
                            <td>
                                {{ $vehicle->type}}
                            </td>
                            <td>
                                {{ $vehicle->plate_number}}
                            </td>
                            <td>
                                <div class="col">
                                    <div class="flex justify-center">
                                        <div x-data="{open: false, toggle() { if (this.open) { return this.close()
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
                                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                            x-id="['dropdown-button']" class="relative">
                                            <!-- Button -->
                                            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                                :aria-controls="$id('dropdown-button')" type="button"
                                                class="relative flex items-center whitespace-nowrap justify-center gap-2 py-2 rounded-lg shadow-sm bg-green bg-green-50 hover:bg-green-100 text-green-800 border border-green-200 hover:border-gray-200 px-4">
                                                <span>Actions</span>
                                                <!-- Heroicon: micro chevron-down -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                    fill="currentColor" class="size-4">
                                                    <path fill-rule="evenodd"
                                                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                            <!-- Panel -->
                                            <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                                x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                                x-cloak
                                                class="absolute left-0 min-w-48 rounded-lg  shadow-sm mt-2 z-10 origin-top-left bg-white p-1.5 outline-none border border-gray-200">
                                                @if (Auth::user()->can('driver.edit'))
                                                    <a href="{{route('edit.driver', $vehicle->id)}}" wire:navigate
                                                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-yellow-50 focus-visible:bg-yellow-50 hover:text-yellow-600 disabled:opacity-50 disabled:cursor-not-allowed">
                                                        Edit
                                                    </a>
                                                @endif
                                                @if (Auth::user()->can('view.driver'))
                                                    <a href="{{route('vehicle.details', $vehicle->id)}}" wire:navigate
                                                        onclick="closeModalAndReset()"
                                                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-blue-50 focus-visible:bg-blue-50 hover:text-blue-600 disabled:opacity-50 disabled:cursor-not-allowed">
                                                        Vehicle Details
                                                    </a>
                                                @endif

                                                @if (Auth::user()->can('add.vehicle.to.driver'))
                                                    <a href="{{route('add.transaction.to.vehicle', $vehicle->id)}}"
                                                        wire:navigate
                                                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-green-50 hover:text-green-600 focus-visible:bg-red-50 focus-visible:text-red-600 disabled:opacity-50 disabled:cursor-not-allowed">
                                                        Add Transactions
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>ID</th>
                        <th>driver name</th>
                        <th>Vehicle Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Capacity (Ton)</th>
                        <th>Vehicle Type</th>
                        <th>Plate #</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>