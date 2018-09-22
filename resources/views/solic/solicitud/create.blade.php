@extends('layouts.plantilla')
@section('content')
        {!! Form::open(['action' => 'RequestController@store', 'method' => 'POST'])!!}
        <div class = "form-group">
                {!! Form::label('nombre_solicitud', 'Nombre de la Solicitud:*  ')!!}
                {!! Form::text('nombre_solicitud',null,['class'=>'from-control','placeholder'=>'Nombre de la Solicitud','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('actividades', 'Actividades:*'  )!!}
                {!! Form::text('actividades',null,['class'=>'from-control','placeholder'=>'Actividades a Realizar','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('descripcion', 'Descripción:*' )!!}
                {!! Form::text('descripcion',null,['class'=>'from-control','placeholder'=>'Escriba aquí','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::submit('Ajustar Archivo',['class'=>'btn btn-primary'])!!}
        </div>
        <div class = "form-group">
                {!! Form::submit('Enviar Solicitud',['class'=>'btn btn-primary'])!!}
        </div>
        {!! Form::close()!!}

@endsection
