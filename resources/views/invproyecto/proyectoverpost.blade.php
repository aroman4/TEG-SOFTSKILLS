@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('vistainvestigaciones')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Subir Actividad Asignada </h1>
            @endif
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 list-group-item ">
                <p><b>Otros Proyectos: </b>{{$postulacion->otros_proyectos}}</p>
                <p><b>Aporte a la Investigación: </b>{{$postulacion->aporte}}</p>
                <p><b>Actividad en la que se quiere postular: {{$postulacion->actividad}}</p>
                <small>Creada el {{$postulacion->created_at}}</small>

                <br><br>
    </div>
@endsection