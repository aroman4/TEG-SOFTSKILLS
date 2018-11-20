@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
                <h1 style="float:left">Publicaciones</h1>
                <a href="{{route('nombreinvpostulacion')}}" class="btn btn-secondary boton">Postulados</a></h3>
            </div>
    </div>
         
    <br>

            

    <div class="row separador">
            <div class="col-md-4 solicitudInv">
                <div class="card solii">
                    <div class="card-body">
                        <p class="text-center"><b>Creadas (Pendientes por Aprobación):</b></p>
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

       <div class="col-md-4 solicitudInv">
            <div class="card solii">
                <div class="card-body">
                    <p class="text-center"><b>Aceptadas - Activas:</b></p>
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
        <div class="col-md-4 solicitudInv">
            <div class="card solii">
                    <div class="card-body">
                        <p class="text-center"><b>Rechazadas:</b></p>
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
</div>
@endsection