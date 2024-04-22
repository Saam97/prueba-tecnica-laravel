<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WePlot {{ $titulo }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>
        {{ $titulo }}
    </title>
</head>
<body class="dashboard">
    
    @include('layaouts._partials.userheader')

    @include('layaouts._partials.mensaje')

    <div class="dashboard__grid">
        @include('layaouts._partials.usersidebar')

        <main class="dashboard__contenido">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>