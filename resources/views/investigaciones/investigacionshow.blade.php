@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->id == $investigaciones->user_id)
<<<<<<< HEAD
        <a href="{{route('moduloinv.destroy', $investigaciones->id)}}" class="btn btn-secondary">Eliminar Solicitud</a>
        <a href="{{route('editarinves', $investigaciones->id)}}" class="btn btn-secondary">Editar Solicitud</a>
        <a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>

        <p>LIDER</p>
=======
        <a href="{{route('moduloinvestigacion.destroy', $investigaciones->id)}}" class="btn btn-secondary">Eliminar Solicitud</a>
        <a href="{{route('editarinves', $investigaciones->id)}}" class="btn btn-secondary">Editar Solicitud</a>
        <p>ERES EL LIDER!</p>
>>>>>>> fbc0dac79677c4e9e1196d1f76f111c7c71304e1
    @elseif(Auth::user()->tipo_inv == "normal")
        <a href="{{route('escritorioinvestigador')}}" class="btn btn-secondary">Regresar</a>
    @else
        <a href="{{route('escritoriocomite')}}" class="btn btn-secondary">Regresar</a>
<<<<<<< HEAD

    @endif

=======
    @endif

    
>>>>>>> fbc0dac79677c4e9e1196d1f76f111c7c71304e1
    <h1>{{$investigaciones->titulo}}</h1>
    <p>{{$investigaciones->caracteristica}}</p>
    <p>{{$investigaciones->descripcion}}</p>
    <small>Creada el {{$investigaciones->created_at}}</small>
@endsection