@extends('layouts.plantilla')
@section('content')
<div class="text-center">
    <p>{{$postulacion->otros_proyectos}}</p>
    <p>{{$postulacion->aporte}}</p>
    <p>{{$postulacion->actividad}}</p>
    <small>Creada el {{$postulacion->created_at}}</small>

    <br><br>
    <a href="{{route('listapostulaciones')}}" class="btn btn-secondary">Regresar</a>
    </div>
@endsection