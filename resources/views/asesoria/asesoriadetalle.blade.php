@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9">
    @if(Auth::user()->tipo_usu == "asesor")
        <a href="{{route('escritorioasesor')}}" class="btn btn-secondary">Regresar</a>
        <a href="{{route('moduloasesoria.destroy', $asesoria->id)}}" class="btn btn-secondary">Eliminar Asesoría</a>
        <a href="{{route('moduloasesoria.edit', $asesoria->id)}}" class="btn btn-secondary">Editar Asesoría</a>
    @elseif(Auth::user()->tipo_usu == "cliente")
        <a href="{{route('escritoriocliente')}}" class="btn btn-secondary">Regresar</a>    
    @endif
    
    <h1>{{$asesoria->titulo}}</h1>
    <h3>{{$asesoria->mensaje}}</h3>
    <p>Cliente: <span>{{\App\User::find($asesoria->id_cliente)->nombre}} {{\App\User::find($asesoria->id_cliente)->apellido}}</span></p>
    <p>Estado de la asesoria: <span>{{$asesoria->estado}}</span></p>
    <small>Creada el {{$asesoria->created_at}}</small>
</div>
@endsection