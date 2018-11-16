@extends('layouts.menuinv')
@section('content')

<div class="col-md-9">
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
                                <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-primary">Ver Más</a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('encuestauno',$postulacion->id_invest)}}" class="btn btn-danger">Evaluación Inicial</a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-success">Evaluación Final</a>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach 
             @endif
</div>
@endsection