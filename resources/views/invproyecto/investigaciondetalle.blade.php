@extends('layouts.menuinv')
@section('content')

<div class="col-md-9" style="margin: 0px auto;">
    @if($inv->user_id == Auth::user()->id)
        <div class="row text-center separador">
                <div class="col-md-12 list-group-item text-center top-bar">
                    <h1><strong style="float:left"><span>{{$inv->titulo}}</span></strong></h1>
                    <a href="{{route('vistainvestigaciones')}}" class="btn btn-primary boton">Regresar</a>
                </div>
            </div>
            
            <div class="row text-center">
                <div class="col-md-12 list-group-item ">
                    <div class="row">
                        <div class="col-md-2">
                            <b>Nombre</b>
                        </div>
                        <div class="col-md-2">
                            <b>Apellido</b>
                        </div>
                        <div class="col-md-2">
                            <b>Ver Contenido</b>
                        </div>
                        <div class="col-md-3">
                            <b>Evaluación Inicial</b>
                        </div>
                        <div class="col-md-3">
                            <b>Evaluación Final</b>
                        </div>
                    </div>
                    <hr>
                @forelse(\App\Postulacion::all() as $postulacion)
                    @if($postulacion->id_post == $inv->id)
                        <div class="row">
                            <div class="col-md-2">
                                <span>{{\App\User::find($postulacion->id_invest)->nombre}}</span>
                            </div>
                            <div class="col-md-2">
                                <span>{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-primary boton1">Ver Más</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('encuestauno',$postulacion->id_invest)}}" class="btn btn-danger boton1">Realizar Evaluación</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('vistaencuesta', $postulacion->id_post)}}" class="btn btn-success boton1">Ver Resultados</a>
                            </div>
                        </div>
                        <br>
                    @endif
                @endforeach
            </div>
        </div>
      @endif
</div>
@endsection