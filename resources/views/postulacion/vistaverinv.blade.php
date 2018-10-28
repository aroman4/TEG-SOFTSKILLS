@extends('layouts.plantilla')

@section('content')

    <h1>{{$investigaciones->titulo}}</h1>
    <p>{{$investigaciones->caracteristica}}</p>
    <p>{{$investigaciones->actividades}}</p>
    <small>Creada el {{$investigaciones->created_at}}</small>

    <a href="{{route('listapostulaciones')}}" class="btn btn-secondary">Regresar</a>

@endsection