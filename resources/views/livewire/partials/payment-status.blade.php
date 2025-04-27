<style>
    span[title] {
        position: relative;
        cursor: pointer;
    }

    span[title]:hover::after {
        content: attr(title);
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: #333;
        color: #fff;
        padding: 5px;
        border-radius: 4px;
        white-space: nowrap;
        z-index: 10;
        font-size: 12px;
    }
</style>
@php

@endphp
<div x-data="{ showModal: false, action: null }">
    <span
        title="{{ $transaction->payment_time ? \Carbon\Carbon::parse($transaction->payment_time)->format('Y-m-d H:i:s') : __('transaction-actions.No Payment Time') }}">
        @if ($transaction->fees_payment)
            <button @click="action = 'markAsNotPaid'; showModal = true" class="text-green-600">✅ {{ __('transaction-actions.Paid') }}</button>
        @else
            <button @click="action = 'markAsPaid'; showModal = true" class="text-red-600">❌ {{ __('transaction-actions.Not Paid') }}</button>
        @endif
    </span>
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold mb-4">{{ __('transaction-actions.Confirm Payment') }}</h2>
            <p class="mb-4">{{ __('transaction-actions.Are you sure you want to proceed with this action?') }}</p>
            <div class="flex justify-end gap-4">
                <button @click="showModal = false"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">{{ __('transaction-actions.Cancel') }}</button>
                <button @click="$wire[action]({{ $transaction->id }}); showModal = false"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">{{ __('transaction-actions.Yes, Proceed') }}</button>
            </div>
        </div>
    </div>
</div>