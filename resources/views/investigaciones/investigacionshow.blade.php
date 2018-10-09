@extends('layouts.plantilla')

@section('content')
<a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
<a href="{{route('moduloinvestigacion.destroy', $investigaciones->id)}}" class="btn btn-secondary">Eliminar investigaciones</a>
<a href="{{route('editarinves', $investigaciones->id)}}" class="btn btn-secondary">Editar investigaciones</a>

    <h1>{{$investigaciones->titulo}}</h1>
    <p>{{$investigaciones->caracteristica}}</p>
    <p>{{$investigaciones->descripcion}}</p>
    <small>Creada el {{$investigaciones->created_at}}</small>
@endsection