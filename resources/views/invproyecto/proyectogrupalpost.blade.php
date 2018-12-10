@extends('layouts.plantilla')

@section('content')
<div class="container">
    <br>
    <div class="text-center">
        <h2 style='margin-right:20px; color:blue;'>Investigaciones con sus investigadores</h2>
        <br><br><br>
        <div class="row">   
            <div class="col-md-2">
                <p><b>Titulo de la Investigación</b></p>
            </div>
            <div class="col-md-2">
                <p><b>Nombre y Apellido</b></p>
            </div>
            <div class="col-md-2">
                <p><b>Correo</b></p>
            </div>
            <div class="col-md-2">
                <p><b>Actividad</b></p>
            </div>
            <div class="col-md-2">
                <p><b>Archivo</b></p>
            </div>
            <div class="col-md-2">
                <p><b>Etapa</b></p>
            </div>
        </div>
        <hr>
        @forelse(\App\Investigacion::all() as $inv)
            @forelse(\App\Postulacion::all() as $postulacion)
            
                @if($postulacion->id_post == $inv->id)
                    <div class="row">
                        <div class="col-md-2">
                            <span>{{$inv->titulo}}</span>
                        </div>
                        <div class="col-md-2">
                            <span>{{\App\User::find($postulacion->id_invest)->nombre}}</span>
                            <span>{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                        </div>
                        <div class="col-md-2">
                            <span>{{\App\User::find($postulacion->id_invest)->email}}</span>
                        </div>
                        <div class="col-md-2">
                            <p>{{$postulacion->actividad}}</p>
                        </div>
                        <div class="col-md-2">
                            <a title="Ver postulación" href="{{route('proyectoverpost.showproyectoverpost',['id'=> $postulacion->id])}}" class="btn btn-primary"><i class="fa fa-eye" style="color:#FFFFFF; width:6; height:6"></i></a>
                            <a title="Subir Archivo" href="./proyectovista/{{$postulacion->id}}" class="btn btn-primary"><i class="fa fa-upload" style="color:#FFFFFF; width:6; height:6"></i></a>
                            <a title="Descargar archivo" href="proyecto/{{$postulacion->archivo_inv}}" download="{{$postulacion->archivo_inv}}">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-download"></i>
                                </button>
                            </a>
                            <br>
                        </div>
                        <div class="col-md-2">
                            @if($postulacion->estado_inv == 'inicio')
                                <a title="realizar encuesta inicial" href="./encuestaunopreg/{{$postulacion->id}}" class="btn btn-primary"><i class="#" style="color:#FFFFFF; width:6; height:6"></i>Encuesta Inicial</a>
                                <p>{{$postulacion->estado_inv}}</p>
                            @else
                                <a title="realizar encuesta final" href="./encuestados/{{$postulacion->id}}" class="btn btn-primary"><i class="#" style="color:#FFFFFF; width:6; height:6"></i>Encuesta Final</a>
                                <p>{{$postulacion->estado_inv}}</p>
                            @endif
                        </div>
                    </div>
                <hr>
                @endif
            @endforeach 
        @endforeach 

        <br><br><br>
            <div class="text-center">
                <a href="{{route('vistainvestigaciones')}}" class="btn btn-secondary">Regresar</a>
            </div>
    </div> 
</div>
@endsection