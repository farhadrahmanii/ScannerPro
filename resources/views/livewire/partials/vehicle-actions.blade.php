<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" @click.away="open = false"
        class="relative flex items-center justify-center gap-2 py-1 px-3 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700">
        Actions
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
            <path fill-rule="evenodd"
                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div x-show="open" x-transition
        class="absolute z-10 mt-2 min-w-[10rem] bg-white border border-gray-200 rounded-md shadow-lg">
        @if (Auth::user()->can('driver.edit'))
            <a href="{{ route('edit.driver', $vehicle->id) }}"
                class="block px-4 py-2 text-sm text-yellow-600 hover:bg-yellow-50" wire:navigate>
                Edit
            </a>
        @endif
        @if (Auth::user()->can('view.driver'))
            <a href="{{ route('vehicle.details', $vehicle->id) }}"
                class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50" wire:navigate>
                Vehicle Details
            </a>
        @endif
        @if (Auth::user()->can('add.vehicle.to.driver'))
            <a href="{{ route('add.transaction.to.vehicle', $vehicle->id) }}"
                class="block px-4 py-2 text-sm text-green-600 hover:bg-green-50" wire:navigate>
                Add Transactions
            </a>
        @endif
    </div>
</div>