@extends('layouts.app')

@php
    $isEdit=isset($regalo);
@endphp


@section('content')
    @if($isEdit)
        <form class="formBorrar" action="{{route('regalo.destroy')}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Borrar</button>
        </form>
    @endif
<div class="divFotoRegaloAñadir">

    <form class="formInsertarRegalo" action="{{ $isEdit ? route('regalo.update', $regalo->id) : route('regalo.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $regalo->nombre ?? '') }}" required>
        </div>

        <div>
            <label for="url">URL</label>
            <input type="url" id="url" name="url" value="{{ old('url', $regalo->url ?? '') }}" >
        </div>

        <div>
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto" accept="image/*">
            @if($isEdit && $regalo->foto)
                <img src="{{ asset('storage/' . $regalo->foto) }}" alt="Foto actual" width="100">
            @endif
        </div>

        <button type="submit">{{ $isEdit ? 'Actualizar' : 'Crear' }}</button>
    </form>
<div class="h2RegaloDiv">
    <h2 class="h2Regalo">¡Agrega un enlace y una foto para mejorar la calidad de la lista!</h2>
</div>
    </div>
@endsection
