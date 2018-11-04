@extends('layouts.plantilla')

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
                <p><b>Postulaciones Creadas (Pendientes por Aprobación):</b></p>
                    @if(count(\App\Postulacion::all())>0)
                        @foreach(\App\Postulacion::all() as $post)
                            @if(($post->id_invest == Auth::user()->id) && ($post->estado=="pendiente"))
                                <div class="postulacion">
                                    <h3><a href="{{route('modulopostulacion.show',['id'=> $post->id])}}">{{$post->actividad}}</a></h3>
                                    <a href="{{route('verSolPostulaciones',['id'=> $post->id])}}" class="btn btn-secondary">Revisar Postulación</a></h3>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay Postulacion creadas Pendientes por aprobar</b></p>
                    @endif
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <p><b>Postulaciones Aceptadas - Activas:</b></p>
                    @if(count(\App\Postulacion::all())>0)
                        @foreach(\App\Postulacion::all() as $post)
                            @if(($post->id_invest == Auth::user()->id) && ($post->estado=="aceptada"))
                                <div class="postulacion">
                                    <h3><a href="{{route('modulopostulacion.show',['id'=> $post->id])}}">{{$post->actividad}}</a></h3>
                                    <a href="{{route('verSolPostulaciones',['id'=> $post->id])}}" class="btn btn-secondary">Revisar Postulación</a></h3>
                                    
                                    <a href="{{route('modpost',['id'=> $post->id_post])}}" class="btn btn-primary">Ver Investigación</a></h3>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay postulaciones activas</b></p>
                    @endif
            </div>
        </div>
    </div>
    <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b>Postulaciones Rechazadas:</b></p>
                        @if(count(\App\Postulacion::all())>0)
                            @foreach(\App\Postulacion::all() as $post)
                                @if(($post->id_invest == Auth::user()->id) && ($post->estado=="rechazada"))
                                    <div class="postulacion">
                                        <h3><a href="{{route('modulopostulacion.show',['id'=> $post->id])}}">{{$post->actividad}}</a></h3>
                                        <a href="{{route('modulopost.destroy', $post->id)}}" class="btn btn-danger" > <i class="fa fa-times"></i> Eliminar</a>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p><b>No hay postulaciones Rechazadas</b></p>
                        @endif
                </div>
            </div>
        </div>
</div>
@endsection