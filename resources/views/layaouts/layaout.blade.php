<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WePlot {{ $titulo }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>
        {{ $titulo }}
    </title>
</head>
<body>
    @include('layaouts._partials.header')
    
    @include('layaouts._partials.mensaje')

    @yield('content')
</body>
</html>