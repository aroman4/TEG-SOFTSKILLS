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
            @if(\App\User::find($sol->user_id)->tipo_usu == "Investigador"  && ($sol->estado=="pendiente"))
                <div>
                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay solicitudes pendientes</p>
    @endif
    <p>Investigaciones Activas:</p>
    
    @if(count(\App\Investigaciones::all())>0)
        @foreach(\App\Investigaciones::all() as $inv)
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