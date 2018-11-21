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
                        <strong> <a href="{{route('detallesinv',$inv->id)}}">{{$inv->titulo}}</a></strong>
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
                    <li class="list-group-item listaAsesSolic">
                            
                    @forelse(\App\Postulacion::all() as $postulacion)
                        @if($postulacion->id_invest == auth()->user()->id && $postulacion->estado_inv == "inicio" && $postulacion->estado == 'aceptada')
                            <div class="row">
                                <div class="col-md-4">
                                    <p><b>Titulo de la Investigación</b></p>
                                    <p>{{\App\Investigacion::find($postulacion->id_post)->titulo}}</p>        
                                </div>
                                <div class="col-md-5">
                                    <p><b>Archivo</b></p>
                                    <a title="Ver postulación" href="{{route('proyectoverpost.showproyectoverpost',['id'=> $postulacion->id])}}" class="btn btn-primary"><i class="fa fa-eye" style="color:#000; width:6; height:6"></i></a>
                                    <a title="Subir Archivo" href="./proyectovista/{{$postulacion->id}}" class="btn btn-success"><i class="fa fa-upload" style="color:#000; width:6; height:6"></i></a>
                                    <a title="Descargar archivo" href="proyecto/{{$postulacion->archivo_inv}}" download="{{$postulacion->archivo_inv}}">
                                    <button type="button" class="btn btn-warning">
                                        <i class="fa fa-download" style="color:#000; width:6; height:6"></i>
                                    </button></a>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Etapa</b></p>
                                    @if($postulacion->estado_inv == 'inicio')                                
                                        <p>{{$postulacion->estado_inv}}</p>
                                    @else
                                        <p>{{$postulacion->estado_inv}}</p>
                                    @endif
                                </div>
                            </div>    
                        @endif
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
@endsection