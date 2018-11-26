@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('escritorioinvestigador')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Investigación </h1>
            @elseif(Auth::user()->tipo_inv == "comite")
                <a href="{{route('escritoriocomite')}}" class="btn btn-primary boton">Regresar</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item ">
            <p><b>Título:  <u>{{$solicitud->titulo}}</u></b></p>
            <p><b>Caracteristicas:</b> {{$solicitud->caracteristica}}</p>
            <p><b>Actividades:</b> {{$solicitud->actividades}}</p>
            <small>Creada el {{$solicitud->created_at}}</small>
            <br><br>
            <div class="datos-inve">
                @if(Auth::user()->tipo_inv == "normal")
                    <a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-danger boton1">Eliminar Solicitud</a>
                    <a href="{{route('editarinves', $solicitud->id)}}" class="btn btn-success boton1">Editar Solicitud</a>
                    <a href="{{route('nombreinvpostulacion', $solicitud->id)}}" class="btn btn-secondary boton1">Revisar Postulaciones</a>
                    @elseif(Auth::user()->tipo_inv == "comite")
                    <a href="{{route('escritoriocomite')}}" class="btn btn-secondary boton1">Regresar</a>
                @endif
                @if(Auth::user()->tipo_inv == "comite")
                    <a href="{{action('InvestigacionController@AceptarInvestigacion',['id'=> $solicitud->id])}}" class="btn btn-success boton1">Aceptar Solicitud</a>
                    <!--Cuando se acepte la solicitud se deberia dejar de mostrar la solicitud, cambiar el estado?-->
                    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection