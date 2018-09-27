@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->tipo_usu == "asesor")
        <a href="{{route('escritorioasesor')}}" class="btn btn-secondary">Regresar</a>
        <a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-secondary">Eliminar Solicitud</a>
        <a href="{{route('editarasesor', $solicitud->id)}}" class="btn btn-secondary">Editar Solicitud</a>

    @elseif(Auth::user()->tipo_usu == "cliente")
        <a href="{{route('escritoriocliente')}}" class="btn btn-secondary">Regresar</a>
        <a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-secondary">Eliminar Solicitud</a>
        <a href="{{route('editarclit', $solicitud->id)}}" class="btn btn-secondary">Editar Solicitud</a>

    @endif
    <h1>{{$solicitud->titulo}}</h1>
    <p>{{$solicitud->mensaje}}</p>
    <small>Creada el {{$solicitud->created_at}}</small>
@endsection