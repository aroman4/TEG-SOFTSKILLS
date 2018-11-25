@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
                <h1 style="float:left">Postulaciones</h1>
                <a href="{{route('nombreinvpostulacion')}}" class="btn btn-primary boton">Postulados</a></h3>
            </div>
    </div>
         
    <br>

            

    <div class="row separador">
            <div class="col-md-4 solicitudInv">
                <div class="card solii">
                    <div class="card-body">
                        <p class="text-center"><b>Creadas (Pendientes por Aprobación):</b></p><hr>
                            @if(count(\App\Postulacion::all())>0)
                                @foreach(\App\Postulacion::all() as $post)
                                    @if(($post->id_invest == Auth::user()->id) && ($post->estado=="pendiente"))
                                        <div class="postulacion">
                                            <h3><a href="{{route('modulopostulacion.show',['id'=> $post->id])}}">{{$post->tituloinv}}</a></h3>
                                           <div style="margin:10px;">
                                            <a href="{{route('verSolPostulaciones',['id'=> $post->id])}}" class="btn btn-secondary boton1">Revisar</a></h3>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <p>No hay Postulaciones creadas ni pendientes por aprobar</p>
                            @endif
                    </div>
                </div>
            </div>

       <div class="col-md-4 solicitudInv">
            <div class="card solii">
                <div class="card-body">
                    <p class="text-center"><b>Aceptadas - Activas:</b></p><hr>
                        @if(count(\App\Postulacion::all())>0)
                            @foreach(\App\Postulacion::all() as $post)
                                @if(($post->id_invest == Auth::user()->id) && ($post->estado=="aceptada"))
                                    <div class="postulacion">
                                        <h3><a href="{{route('modulopostulacion.show',['id'=> $post->id])}}">{{$post->tituloinv}}</a></h3>
                                        <a href="{{route('verSolPostulaciones',['id'=> $post->id])}}" class="btn btn-secondary boton1">Revisar </a></h3>
                                        
                                        <a href="{{route('modpost',['id'=> $post->id_post])}}" class="btn btn-primary boton1">Ver Postulación</a></h3>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p>No hay postulaciones activas ni aceptadas</p>
                        @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 solicitudInv">
            <div class="card solii">
                    <div class="card-body">
                        <p class="text-center"><b>Rechazadas:</b></p><hr>
                            @if(count(\App\Postulacion::all())>0)
                                @foreach(\App\Postulacion::all() as $post)
                                    @if(($post->id_invest == Auth::user()->id) && ($post->estado=="rechazada"))
                                        <div class="postulacion">
                                            <h3><a href="{{route('modulopostulacion.show',['id'=> $post->id])}}">{{$post->tituloinv}}</a></h3>
                                            <a href="{{route('modulopost.destroy', $post->id)}}" class="btn btn-danger boton1" > <i class="fa fa-times"></i> Eliminar</a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <p>No hay postulaciones Rechazadas</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection