<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h2>{{ $data['title'] }}</h2>

    <p>{{ $data['paragraph'] }} </p>

    <p>Your vehicle details : </p>

    Vehicle VIN code : <b> {{ $data['vehicle_vin'] }}</b>, <br>
    Vehicle Model : <b> {{ $data['vehicle_model'] }}</b>, <br>
    Vehicle Make : <b> {{ $data['vehicle_make'] }}</b>. <br>

    <p>{{ $data['footer'] }}</p>

</body>
</html>