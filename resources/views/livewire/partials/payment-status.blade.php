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
<span
    title="{{ $transaction->payment_time ? \Carbon\Carbon::parse($transaction->payment_time)->format('Y-m-d H:i:s') : 'No Payment Time' }}">
    @if ($transaction->fees_payment)
        <button wire:click="markAsNotPaid({{ $transaction->id }})" class="text-green-600">✅ Paid</button>
    @else
        <button wire:click="markAsPaid({{ $transaction->id }})" class="text-red-600">❌ Not Paid</button>
    @endif
</span>