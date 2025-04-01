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

    <a href="{{route('regalo.create')}}">Añadir regalo</a>
    <div id="lista-regalos">
        @forelse($regalos as $regalo)

            <div>
                <form method="post" action="{{route('regalo.regalar',$regalo)}}">
                    @csrf
                    <button type="submit" {{isDisabled($regalo)}}>REGALAR</button>
                    <span>{{$regalo->nombre}}</span>
                </form>
            </div>

        @empty
            No hay regalos
        @endforelse
    </div>

    {!!  $regalos->links()!!}
@endsection
