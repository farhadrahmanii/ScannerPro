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
        <h2>Cash Receipt</h2>
        <p><strong>Receipt Number:</strong> {{ $cash->id }}</p>
        <p><strong>Transaction ID:</strong> {{ $cash->transaction->transaction_id }}</p>
        <p><strong>Driver:</strong> {{ $cash->driver->name }}</p>
        <p><strong>Amount:</strong> {{ $cash->amount }}</p>
        <p><strong>Casher:</strong> {{ $cash->casher->name }}</p>
        <p><strong>Receiver:</strong> {{ $cash->receiver->name }}</p>
        <p><strong>Date:</strong> {{ $cash->date }}</p>
        <p><strong>Description:</strong> {{ $cash->description }}</p>
    </div>
    <button type="button" onclick="window.print()">Print Slip</button>
</body>

</html>