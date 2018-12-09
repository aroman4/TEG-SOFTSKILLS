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
                <p><b>Que Otros Proyectos has Pertenedico: </b>{{$postulacion->otros_proyectos}}</p>
                <p><b>Aporte a la Investigación: </b>{{$postulacion->aporte}}</p>
                <p><b>Actividad en la que se quiere Postular: </b>{{$postulacion->actividad}}</p>
                <p>Creada el {{$postulacion->created_at}}</p>

                <br><br>
    </div>
@endsection