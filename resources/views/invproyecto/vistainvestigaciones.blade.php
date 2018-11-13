@extends('layouts.menuinv')
@section('content')

<div class="col-md-9">
    <div class="row">
        <div class="col-md-6">
                <div class="text-center">
                        <br>  
                        <h2 style='margin-right:20px'>Investigaciones con sus investigadores</h2>
                        <br>
                        <b>Investigadores:</b>
                        <hr>
                        @forelse(\App\Investigacion::all() as $inv)
                            @if($inv->user_id == Auth::user()->id)
                                <strong> <a href="{{route('detallesinv',$inv->id)}}">{{$inv->titulo}}</a></strong>
                                 
                             @endif
                        @endforeach
        </div>
        </div>
        <div class="col-md-6">
            <div class="text-center">
                <br>
                <h2 style='margin-right:20px; color:blue;'>Investigaciones con sus investigadores</h2>
                <br>
                 <hr>
                    @forelse(\App\Postulacion::all() as $postulacion)
                    
                        @if($postulacion->id_invest == auth()->user()->id && $postulacion->estado_inv == "inicio")
                                
                                    <p><b>Titulo de la Investigación</b></p>
                                    <p>{{\App\Investigacion::find($postulacion->id_post)->titulo}}</p>
                                
                               
                                    <p><b>Correo</b></p>
                                    <span>{{\App\User::find($postulacion->id_invest)->email}}</span>
                               
                                    <p><b>Actividad</b></p>
                                    <p>{{$postulacion->actividad}}</p>
                                
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
                                        <a title="realizar encuesta inicial" href="./encuestaunopreg/{{$postulacion->id}}" class="btn btn-primary"><i class="#" style="color:#FFFFFF; width:6; height:6"></i>Encuesta Inicial</a>
                                        <p>{{$postulacion->estado_inv}}</p>
                                    @else
                                        <a title="realizar encuesta final" href="./encuestados/{{$postulacion->id}}" class="btn btn-primary"><i class="#" style="color:#FFFFFF; width:6; height:6"></i>Encuesta Final</a>
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