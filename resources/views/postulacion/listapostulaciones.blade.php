@extends('layouts.menuinv')

@section('content')
<div class="col-md-10">
    <div class="row">
        <div class="col-md-8">
            <h3 class="text-center">Postulaciones</h3>
            <a href="{{route('nombreinvpostulacion')}}" class="btn btn-secondary">Postulados</a></h3>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <p><b>Postulaciones Creadas (Pendientes por Aprobación):</b></p>
                        @if(count(\App\Postulacion::all())>0)
                            @foreach(\App\Postulacion::all() as $post)
                                @if(($post->id_invest == Auth::user()->id) && ($post->estado=="pendiente"))
                                    <div class="postulacion">
                                        <h3><a href="{{route('modulopostulacion.show',['id'=> $post->id])}}">{{$post->actividad}}</a></h3>
                                        <a href="{{route('verSolPostulaciones',['id'=> $post->id])}}" class="btn btn-secondary">Revisar</a></h3>
                                
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p><b>No hay Postulacion creadas Pendientes por aprobar</b></p>
                        @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <p><b>Postulaciones Aceptadas - Activas:</b></p>
                        @if(count(\App\Postulacion::all())>0)
                            @foreach(\App\Postulacion::all() as $post)
                                @if(($post->id_invest == Auth::user()->id) && ($post->estado=="aceptada"))
                                    <div class="postulacion">
                                        <h3><a href="{{route('modulopostulacion.show',['id'=> $post->id])}}">{{$post->actividad}}</a></h3>
                                        <a href="{{route('verSolPostulaciones',['id'=> $post->id])}}" class="btn btn-secondary">Revisar </a></h3>
                                        
                                        <a href="{{route('modpost',['id'=> $post->id_post])}}" class="btn btn-primary">Ver Postulación</a></h3>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p><b>No hay postulaciones activas</b></p>
                        @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
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
    </div>
@endsection