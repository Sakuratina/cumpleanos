<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- QUILL -->

    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Para fotos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <!-- Styles / Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<header>
    <div class="encabezado">
        <div class="logo">
            <img class="logoImagen" src="{{asset('tarta.png')}}" alt="logo"/>
            <span>TuCumpleFeliz.com</span>
        </div>
        <div class="login">
            <a href="{{route('login')}}">Mí cuenta</a>

            @guest()
                <a href="{{route('register')}}">¡Registrate!</a>
            @endguest
        </div>
    </div>
    <div class="enlaces">
        <a href="/">INICIO</a>
        <a href="">FOTOS</a>
        <a href="">INVITADOS</a>
        <a href="">REGALOS</a>
        <a class="blog" href="{{route('blog.index')}}">BLOG</a>
    </div>
</header>
<main>
    @yield('content')
</main>
<footer>

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
        <p class="nombre">Cristina León Romero 2025</p>
    </div>

</footer>
<!-- Include the Quill library -->

</body>
</html>
