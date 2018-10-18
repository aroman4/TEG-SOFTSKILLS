@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->id == $investigaciones->user_id)
        <a href="{{route('moduloinv.destroy', $investigaciones->id)}}" class="btn btn-secondary">Eliminar Solicitud</a>
        <a href="{{route('editarinves', $investigaciones->id)}}" class="btn btn-secondary">Editar Solicitud</a>
        <a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
        <p>LIDER</p>
    @elseif(Auth::user()->tipo_inv == "normal")
        <a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
    @else
        <a href="{{route('escritoriocomite')}}" class="btn btn-secondary">Regresar</a>

    @endif

    <h1>{{$investigaciones->titulo}}</h1>
    <p>{{$investigaciones->caracteristica}}</p>
    <p>{{$investigaciones->actividades}}</p>
    <small>Creada el {{$investigaciones->created_at}}</small>
@endsection