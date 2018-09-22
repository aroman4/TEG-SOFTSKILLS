@extends('layouts.plantilla')
@section('content')
        {!! Form::open(['action' => 'RequestController@store', 'method' => 'POST'])!!}
        <div class = "form-group">
                {!! Form::label('nombre_solicitud', 'Nombre de la Solicitud:*  ')!!}
                {!! Form::text('nombre_solicitud',null,['class'=>'form-control','placeholder'=>'Nombre de la Solicitud','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('actividades', 'Actividades:*'  )!!}
                {!! Form::text('actividades',null,['class'=>'form-control','placeholder'=>'Actividades a Realizar','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('descripcion', 'Descripción:*' )!!}
                {!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Escriba aquí','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('titulo', 'Titulo:*'  )!!}
                {!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Titulos','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('caracteristica', 'Caracteristica:*'  )!!}
                {!! Form::text('caracteristica',null,['class'=>'form-control','placeholder'=>'Caracteristica','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('asunto', 'Asunto:*'  )!!}
                {!! Form::text('asunto',null,['class'=>'form-control','placeholder'=>'Asunto','required'])!!}
                </div>
        <div class = "form-group">
                {!! Form::label('mensaje', 'Mensaje:*'  )!!}
                {!! Form::textarea('mensaje',null,['class'=>'form-control','placeholder'=>'Mensaje','required'])!!}
         </div>
        <div class = "form-group">
                {!! Form::submit('Ajustar Archivo',['class'=>'btn btn-primary'])!!}
        </div>
        <div class = "form-group">
                {!! Form::submit('Enviar Solicitud',['class'=>'btn btn-primary'])!!}
        </div>
        {!! Form::close()!!}

@endsection