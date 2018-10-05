@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <a href="{{route('solicinvestigacion')}}" class="btn btn-primary">Crear Solicitud</a>
    <p>Solicitudes creadas:</p>
    @if(count(\App\Solicitud::all())>0)
        @foreach(\App\Solicitud::all() as $sol)
            @if($sol->user_id == Auth::user()->id)
                <div class="solicitud">
                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay Solicitudes Creadas</p>
    @endif
    <p>Solicitudes Creadas (Pendientes por Aprobación):</p>
    @if(count(\App\Solicitud::all())>0)
        @foreach(\App\Solicitud::all() as $sol)
            @if(($sol->user_id == Auth::user()->id) && ($sol->estado=="pendiente"))
                <div class="solicitud">
                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay Solicitudes Pendientes</p>
    @endif
    <br>

    <p>Investigaciones Activas:</p>
    @if(count(\App\Investigacion::all())>0)
        @foreach(\App\Investigacion::all() as $inv)
            @if(($inv->user_id == Auth::user()->id) && ($inv->estado == "activa"))
                <div class="investigaciones">
                    <h3><a href="{{route('moduloinvestigacion.show',['id'=> $inv->id])}}">{{$inv->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay asesorías activas</p>
    @endif
@endsection