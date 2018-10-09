@extends('layouts.plantilla')

@section('content')
<<<<<<< HEAD
<a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
<a href="{{route('moduloinvestigacion.destroy', $investigaciones->id)}}" class="btn btn-secondary">Eliminar investigaciones</a>
<a href="{{route('editarinves', $investigaciones->id)}}" class="btn btn-secondary">Editar investigaciones</a>

=======
    @if(Auth::user()->tipo_usu == $investigaciones->user_id)
        <a href="{{route('moduloinvestigacion.destroy', $investigaciones->id)}}" class="btn btn-secondary">Eliminar Solicitud</a>
        <a href="{{route('editarinves', $investigaciones->id)}}" class="btn btn-secondary">Editar Solicitud</a>
    @endif
    <a href="{{route('escritoriocomite')}}" class="btn btn-secondary">Regresar</a>
    
>>>>>>> 48d64f423d54d7203865de0a2b8eb090a7ac09d1
    <h1>{{$investigaciones->titulo}}</h1>
    <p>{{$investigaciones->caracteristica}}</p>
    <p>{{$investigaciones->descripcion}}</p>
    <small>Creada el {{$investigaciones->created_at}}</small>
@endsection