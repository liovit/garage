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

    <p>Cancel equipment order #{{ $data['order_id'] }}</p>

    <p>{{ $data['paragraph'] }}</p>

    @php
        $number = count($data['code']);
    @endphp

    @for($i = 0; $i < $number; $i++)

        {{ $i }}. 
        @if($data['code'][$i])
        Code: <b>{{ $data['code'][$i] }}</b>, 
        @endif
        @if($data['bar_code'][$i])
        Bar Code: <b>{{ $data['bar_code'][$i] }}</b>, 
        @endif
        @if($data['description'][$i])
        Description: <b>{{ $data['description'][$i] }}</b>, 
        @endif
        @if($data['type'][$i])
        Type: <b>{{ $data['type'][$i] }}</b>, 
        @endif
        @if($data['quantity'][$i])
        Quantity: <b>{{ $data['quantity'][$i] }}</b>.@endif <br>

    @endfor

    <p>{{ $data['footer'] }}</p>

</body>
</html>