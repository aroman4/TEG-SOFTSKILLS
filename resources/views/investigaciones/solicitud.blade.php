@extends('layouts.plantilla')

@section('content')
    <a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
    <h1>{{$solicitud->titulo}}</h1>
    <p>{{$solicitud->caracteristica}}</p>
    <p>{{$solicitud->descripcion}}</p>
    <small>Creada el {{$solicitud->created_at}}</small>
@endsection