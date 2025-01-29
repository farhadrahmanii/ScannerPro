<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver ID Card</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin-top: 80px;
            font-family: "HelveticaNeue-CondensedBold", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        }

        .bg-grid-line,
        .card:after,
        .card header:before {
            background-color: #333;
            background-image:
                linear-gradient(0deg, transparent 24%, rgba(255, 255, 255, .05) 25%, rgba(255, 255, 255, .05) 26%, transparent 27%, transparent 74%, rgba(255, 255, 255, .05) 75%, rgba(255, 255, 255, .05) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, rgba(255, 255, 255, .05) 25%, rgba(255, 255, 255, .05) 26%, transparent 27%, transparent 74%, rgba(255, 255, 255, .05) 75%, rgba(255, 255, 255, .05) 76%, transparent 77%, transparent);
            height: 100%;
            background-size: 50px 50px;
        }

        .card {
            position: relative;
            height: 380px;
            width: 750px;
            margin: 0 auto;
            background: rgb(255, 255, 255);
            border-radius: 4px;
            box-shadow:
                inset 0 0 0 1px rgba(0, 0, 0, .4),
                0 0 10px rgba(0, 0, 0, .55),
                0 2px 10px rgba(0, 0, 0, .6);
        }



        .card:before {
            position: absolute;
            z-index: 2;
            content: '';
            left: 50%;
            top: -70px;
            margin: 0 0 0 -40px;
            height: 100px;
            width: 80px;
            background: rgba(255, 255, 255, .2);
            background-image:
                linear-gradient(left, rgba(255, 255, 255, .4) 0%, rgba(255, 255, 255, .1) 50%, rgba(255, 255, 255, .4) 100%),
                linear-gradient(bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 40%),
                linear-gradient(top, rgba(255, 255, 255, .8) 0%, rgba(255, 255, 255, 0) 40%);
            border-radius: 6px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .8);
            opacity: .5;
        }

        .card:after {
            position: absolute;
            content: '';
            z-index: 2;
            height: 20px;
            width: 20px;
            top: -55px;
            left: 50%;
            margin: 0 0 0 -10px;
            border-radius: 50%;
            box-shadow:
                0 0 0 5px rgba(255, 255, 255, .6),
                0 0 10px rgba(0, 0, 0, .7),
                inset 2px 2px 2px rgba(0, 0, 0, .5);
        }

        .card header {
            position: relative;
            background: rgb(20, 33, 216);
            height: 90px;
            width: 100%;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border-bottom: 2px solid rgba(180, 80, 80, .5);
            border-top: 1px solid rgba(221, 108, 108, .8);
            box-shadow:
                inset 0 1px 0 0 rgba(255, 120, 120, .8),
                0 1px 2px rgba(0, 0, 0, .4);
            padding: 35px 20px;
            opacity: .9;
        }

        .card header:after {
            position: absolute;
            content: '';
            left: 1px;
            top: 1px;
            width: 100%;
            height: 10px;
            background:
                linear-gradient(bottom, rgba(255, 255, 255, .1) 0%, rgba(255, 255, 255, .05) 70%, rgba(255, 255, 255, 0) 100%);
        }

        .card header:before {
            position: absolute;
            z-index: 1;
            content: '';
            left: 50%;
            top: 22px;
            margin: 0 0 0 -50px;
            height: 15px;
            width: 100px;
            border-radius: 25px;
            box-shadow:
                inset 1px 1px 0 1px rgba(0, 0, 0, .3),
                inset -1px -1px 0 0 rgba(255, 255, 255, .5);
        }

        .card header h1 {
            color: #fff;
            line-height: 90%;
            font-size: 35px;
            margin: 0;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, .5);
        }

        .card article {
            padding: 30px;
            display: flex;
            align-items: center;
        }

        .card article img {
            margin-right: 30px;
            width: 150px;
            height: 150px;
            transition: all .3s ease-in-out;
        }

        .card article .details {
            display: flex;
            flex-direction: column;
        }

        .card article .details h5 {
            margin: 5px 0;
            font-size: 16px;
            color: #515355;
        }
    </style>
</head>

<body class='bg-grid-line'>
    <div class='card'>
        <header>
            <h1>Driver ID Card</h1>
        </header>
        <article id="card" class='justify-between'>
            <img alt='Driver Photo' id='thumb' src='{{ asset('uploads/default.png') }}'>
            <div class='details'>
                <h5>System Code: {{ $vehicle->system_code }}</h5>
                <h5>Name: {{ $vehicle->driver->name }}</h5>
                <h5>Phone: {{ $vehicle->driver->contact_information }}</h5>
                <h5>Tazkira: {{ $vehicle->driver->national_id }}</h5>
                <h5>Vehicle VIN: {{ $vehicle->vin }}</h5>
                <h5>Plate Number: {{ $vehicle->plate_number }}</h5>
                <h5>Vehicle Color: {{ $vehicle->colour }}</h5>
            </div>
            <img alt='Driver Photo' id='thumb' src='{{ asset('assets/images/ZobairMosawer.png') }}'>
        </article>
    </div>
    <br>
    <div class="text-center mt-5" style="text-align: center;">
        <button onclick="window.print()" type="button"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Print</button>
    </div>
</body>

</html>