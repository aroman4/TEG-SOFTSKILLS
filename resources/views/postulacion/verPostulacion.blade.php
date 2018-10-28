@extends('layouts.plantilla')
@section('content')
    <p>{{$postulacion->otros_proyectos}}</p>
    <p>{{$postulacion->aporte}}</p>
    <p>{{$postulacion->actividad}}</p>
    <small>Creada el {{$postulacion->created_at}}</small>

    <div class="text-center">
        <a href="{{route('postulaciones')}}" class="btn btn-secondary">Regresar</a>
    </div>
@endsection