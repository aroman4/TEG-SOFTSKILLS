@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <p>Solicitudes creadas (pendientes por aprobación):</p>
    @if(count(\App\Solicitud::all())>0)
        @foreach(\App\Solicitud::all() as $sol)
            @if(\App\User::find($sol->user_id)->tipo_usu == "cliente"  && ($sol->estado=="pendiente"))
                <div>
                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay solicitudes pendientes</p>
    @endif
    <p>Asesorías Activas:</p>
    
    @if(count(\App\Asesoria::all())>0)
        @foreach(\App\Asesoria::all() as $ase)
            @if(($ase->user_id == Auth::user()->id) && ($ase->estado == "activa"))
                <div class="asesoria">
                    <h3><a href="{{route('moduloasesoria.show',['id'=> $ase->id])}}">{{$ase->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay asesorías activas</p>
    @endif

        <a href="{{route('cuestionario.home')}}" class="btn btn-info">Instrumento cuestionario</a>
@endsection