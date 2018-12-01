@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Ver Actividad Asignada </h1>
            @elseif(Auth::user()->tipo_inv == "comite")
                <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item ">
            <p><b>Fecha de Entrega:  </b>{{$actividad->fecha_entrega}}</p>
            <p><b>Título:  </b>{{$actividad->titulo}}</p>
            <p><b>Detalle:  </b>{{$actividad->observacion}}</p>
            <p>Asignada el {{$actividad->created_at}}</p>
            <a title="Descargar archivo" href="proyecto/{{$actividad->archivo_actividad}}" class="btn btn-success boton1" download="{{$actividad->archivo_actividad}}"><i class="fa fa-download" style="color:#FFFFFF; width:6; height:6"></i> Descargar Documento</a>                           
            <br><br>
        </div>
    </div>
</div>

@endsection