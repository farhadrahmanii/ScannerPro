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
        @if (Auth::user()->can('transaction.edit'))
            <a href="{{ route('edit.transaction', $transaction->id) }}"
                class="block px-4 py-2 text-sm text-yellow-600 hover:bg-yellow-50" wire:navigate>
                Edit
            </a>
        @endif
        @if (Auth::user()->can('view.driver'))
            <a href="{{ route('vehicle.details', $transaction->id) }}"
                class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50" wire:navigate>
                Vehicle Details
            </a>
        @endif
        @if (Auth::user()->can('add.vehicle.to.driver'))
            <a href="{{ route('add.transaction.to.vehicle', $transaction->id) }}"
                class="block px-4 py-2 text-sm text-orange-600 hover:bg-orange-50" wire:navigate>
                Add Transactions
            </a>
        @endif
        @if (Auth::user()->can('get.cash'))
            @if (!$transaction->fees_payment)
                <button wire:click="markAsPaid({{ $transaction->id }})"
                    class="block w-full text-left px-4 py-2 text-sm text-green-600 hover:bg-green-50">
                    Payment
                </button>
            @else
                <a href="{{ route('backend.cash.print-slip', $transaction->id) }}"
                    class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50" wire:navigate>
                    Print Slip
                </a>
            @endif
        @endif
        <a href="{{ route('delete.transactions', $transaction->id) }}"
            class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50" wire:click.prevent="d({{ $transaction->id }})"
            wire:navigate wire:confirm="Are you sure you want to delete this post?">
            Delete
        </a>
    </div>
</div>