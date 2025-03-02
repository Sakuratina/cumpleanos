@extends('layouts.app')

@section('content')

    @foreach($blogs as $blog)
        <!--aquí insertamos lel título del blog-->
        <div class="contenidoTitulo">
            <h2 class="tituloTexto">{{$blog->title}}</h2>
        </div>



        <!--aquí insertamos el contenido del blog-->
        <div class="contenidoBlog">
            <div class="fotos">
                <img src="{{Storage::url($blog->foto)}}" alt="foto">
            </div>
            <div class="textoBlog">{{$blog->text}}

            </div>
            <!--aquí insertamos la fecha-->
            <div class="fechaBlog">
                {{$blog->created_at->ago()}}
            </div>
        </div>

    @endforeach
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        <a href="{{ asset('storage/' . session('ruta')) }}" target="_blank">Ver archivo</a>
    @endif
@endsection
