@extends('layouts.plantilla')

@section('content')
<a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
<a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-secondary">Eliminar Solicitud</a>
<a href="{{route('editarinves', $solicitud->id)}}" class="btn btn-secondary">Editar Solicitud</a>

    <h1>{{$solicitud->titulo}}</h1>
    <p>{{$solicitud->caracteristica}}</p>
    <p>{{$solicitud->descripcion}}</p>
    <small>Creada el {{$solicitud->created_at}}</small>
@endsection