@extends('layouts.plantilla')

@section('content')
<div class="container">
    <div class="text-center">
        <br><br>  
        <h2 style='margin-right:20px'>Investigaciones con sus investigadores</h2>
        <br>
        <b>Investigadores:</b>
        <hr>
        @forelse(\App\Investigacion::all() as $inv)
            @if($inv->user_id == Auth::user()->id)
                <strong> <span>{{$inv->titulo}}</span></strong>
                <hr>
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
                    <div class="col-md-2">
                        <b>Evaluación Inicial</b>
                    </div>
                    <div class="col-md-2">
                        <b>Evaluación Final</b>
                    </div>
                </div>
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
                                <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-primary">Ver Más</a></h3>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('encuestauno',['id'=> $postulacion->id_inv])}}" class="btn btn-danger">Evaluación Inicial</a></h3>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-success">Evaluación Final</a></h3>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach 
             @endif
        @endforeach
        <br><br><br>
        <div class="text-center">
            <a href="{{route('vistainvestigaciones')}}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</div>
@endsection