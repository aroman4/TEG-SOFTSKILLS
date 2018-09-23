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
                {!! Form::textarea('descripcion',null,['class'=>'from-control','placeholder'=>'Escriba aquí','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('titulo', 'Titulo:*'  )!!}
                {!! Form::text('titulo',null,['class'=>'from-control','placeholder'=>'Titulos','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('caracteristica', 'Caracteristica:*'  )!!}
                {!! Form::text('caracteristica',null,['class'=>'from-control','placeholder'=>'Caracteristica','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('asunto', 'Asunto:*'  )!!}
                {!! Form::text('asunto',null,['class'=>'from-control','placeholder'=>'Asunto','required'])!!}
                </div>
        <div class = "form-group">
                {!! Form::label('mensaje', 'Mensaje:*'  )!!}
                {!! Form::textarea('mensaje',null,['class'=>'from-control','placeholder'=>'Mensaje','required'])!!}
         </div>
        <div class = "form-group">
                {!! Form::submit('Ajustar Archivo',['class'=>'btn btn-primary'])!!}
        </div>
        <div class = "form-group">
                {!! Form::submit('Enviar Solicitud',['class'=>'btn btn-primary'])!!}
        </div>
        {!! Form::close()!!}

@endsection
protected $fillable = ['nombre_solicitud', 'actividades','descripcion', 'titulo', 'caracteristica', 'asunto', 'mensaje', 'user_id'];
