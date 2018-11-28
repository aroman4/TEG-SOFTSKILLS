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
                        {{--Postulados a mi investigaciones--}}
                      @if($inv->user_id == Auth::user()->id && $postulacion->id_post == $inv->id && $postulacion->estado == 'aceptada' && $postulacion->estado_inv == "inicio")
                        <li class="list-group-item listaAsesSolic">
                            <div class="row">
                                <p><b>Nombre del Investigador:  </b>{{\App\User::find($postulacion->id_invest)->nombre ." ". \App\User::find($postulacion->id_invest)->apellido}}</p>
                            </div>
                            <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Título de la Investigación</b></p>
                                        <p>{{\App\Investigacion::find($postulacion->id_post)->titulo}}</p>        
                                    </div>
                                    <div class="col-md-5">
                                        <a title="Ver postulación" href="{{route('proyectoverpost.showproyectoverpost',['id'=> $postulacion->id])}}" class="btn btn-primary boton1"><i class="fa fa-eye" style="color:#FFFFFF; width:6; height:6"></i></a>
                                        @if(Auth::user()->id == $postulacion->id_invest)
                                            <a title="Subir Archivo" href="./proyectovista/{{$postulacion->id}}" class="btn btn-success boton1"><i class="fa fa-upload" style="color:#FFFFFF; width:6; height:6"></i></a>
                                        @endif
                                        @if($inv->archivofinal != null)                                         
                                            <a title="Descargar archivo" href="proyecto/{{$postulacion->archivo_inv}}" class="btn btn-warning boton1" download="{{$postulacion->archivo_inv}}"><i class="fa fa-download" style="color:#FFFFFF; width:6; height:6"></i></a>
                                        @endif
                                        <br>
                                    </div>
                                    <div class="col-md-2">
                                        <p><b>Etapa</b></p>
                                        @if($postulacion->estado_inv == 'inicio')                                
                                            <p style="color:green;"><b>{{$postulacion->estado_inv}}</b></p>
                                        @else
                                            <p style="color:green;"><b>{{$postulacion->estado_inv}}</b></p>
                                        @endif
                                    </div>
                                    
                                </div>   
                        </li> 
                        @endif
                    @endforeach
                @endforeach

                        {{--Mis Postulaciones--}}
                    @forelse(\App\Postulacion::all() as $postulacion) 
                        @if($postulacion->id_invest == Auth::user()->id && $postulacion->estado == 'aceptada' && $postulacion->estado_inv == "inicio")
                        <li class="list-group-item listaAsesSolic">
                                <div class="row">
                                    <p><b>Nombre del Investigador:  </b>{{\App\User::find($postulacion->id_invest)->nombre ." ". \App\User::find($postulacion->id_invest)->apellido}}</p>
                                </div>
                            <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Titulo de la Investigación</b></p>
                                        <p>{{\App\Investigacion::find($postulacion->id_post)->titulo}}</p>        
                                    </div>
                                    <div class="col-md-5">
                                        <a title="Ver postulación" href="{{route('proyectoverpost.showproyectoverpost',['id'=> $postulacion->id])}}" class="btn btn-primary boton1"><i class="fa fa-eye" style="color:#FFFFFF; width:6; height:6"></i></a>
                                        @if(Auth::user()->id == $postulacion->id_invest)
                                            <a title="Subir Archivo" href="./proyectovista/{{$postulacion->id}}" class="btn btn-success boton1"><i class="fa fa-upload" style="color:#FFFFFF; width:6; height:6"></i></a>
                                        @endif
                                        @if($inv->archivofinal != null)                                         
                                            <a title="Descargar archivo" href="proyecto/{{$postulacion->archivo_inv}}" class="btn btn-warning boton1" download="{{$postulacion->archivo_inv}}"><i class="fa fa-download" style="color:#FFFFFF; width:6; height:6"></i></a>
                                        @endif       
                                    </div>
                                    <div class="col-md-2">
                                        <p><b>Etapa</b></p>
                                        @if($postulacion->estado_inv == 'inicio')                                
                                            <p style="color:green;"><b>{{$postulacion->estado_inv}}</b></p>
                                        @else
                                            <p style="color:green;"><b>{{$postulacion->estado_inv}}</b></p>
                                        @endif
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