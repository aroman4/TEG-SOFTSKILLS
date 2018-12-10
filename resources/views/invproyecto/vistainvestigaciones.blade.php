@extends('layouts.menuinv')
@section('content')

<div class="col-md-9 solicitudInv">
    <div class="row separador">
        <div class="col-md-12 list-group-item text-right top-bar" style="color:white;">
            @if(Auth::user()->sexo == "Femenino")
                <h1>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @else
                <h1>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @endif
        </div>
    </div>
    <div class="row" style="height:70vh">
        <div class="col-md-6 list-group-item" style="overflow:auto">
            <div class="text-center">
                <br> 
                <ul class="list-group"> 
                    <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                        <h2 style='margin-right:20px'>Mis Investigaciones</h2>
                    </li>
                </ul>
                <ul class="list-group">
                @forelse(\App\Investigacion::all() as $inv)
                    @if($inv->user_id == Auth::user()->id)
                    <li class="list-group-item listaAsesSolic">
                        <p style="float:left;"><b>{{$inv->estado}}</b></p>
                        <strong> <a title="Seguimiento de mi Investigación" href="{{route('detallesinv',$inv->id)}}">{{$inv->titulo}}</a></strong>
                    </li>
                    @endif
                @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-6 list-group-item" style="overflow:auto">
            <div class="text-center">
                <br>
                <ul class="list-group"> 
                    <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                        <h2 style='margin-right:20px'>Mis Postulaciones</h2>
                    </li>
                </ul>

                <ul class="list-group">                
                @forelse(\App\Investigacion::all() as $inv)
                    @forelse(\App\Postulacion::all() as $postulacion) 
                        {{--Postulados a mi investigaciones pendientes--}}
                      @if($inv->user_id == Auth::user()->id && $postulacion->id_post == $inv->id && $postulacion->estado == 'aceptada'&& $postulacion->estado_inv == 'inicio')
                        <li class="list-group-item listaAsesSolic">
                            <div class="row">                                
                                <p><b>Título: </b>{{\App\Investigacion::find($postulacion->id_post)->titulo}}<br>
                                <b>Investigador postulado a mi Investigación:  </b>{{\App\User::find($postulacion->id_invest)->nombre ." ". \App\User::find($postulacion->id_invest)->apellido}}<br>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <a title="Ver postulación" href="{{route('proyectoverpost.showproyectoverpost',['id'=> $postulacion->id])}}" class="btn btn-primary boton1"><i class="fa fa-eye" style="color:#FFFFFF; width:6; height:6"></i></a>
                                            @if(Auth::user()->id == $postulacion->id_invest)
                                                <a title="Subir Archivo" href="./proyectovista/{{$postulacion->id}}" class="btn btn-success boton1"><i class="fa fa-upload" style="color:#FFFFFF; width:6; height:6"></i></a>
                                            @endif
                                                <a title="Descargar archivo" href="proyecto/{{$postulacion->archivo_inv}}" class="btn btn-warning boton1" download="{{$postulacion->archivo_inv}}"><i class="fa fa-download" style="color:#FFFFFF; width:6; height:6"></i></a>
                                                
                                            <br>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            @if($postulacion->estado_inv == 'inicio')                                
                                                <p><b> Etapa:</b> {{$postulacion->estado_inv}} de la Investigación</p>
                                            @else
                                                <p><b> Etapa:</b> {{$postulacion->estado_inv}} de la Investigación</p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>   
                        </li> 
                        @endif
                    @endforeach
                @endforeach

                    {{--Mis Postulaciones--}}
                    @forelse(\App\Postulacion::all() as $postulacion) 
                        @if($postulacion->id_invest == Auth::user()->id && $postulacion->estado == 'aceptada'&& $postulacion->estado_inv == 'inicio')
                        <li class="list-group-item listaAsesSolic">
                                <p><b>Mis Postulación:</b></p>
                                <div class="row">
                                    <br><b>Título:</b> {{\App\Investigacion::find($postulacion->id_post)->titulo}}</p>
                                    <br>   <br>    
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <a title="Ver postulación" href="{{route('proyectoverpost.showproyectoverpost',['id'=> $postulacion->id])}}" class="btn btn-primary boton1"><i class="fa fa-eye" style="color:#FFFFFF; width:6; height:6"></i></a>
                                        <a title="Subir Archivo" href="./proyectovista/{{$postulacion->id}}" class="btn btn-success boton1"><i class="fa fa-upload" style="color:#FFFFFF; width:6; height:6"></i></a>
                                        <a title="Descargar archivo" href="proyecto/{{$postulacion->archivo_inv}}" class="btn btn-warning boton1" download="{{$postulacion->archivo_inv}}"><i class="fa fa-download" style="color:#FFFFFF; width:6; height:6"></i></a>
                                    </div>     
                                </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            @if($postulacion->estado_inv == 'inicio')                                
                                                <p><b style="color:green;"> Etapa:</b> {{$postulacion->estado_inv}} de la Investigación</p>
                                            @else
                                                <p><b style="color:green;"> Etapa:</b> {{$postulacion->estado_inv}} de la Investigación</p>
                                            @endif
                                        </div> 
                                    </div> 
                                </div>  
                            </li> 
                        @endif
                    @endforeach
            </ul>
        </div>
    </div>
</div>
</div>
@endsection