<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<header>
    <div class="encabezado">
        <div class="logo">
            <img class="logoImagen" src="{{asset('logo.png')}}" alt="logo"/>
            <span>TuCumpleFeliz.com</span>
        </div>
        <div class="login">
            <a>Mí cuenta</a>
            <a>¡Registrate!</a>
        </div>
    </div>
    <div class="enlaces">
        <a>INICIO</a>
        <a>FOTOS</a>
        <a>INVITADOS</a>
        <a>REGALOS</a>
        <a href="{{route('blog.index')}}">BLOG</a>
    </div>
</header>
@yield('content')
<footer>
    <p class="nombre">Cristina León Romero 2025</p>
    <div class="footerdiv">
        <div class="privacidad">
            <h2>PRIVACIDAD</h2>
            <p>Coockies</p>
            <p>Politicas</p>
        </div>
        <div class="ayuda">
            <h2>AYUDA</h2>
            <p>Privacidad</p>
            <p>Ayuda</p>
        </div>
    </div>
</footer>

</body>
</html>
