<!DOCTYPE html>
<html>

<head>
    <title>Cash Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        .receipt {
            width: 80%;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
        }

        .receipt p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="receipt">
        @php
            //dd($transaction);
        @endphp
        <h2>Cash Receipt</h2>
        <p><strong>Receipt Number:</strong> {{ $transaction->id }}</p>
        <p><strong>Transaction ID:</strong> {{ $transaction->transaction_id }}</p>
        <p><strong>Bill Of Lading:</strong> {{ $transaction->bill_of_landing }}</p>
        <p><strong>Driver:</strong> {{ $transaction->driver->name ?? 'Unkown' }}</p>
        <p><strong>Casher:</strong> {{ $transaction->user->name }}</p>
        <p><strong>Receiver:</strong> {{ $transaction->user->name }}</p>
        <p><strong>Date:</strong> {{ now() }}</p>
        <p><strong>Amount:</strong> {{ $transaction->fees_amount }}</p>
    </div>
    <button type="button" onclick="window.print()">Print Slip</button>
</body>

</html>