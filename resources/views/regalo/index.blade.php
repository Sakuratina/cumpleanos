@extends('layouts.app')


@php
    function isDisabled(\App\Models\Regalo $regalo) {
    if(!$regalo->user_id)
        return 'disabled';
        else
            return '';
}
@endphp

@section('content')
    <div class="seccionRegalos">
        <div class="divAnadirRegalo">
            <a CLASS="anadirRegalo" href="{{route('regalo.create')}}">Añadir regalo</a>
        </div>
        <div class="listaRegalos" id="lista-regalos">
            @forelse($regalos as $regalo)
                <div class="divRegalos">
                    @if($regalo->foto)
                        <img style="max-width: 200px" src="{{asset('storage/'.$regalo->foto)}}">
                    @endif

                    <form class="formRegalos" method="post" action="{{route('regalo.regalar',$regalo)}}">
                        @csrf
                        <button type="submit" {{isDisabled($regalo)}}>REGALAR</button>

                        @if($regalo->url)
                            <a href="{{$regalo->url}}">{{$regalo->nombre}}</a>
                        @else
                            <span>{{$regalo->nombre}}</span>
                        @endif
                    </form>
                </div>

            @empty
                No hay regalos
            @endforelse
        </div>
    </div>

    {!!  $regalos->links()!!}
@endsection
