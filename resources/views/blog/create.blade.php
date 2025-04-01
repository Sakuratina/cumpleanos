@extends('layouts.app')

@section('content')
    <form id="miFormulario" class="formCreate" action="{{route('blog.store')}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        {{--
         formulario para escribir entradas de blog
         Esto se recibe en la funcion store cuando pulsemos el submit
         --}}
        <p>Título<input class="botonCreate" type="text" name="titulo" value="{{ old('titulo') }}" placeholder="Título">
        </p>
        @error('titulo')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <p>Descripción</p>
        <!-- Create the editor container -->
        <div class="quill-editor"></div>
        <!-- Campo oculto para enviar el contenido -->
        <input type="hidden" name="textoBlog" id="contenido">

        <!-- SUBIR ARCHIVOS -->
        <label for="archivo">Seleccionar archivo:</label>
        <input class="botonCreate" type="file" name="archivo" id="archivo">

        @error('archivo')
        <div style="color: red;">{{ $message }}</div>
        @enderror

        <p><input type="submit" value="Enviar" class="submitCreate"></p>
    </form>

    <script>
        const quill = new Quill('.quill-editor', {
            theme: 'snow'
        });
        // Antes de enviar el formulario, copiar el contenido a un input oculto
        document.getElementById('miFormulario').onsubmit = function () {
            document.getElementById('contenido').value = quill.root.innerHTML;
        };
    </script>
@endsection
