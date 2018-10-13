@extends('layouts.plantilla')

@section('content')
    <h4>Foto</h4>
    <div></div>
    <h4>Nombre y Apellido</h4>
    <div>{{$usuario->nombre ." ". $usuario->apellido}}</div>
    <h4>Nombre de usuario</h4>
    <div>{{$usuario->nombre_usu}}</div>
    <h4>Sexo</h4>
    <div>{{$usuario->sexo}}</div>
    <h4>Email</h4>
    <div>{{$usuario->email}}</div>
    <h4>Tipo de usuario</h4>
    <div>{{$usuario->tipo_usu}}</div>
    @if($usuario->tipo_usu == "investigador")
        <h4>Tipo de investigador</h4>
        <div>{{$usuario->tipo_inv}}</div>
    @endif
    <h4>Profesión</h4>
    <div>{{$usuario->profesion}}</div>
    <h4>Edad</h4>
    <div>{{$usuario->edad}}</div>
    <h4>Teléfono</h4>
    <div>{{$usuario->telefono}}</div>
    <h4>Dirección</h4>
    <div>{{$usuario->direccion}}</div>
    <h4>Pais</h4>
    <div>{{$usuario->pais}}</div>
    <h4>Dirección</h4>
    <div>{{$usuario->direccion}}</div>
@endsection