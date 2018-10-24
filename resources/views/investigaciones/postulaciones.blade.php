@extends('layouts.plantilla')

@section('content')
<div class="container">
     @if(Auth::user()->sexo == "Femenino")
        <br>
        <p>Lider {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <h1 class="text-center">Lista de Postulado </h1>
    <hr>
    <br><br>
            <div class="row">   
                <div class="col-md-3">
                    <h3>Nombre del Investigador</h3>
                </div>
                <div class="col-md-3">
                    <h3>Curriculum</h3>
                </div>
                <div class="col-md-3">
                    <h3>Ver Postulación</h3>
                </div>
                <div class="col-md-3">
                    <h3></h3>
                </div>
            </div>
            <hr>
    @forelse(\App\Postulacion::all() as $postulacion)
       @if(Auth::user()->id != $postulacion->id_invest)
            <div class="row">            
                <div class="col-md-3">
                    <span>{{\App\User::find($postulacion->id_invest)->nombre}}</span>
                    <span>{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                    <br>
                    <span>{{\App\User::find($postulacion->id_invest)->email}}</span>
                </div>
                <div class="col-md-3">                
                    <a href="archivoproyecto/{{$postulacion->archivo}}" download="{{$postulacion->archivo}}">
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-upload">  Download </i>
                        </button>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-secondary">Revisar Postulación</a></h3>
                </div>
                <div class="col-md-3">
                    <a href="" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</a>
                    <a href="" class="btn btn-danger" ><i class="fa fa-times"></i> Rechazar</a>
                </div>
            </div>
            <hr>
        @endif
    @endforeach 
</div>
@endsection