<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ps' ? 'rtl' : 'ltr' }}">

<head>
    <title>Cash Receipt</title>
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

        .receipt table {
            width: 100%;
            border-collapse: collapse;
        }

        .receipt table td {
            padding: 5px;
        }

        .receipt table td.label {
            text-align: left;
            font-weight: bold;
        }

        .receipt table td.value {
            text-align: right;
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
        <h2>Cash Receipt</h2>
        <div class="details">
            <div class="category">
                <table>
                    <tr>
                        <td class="label">Receipt Number:</td>
                        <td class="value">{{ $transaction->id }}</td>
                    </tr>
                    <tr>
                        <td class="label">Transaction ID:</td>
                        <td class="value">{{ $transaction->transaction_id }}</td>
                    </tr>
                    <tr>
                        <td class="label">Bill of Lading:</td>
                        <td class="value">{{ $transaction->bill_of_landing }}</td>
                    </tr>
                </table>
            </div>
            <div class="category">
                <table>
                    <tr>
                        <td class="label">Driver:</td>
                        <td class="value">{{ $transaction->vehicle->driver->name ?? 'Unknown' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Casher:</td>
                        <td class="value">{{ $transaction->user->name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Receiver:</td>
                        <td class="value">{{ $transaction->user->name }}</td>
                    </tr>
                </table>
            </div>
            <div class="category">
                <table>
                    <tr>
                        <td class="label">Paid By:</td>
                        <td class="value">{{ $transaction->vehicle->driver->name ?? 'Unknown' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Date:</td>
                        <td class="value">{{ now() }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="amount">
            <p><strong>Amount:</strong> {{ $transaction->fees_amount }}</p>
        </div>
    </div>
</body>

</html>