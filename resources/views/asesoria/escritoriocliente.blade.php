@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <a href="{{route('solicitud.create')}}" class="btn btn-primary">Crear Solicitud</a>
    <p>Solicitudes creadas:</p>
@endsection