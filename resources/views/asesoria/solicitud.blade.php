@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->tipo_usu == "asesor")
        <a href="{{route('escritorioasesor')}}" class="btn btn-secondary">Regresar</a>
    @elseif(Auth::user()->tipo_usu == "cliente")
        <a href="{{route('escritoriocliente')}}" class="btn btn-secondary">Regresar</a>
    @endif
    <h1>{{$solicitud->titulo}}</h1>
    <p>{{$solicitud->mensaje}}</p>
    <small>Creada el {{$solicitud->created_at}}</small>
@endsection