@extends('layouts.menuinv')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                @if(Auth::user()->sexo == "Femenino")
                    <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                @else
                    <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <p><b>Solicitudes (pendientes por aprobación):</b></p>
                    @if(count(\App\Solicitud::all())>0)
                        @foreach(\App\Solicitud::all() as $sol)
                            @if(\App\User::find($sol->user_id)->tipo_usu == "investigador"  && ($sol->estado=="pendiente"))
                                <div>
                                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay solicitudes pendientes</b></p>
                    @endif       
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <p><b>Investigaciones Activas:</b></p>
                    @if(count(\App\Investigacion::all())>0)
                        @foreach(\App\Investigacion::all() as $inv)
                                <div class="investigaciones">
                                    <h3><a href="{{route('moduloinvestigacion.show',['id'=> $inv->id])}}">{{$inv->titulo}}</a></h3>
                                </div>
                        @endforeach
                    @else
                        <p><b>No hay asesorías activas</b></p>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection