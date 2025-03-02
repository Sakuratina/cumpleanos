@extends('layouts.app')

@section('content')
    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        {{--
         Vas a hacer un formulario para escribir entradas de blog
         Esto se recibe en la funcion store cuando pulsemos el submit
         --}}
        <p>Título<input type="text" name="titulo" value="{{ old('titulo') }}" placeholder="Título"></p>
        @error('titulo')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <p>Descripción<input type="text" name="textoBlog" placeholder="..."></p>

        <!-- SUBIR ARCHIVOS -->
        <label for="archivo">Seleccionar archivo:</label>
        <input type="file" name="archivo" id="archivo" required>

        @error('archivo')
        <div style="color: red;">{{ $message }}</div>
        @enderror


        <p><input type="submit" value="Enviar"></p>


    </form>

@endsection
