@extends('layouts.plantilla')

@section('content')
<div class="container">
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Solicitud - Postulación') }}</div>

                <div class="card-body">
                    {!! Form::open(['action' => 'RequestController@store', 'method' => 'POST'])!!}
                        @csrf
                        <div class="form-group row">
                            {!! Form::label ('nombre_solicitud','Nombre de la Solicitud*')!!}
                            {!! Form::text ('nombre_solicitud',null,['class'=>"form-control {{ $errors->has('nombre_solicitud') ? ' is-invalid' : '' }}",'placeholder'=>'Nombre de la Solicitud','required'])!!}
                            @if ($errors->has('nombre_solicitud'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('nombre_solicitud') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('actividades','Actividades*')!!}
<<<<<<< HEAD
                            {!! Form::text ('actividades',null,['class'=>"form-control {{ $errors->has('actividades') ? ' is-invalid' : '' }}",'placeholder'=>'actividades','required'])!!}
=======
                            {!! Form::test ('actividades',null,['class'=>"form-control {{ $errors->has('actividades') ? ' is-invalid' : '' }}",'placeholder'=>'actividades','required'])!!}
>>>>>>> fde26dcd4487f788f35015aa5926385f4366dde6
                            @if ($errors->has('actividades'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('actividades') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                                {!! Form::label ('descripcion','Descrición*')!!}
                                {!! Form::text ('descripcion',null,['class'=>"form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}",'placeholder'=>'descripcion','required'])!!}
                                @if ($errors->has('descripcion'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('titulo','Titulo*')!!}
                            {!! Form::text ('titulo',null,['class'=>"form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}",'placeholder'=>'titulo','required'])!!}
                            @if ($errors->has('titulo'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('caracteristica','Caracteristica')!!}
                            {!! Form::text ('caracteristica',null,['class'=>"form-control {{ $errors->has('caracteristica') ? ' is-invalid'}}",'placeholder'=>'caracteristica'])!!}
                            @if ($errors->has('caracteristica'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('caracteristica') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('asunto','Asunto')!!}
                            {!! Form::text ('asunto',null,['class'=>"form-control {{ $errors->has('asunto') ? ' is-invalid' }}",'placeholder'=>'asunto'])!!}
                            @if ($errors->has('asunto'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('asunto') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('mensaje','Mensajes')!!}
                            {!! Form::text ('mensaje',null,['class'=>"form-control {{ $errors->has('mensaje') ? ' is-invalid' }}",'placeholder'=>'mensaje'])!!}
                            @if ($errors->has('mensaje'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('mensaje') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ajustar Archivo') }}
                                    </button>
                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aceptar') }}
                                </button>
                            </div>
                        </div>

                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






