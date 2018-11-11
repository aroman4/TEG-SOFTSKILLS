@extends('layouts.plantilla')

@section('content')
<div class="text-center">
    <h1>{{$solicitud->titulo}}</h1>
    <p>{{$solicitud->caracteristica}}</p>
    <p>{{$solicitud->actividades}}</p>
    <small>Creada el {{$solicitud->created_at}}</small>
    <br><br>
    @if(Auth::user()->tipo_inv == "normal")
        <a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
        <a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-danger">Eliminar Solicitud</a>
        <a href="{{route('editarinves', $solicitud->id)}}" class="btn btn-success">Editar Solicitud</a>
        <a href="{{route('postulaciones', $solicitud->id)}}" class="btn btn-primary">Revisar Postulaciones</a>
        @elseif(Auth::user()->tipo_inv == "comite")
        <a href="{{route('escritoriocomite')}}" class="btn btn-secondary">Regresar</a>
    @endif
    @if(Auth::user()->tipo_inv == "comite")
        <a href="{{action('InvestigacionController@AceptarInvestigacion',['id'=> $solicitud->id])}}" class="btn btn-success">Aceptar Solicitud</a>
        <!--Cuando se acepte la solicitud se deberia dejar de mostrar la solicitud, cambiar el estado?-->
        
    @endif
</div>

@endsection