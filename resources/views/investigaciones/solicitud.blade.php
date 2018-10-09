@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->tipo_usu == "investigador")
        <a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
        <a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-secondary">Eliminar Solicitud</a>
        <a href="{{route('editarinves', $solicitud->id)}}" class="btn btn-secondary">Editar Solicitud</a>
    @elseif(Auth::user()->tipo_usu == "comite")
        <a href="{{route('escritoriocomite')}}" class="btn btn-secondary">Regresar</a>
    @endif
    <h1>{{$solicitud->titulo}}</h1>
    <p>{{$solicitud->caracteristica}}</p>
    <p>{{$solicitud->descripcion}}</p>
    <small>Creada el {{$solicitud->created_at}}</small>
    @if(Auth::user()->tipo_inv == "comite")
        <a href="{{action('InvestigacionController@AceptarInvestigacion',['id'=> $solicitud->id])}}" class="btn btn-success">Aceptar Solicitud</a>
        <!--Cuando se acepte la solicitud se deberia dejar de mostrar la solicitud, cambiar el estado?-->
        
    @endif


@endsection