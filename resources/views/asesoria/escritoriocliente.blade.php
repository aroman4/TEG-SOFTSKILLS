@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <a href="{{route('solicasesoria')}}" class="btn btn-primary">Crear Solicitud</a>
    <p>Solicitudes creadas (pendientes por aprobación):</p>

    @if(count(\App\Solicitud::all())>0)
        @foreach(\App\Solicitud::all() as $sol)
            @if(($sol->user_id == Auth::user()->id) && ($sol->estado=="pendiente"))
                <div class="solicitud">
                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay solicitudes pendientes</p>
    @endif
    <br>
    <p>Asesorías Activas:</p>
    
    @if(count(\App\Asesoria::all())>0)
        @foreach(\App\Asesoria::all() as $ase)
            @if(($ase->id_cliente == Auth::user()->id) && ($ase->estado == "activa"))
                <div class="asesoria">
                    <h3><a href="{{route('moduloasesoria.show',['id'=> $ase->id])}}">{{$ase->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay asesorías activas</p>
    @endif
@endsection