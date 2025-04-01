@extends('layouts.app')

@section('content')
    <main class="inicio">

        <h1>¡Haz de cada cumpleaños un recuerdo inolvidable!
        </h1>
        <div class="iconosInicio">
            <a href="{{route('galeria')}}">
                <div>
                    <span class="icono">📸</span>
                    <h2>Captura los mejores momentos</h2>
                    <p>Guarda y organiza todas las fotos de tus celebraciones en un solo lugar. Comparte los mejores
                        momentos con tus invitados y revive cada instante siempre que quieras.</p>
                </div>
            </a>
            <a href="">
                <div>
                    <span class="icono">🎉</span>
                    <h2>Envía invitaciones automáticas</h2>
                    <p>Olvídate de hacer listas y enviar mensajes uno por uno. Con nuestra herramienta, invita a todos
                        tus amigos y familiares de manera rápida y sencilla, con confirmación automática.</p>
                </div>
            </a>
            <a href="{{route('regalo.create')}}">
                <div>
                    <span class="icono">🎁</span>
                    <h2>Encuentra el detalle perfecto</h2>
                    <p>Gracias a nuestra integración con Amazon, crea una lista de deseos personalizada y facilita a tus
                        invitados la elección del regalo ideal. ¡Recibe justo lo que quieres sin complicaciones!</p>
                </div>
            </a>
            <a href="{{route('blog.index')}}">
                <div>
                    <span class="icono">📝</span>
                    <h2>Comparte tus fiestas con tus amigos</h2>
                    <p>Sube fotos, cuenta anécdotas y comparte la emoción de cada celebración. Inspira a otros con
                        ideas, decoraciones y momentos especiales de tus eventos.</p>
                </div>
            </a>
        </div>


        <div class="textosInicioBrindis">

            <div class="parrafo">
                <h2>LOS MEJORES MOMENTOS DE LA VIDA SE CELEBRAN JUNTOS</h2>
                <p>Comienza tu celebración con nosotros. Un brindis es mucho más que un simple gesto, es la manera
                    perfecta de compartir risas, recuerdos y momentos especiales. Porque cada instante vivido merece ser
                    celebrado, y juntos, hacemos que cada ocasión sea única e inolvidable</p>
            </div>
            <img class="imagenInicio" src="{{asset('images/brindis.jpg')}}">
        </div>
        <div class="textosInicio">
            <h2>HAZ QUE CADA CUMPLEAÑOS SEA ÚNICO Y ESPECIAL</h2>
            <img class="imagenInicio" src="{{asset('images/soplando velas.jpg')}}">
        </div>

    </main>
@endsection
