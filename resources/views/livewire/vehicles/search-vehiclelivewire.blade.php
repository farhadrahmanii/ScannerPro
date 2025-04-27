<div class="card">
    <div class="card-body">
        <input class="form-control form-control-sm mb-3" wire:model.debounce.300ms="search" type="text"
            placeholder="Search Vehicles" aria-label="Search Vehicles">

        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Driver Name</th>
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
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $vehicle->driver->name ?? 'N/A' }}</td>
                            <td>{{ $vehicle->vehicle_make }}</td>
                            <td>{{ $vehicle->vehicle_model }}</td>
                            <td>{{ $vehicle->year }}</td>
                            <td>{{ $vehicle->capacity }}</td>
                            <td>{{ $vehicle->type }}</td>
                            <td>{{ $vehicle->plate_number }}</td>
                            <td>
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open" @click.away="open = false"
                                        class="relative flex items-center whitespace-nowrap justify-center gap-2 py-2 rounded-lg shadow-sm bg-green-50 hover:bg-green-100 text-green-800 border border-green-200 hover:border-gray-200 px-4">
                                        <span>Actions</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                            class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div x-show="open" x-transition.origin.top.left
                                        class="absolute left-0 min-w-48 rounded-lg shadow-sm mt-2 z-10 origin-top-left bg-white p-1.5 outline-none border border-gray-200"
                                        style="display: none;">
                                        @if (Auth::user()->can('driver.edit'))
                                            <a href="{{ route('edit.driver', $vehicle->id) }}" 
                                                class="block px-2 py-1.5 rounded-md text-gray-800 hover:bg-yellow-50 hover:text-yellow-600">
                                                Edit
                                            </a>
                                        @endif
                                        @if (Auth::user()->can('view.driver'))
                                            <a href="{{ route('vehicle.details', $vehicle->id) }}" 
                                                onclick="closeModalAndReset()"
                                                class="block px-2 py-1.5 rounded-md text-gray-800 hover:bg-blue-50 hover:text-blue-600">
                                                Vehicle Details
                                            </a>
                                        @endif
                                        @if (Auth::user()->can('add.vehicle.to.driver'))
                                            <a href="{{ route('add.transaction.to.vehicle', $vehicle->id) }}" 
                                                class="block px-2 py-1.5 rounded-md text-gray-800 hover:bg-green-50 hover:text-green-600">
                                                Add Transactions
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Driver Name</th>
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
        <div class="mt-3">
            {{ $vehicles->links() }}
        </div>
    </div>
</div>