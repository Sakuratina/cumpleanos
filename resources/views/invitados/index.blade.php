@extends('layouts.app')

@section('content')
    <div>
        @if($asiste)
            <form method="post" action="{{ route('invitados.desapuntarse') }}">
                @csrf
                <button type="submit">No asistir</button>
            </form>
        @else
            <form method="post" action="{{ route('invitados.apuntarse') }}">
                @csrf
                <button type="submit">Asistir</button>
            </form>
        @endif


        <ul>
            @forelse($invitados as $invitado)
                <li>
                    {{ $invitado->user->name }}
                </li>
            @empty
                No hay invitados
            @endforelse
        </ul>
    </div>
@endsection
