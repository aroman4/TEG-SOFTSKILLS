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
                            <ul class="list-group text-center"> 
                                    <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                                        <p style='margin-right:20px'><b>Creadas (Pendientes por Aprobación): </b></p>
                                    </li>
                                </ul>
                            @if(count(\App\Postulacion::all())>0)
                                @foreach(\App\Postulacion::all() as $post)
                                    @if(($post->id_invest == Auth::user()->id) && ($post->estado=="pendiente") && (\App\Investigacion::find($post->id_post)->estado == "activa"))
                                    <li class="list-group-item ">
                                        <div class="postulacion">
                                            <p><b>{{$post->tituloinv}}</b></p>
                                           <div style="margin:10px;">
                                                <a href="{{route('verSolPostulaciones',['id'=> $post->id])}}" title="Revisar Postulación" class="btn btn-secondary boton1">Revisar </a></h3>
                                            </div>
                                        </div>
                                    </li>
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
                        <ul class="list-group text-center"> 
                                <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                                    <p style='margin-right:20px'><b>Aceptadas - Activas:</b></p>
                                </li>
                            </ul>
                        @if(count(\App\Postulacion::all())>0)
                            @foreach(\App\Postulacion::all() as $post)
                                @if(($post->id_invest == Auth::user()->id) && ($post->estado=="aceptada") && (\App\Investigacion::find($post->id_post)->estado == "activa"))
                                <li class="list-group-item ">
                                    <div class="postulacion">
                                        <p><b>{{$post->tituloinv}}</b></p>
                                        <a href="{{route('verSolPostulaciones',['id'=> $post->id])}}" title="Revisar Postulación" class="btn btn-secondary boton1">Revisar </a></h3>
                                        
{{--                                         <a href="{{route('modpost',['id'=> $post->id_post])}}" title="Ver Investigación" class="btn btn-primary boton1">Ver</a></h3>
 --}}                                   <a href="{{route('solicitud.show',['id'=> $post->id_post])}}" title="Ver Investigación" class="btn btn-primary boton1" style="border-radius: 5px;">Ver</a></td>

                                        <a href="{{route('veractividadasignada',['id'=> $post->id])}}" title="Revisar Actividad Asignada" class="btn btn-success boton1">Actividad</a></h3>

                                    </div>
                                </li>
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
                            <ul class="list-group text-center"> 
                                    <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                                        <p style='margin-right:20px'><b>Rechazadas:</b></p>
                                    </li>
                                </ul>
                            @if(count(\App\Postulacion::all())>0)
                                @foreach(\App\Postulacion::all() as $post)
                                    @if(($post->id_invest == Auth::user()->id) &&  (\App\Investigacion::find($post->id_post)->estado == "activa") && ($post->estado=="rechazada"))
                                    <li class="list-group-item ">
                                         <div class="postulacion">
                                            <p><b>{{$post->tituloinv}}</b></p>
                                            <a href="{{route('modulopost.destroy', $post->id)}}" titles="Eliminar postulación" class="btn btn-danger boton1" > <i class="fa fa-times"></i> Eliminar</a>
                                        </div>
                                    </li>
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