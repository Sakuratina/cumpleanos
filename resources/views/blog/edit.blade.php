@extends('layouts.app')

@section('content')
    <form id="miFormulario" class="formCreate" action="{{route('blog.update',$blog)}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        {{--
         formulario para escribir entradas de blog
         Esto se recibe en la funcion store cuando pulsemos el submit
         --}}

        <p>Título<input class="botonCreate" type="text" name="titulo" value="{{ old('titulo',$blog->title) }}"
                        placeholder="Título">
        </p>
        @error('titulo')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <p>Descripción</p>


        <!-- Create the editor container -->
        <div id="editor">{!! $blog->text !!}</div>

        <!-- Campo oculto para enviar el contenido -->
        <input type="hidden" name="textoBlog" id="contenido" value="{!! $blog->text !!}">

        <!-- SUBIR ARCHIVOS -->
        <label for="archivo">Seleccionar archivo:</label>
        <input class="botonCreate" type="file" name="archivo" id="archivo">

        @error('archivo')
        <div style="color: red;">{{ $message }}</div>
        @enderror

        <p><input type="submit" value="Enviar" class="submitCreate"></p>


    </form>

    <!-- Initialize Quill editor -->

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <!-- Initialize Quill editor -->
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        // Antes de enviar el formulario, copiar el contenido a un input oculto
        document.getElementById('miFormulario').onsubmit = function () {
            document.getElementById('contenido').value = quill.root.innerHTML;
        };
    </script>
@endsection
