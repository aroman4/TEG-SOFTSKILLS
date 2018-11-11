@extends('layouts.plantilla')
@section('content')
<div class="text-center">
    {!!Form::open(['action' => 'EncuestaController@storerespuestauno', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}

        <p>{{$encuesta->pregunta1}}</p>
        <input type="radio" name="respuesta1" value="1">
        <input type="radio" name="respuesta1" value="2">
        <input type="radio" name="respuesta1" value="3">
        <input type="radio" name="respuesta1" value="4">
        <input type="radio" name="respuesta1" value="5">

        <p>{{$encuesta->pregunta2}}</p>
        <input type="radio" name="respuesta2" value="1">
        <input type="radio" name="respuesta2" value="2">
        <input type="radio" name="respuesta2" value="3">
        <input type="radio" name="respuesta2" value="4">
        <input type="radio" name="respuesta2" value="5">

        <p>{{$encuesta->pregunta3}}</p>
        <input type="radio" name="respuesta3" value="1">
        <input type="radio" name="respuesta3" value="2">
        <input type="radio" name="respuesta3" value="3">
        <input type="radio" name="respuesta3" value="4">
        <input type="radio" name="respuesta3" value="5">

        <p>{{$encuesta->pregunta4}}</p>
        <input type="radio" name="respuesta4" value="1">
        <input type="radio" name="respuesta4" value="2">
        <input type="radio" name="respuesta4" value="3">
        <input type="radio" name="respuesta4" value="4">
        <input type="radio" name="respuesta4" value="5">

        <p>{{$encuesta->pregunta5}}</p>
        <input type="radio" name="respuesta5" value="1">
        <input type="radio" name="respuesta5" value="2">
        <input type="radio" name="respuesta5" value="3">
        <input type="radio" name="respuesta5" value="4">
        <input type="radio" name="respuesta5" value="5">

        <p>{{$encuesta->pregunta6}}</p>
        <input type="radio" name="respuesta6" value="1">
        <input type="radio" name="respuesta5" value="2">
        <input type="radio" name="respuesta6" value="3">
        <input type="radio" name="respuesta6" value="4">
        <input type="radio" name="respuesta6" value="5">

        <small>Creada el {{$encuesta->created_at}}</small>
    {!!Form::close()!!}              

    <br><br>
    <a href="{{route('vistaencuesta')}}" class="btn btn-secondary">Regresar</a>
    </div>
@endsection