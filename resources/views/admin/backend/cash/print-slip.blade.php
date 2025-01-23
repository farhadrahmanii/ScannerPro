<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ps' ? 'rtl' : 'ltr' }}">

<head>
    <title>{{ __('cash_receipt.title') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .receipt {
            width: 80mm;
            margin: auto;
            border: 1px solid #000;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .receipt p {
            margin: 10px 0;
            font-size: 14px;
        }

        .receipt img {
            display: block;
            margin: 0 auto 10px;
        }

        .receipt .details {
            margin-bottom: 10px;
        }

        .receipt .details p {
            margin: 5px 0;
        }

        .receipt .amount {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .receipt .category {
            margin-top: 10px;
            border-top: 1px dashed #000;
            padding-top: 10px;
        }

        @media print {
            .receipt {
                border: none;
                width: 80mm;
                padding: 0;
            }

            button {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="receipt">
        @php
            //dd($transaction);
        @endphp
        <div class="text-center">
            <img src="{{ asset('assets/images/ZobairMosawer.png') }}" alt="Logo" style="width: 50mm; height: auto;">
        </div>
        <h2>{{ __('cash_receipt.title') }}</h2>
        <div class="details">
            <div class="category">
                <p><strong>{{ __('cash_receipt.receipt_number') }}:</strong> {{ $transaction->id }}</p>
                <p><strong>{{ __('cash_receipt.transaction_id') }}:</strong> {{ $transaction->transaction_id }}</p>
                <p><strong>{{ __('cash_receipt.bill_of_lading') }}:</strong> {{ $transaction->bill_of_landing }}</p>
            </div>
            <div class="category">
                <p><strong>{{ __('cash_receipt.driver') }}:</strong>
                    {{ $transaction->vehicle->driver->name ?? __('cash_receipt.unknown') }}</p>
                <p><strong>{{ __('cash_receipt.casher') }}:</strong> {{ $transaction->user->name }}</p>
                <p><strong>{{ __('cash_receipt.receiver') }}:</strong> {{ $transaction->user->name }}</p>
            </div>
            <div class="category">
                <p><strong>{{ __('cash_receipt.paid_by') }}:</strong>
                    {{ $transaction->vehicle->driver->name ?? __('cash_receipt.unknown') }}</p>
                <p><strong>{{ __('cash_receipt.date') }}:</strong> {{ now() }}</p>
            </div>
        </div>
        <div class="amount">
            <p><strong>{{ __('cash_receipt.amount') }}:</strong> {{ $transaction->fees_amount }}</p>
        </div>
    </div>
</body>

</html>