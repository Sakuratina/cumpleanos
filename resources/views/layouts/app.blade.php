<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- photoswipe -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.4/photoswipe.min.css">

    <!-- QUILL -->

    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Para fotos -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <!-- Styles / Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<header>
    <div class="encabezado">
        <div class="logo">
            <img class="logoImagen" src="{{asset('tarta.png')}}" alt="logo"/>
            <a href="/">TuCumpleFeliz.com</a>
        </div>
        <div class="login">
            @auth()
                <!-- <a href="{{route('login')}}">Mí cuenta</a> -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Desconectar</button>
                </form>

            @endauth
            @guest()
                <a href="{{route('login')}}">¡Inicia!</a>
                <a href="{{route('register')}}">¡Registrate!</a>
            @endguest
        </div>
    </div>
    <div class="enlaces">
        <a href="/">INICIO</a>
        <a href="{{route('galeria')}}">FOTOS</a>
        <a href="{{route('invitados.index')}}">INVITADOS</a>
        <a href="{{route('regalo.index')}}">REGALOS</a>
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

    </div>
    <p class="nombre">Cristina León Romero 2025</p>
</footer>

</body>
</html>
