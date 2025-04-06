@extends('layouts.app')

@section('content')
    <div class="blogestilo">
        @auth
            <a class="crearEntrada" href="{{route('blog.create')}}">Nueva entrada</a>
        @endauth
        @foreach($blogs as $blog)
            {{--aquí insertamos lel título del blog--}}

            <div class="botones">


                <form method="post" action="{{route('blog.destroy', $blog)}}">
                    @csrf
                    @method('delete')
                    <a>
                        <button type="submit">
                            <img class="borrar" src="{{asset('images/borrar.png')}}" alt="Borrar">
                        </button>
                    </a>

                </form>
                <a href="{{route('blog.edit', $blog)}}">
                    <button>
                        <img class="editar" src="{{asset('images/editar.png')}}" alt="Editar">
                    </button>
                </a>
            </div>

            {{--aquí insertamos el contenido del blog--}}

            <div class="contenidoBlog">

                {{--FOTOS--}}
                <div class="fotos">
                    <img src="{{Storage::url($blog->foto)}}" alt="foto">
                </div>

                <div class="contenidoLateral">

                    {{--TEXTO--}}
                    <div class="contenidoTitulo">
                        <h2 class="tituloTexto">{{$blog->title}}</h2>
                    </div>
                    <div class="textoBlog">{!! $blog->text !!}</div>

                    <div class="pieFoto">
                        {{--FECHA--}}
                        <div class="fechaBlog">
                            {{$blog->created_at->ago()}}
                        </div>
                        {{--AUTOR--}}
                        <div class="autor">{{$blog->user->name}}</div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
    {{$blogs->links()}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        <a href="{{ asset('storage/' . session('ruta')) }}" target="_blank">Ver archivo</a>
    @endif
@endsection
