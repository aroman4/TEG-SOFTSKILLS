@extends('layouts.menuinv')
@section('content')

<div class="col-md-9 solicitudInv">
    <div class="row separador">
        <div class="col-md-12 list-group-item text-right top-bar" style="color:white;">
            <h1>Seguimiento de Investigaciones: Inv. {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
        </div>
    </div>
    <div class="row" style="height:70vh">
        <div class="col-md-6 list-group-item" style="overflow:auto">
            <div class="text-center">
                <br>  
                <h2 style='margin-right:20px'>Mis Investigaciones</h2>
                <br>
                <b>Investigadores:</b>
                <hr>
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
                <h2 style='margin-right:20px; color:blue;'>Mis Postulaciones</h2>
                <br>
                <hr>
                @forelse(\App\Postulacion::all() as $postulacion)
                    @if($postulacion->id_invest == auth()->user()->id && $postulacion->estado_inv == "inicio" && $postulacion->estado == 'aceptada')
                        <p><b>Titulo de la Investigación</b></p>
                        <p>{{\App\Investigacion::find($postulacion->id_post)->titulo}}</p>
                        <p><b>Archivo</b></p>
                        <a title="Ver postulación" href="{{route('proyectoverpost.showproyectoverpost',['id'=> $postulacion->id])}}" class="btn btn-primary"><i class="fa fa-eye" style="color:#FFFFFF; width:6; height:6"></i></a>
                        <a title="Subir Archivo" href="./proyectovista/{{$postulacion->id}}" class="btn btn-primary"><i class="fa fa-upload" style="color:#FFFFFF; width:6; height:6"></i></a>
                        <a title="Descargar archivo" href="proyecto/{{$postulacion->archivo_inv}}" download="{{$postulacion->archivo_inv}}">
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-download"></i>
                        </button>
                        </a>
                        <br>
                        <p><b>Etapa</b></p>
                            @if($postulacion->estado_inv == 'inicio')                                
                                <p>{{$postulacion->estado_inv}}</p>
                            @else
                                <p>{{$postulacion->estado_inv}}</p>
                            @endif
                        <hr>
                    @endif
                @endforeach
                  
            </div>
        </div>
    </div>
</div>
@endsection