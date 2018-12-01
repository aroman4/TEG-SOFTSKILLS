@include('header')
@extends('layouts.plantillaQpublic')

@section('content')
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
        <div class="col-md-12 listaQuest">
            <div class="card" style="border: none">
                <div class="card-header text-center top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    <h3 style="float:right">{{ __('Pre-Solicitud de Asesoría') }}</h3>
                </div>

                    <div class="card-body">
                        {!!Form::open(['action' => 'RequestController@storePre', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}

                             @csrf
                                <div class="form-group row">
                                {!! Form::label ('Asunto','Titulo de la asesesoría que deseas recibir:*')!!}
                                {!! Form::text ('titulo',null,['class'=>"form-control {{ $errors->has('titulo') ? ' is-invalid' }}",'placeholder'=>'Titulo','required'])!!}
                                @if ($errors->has('titulo'))
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                @endif
                                </div>
                                <div class="form-group row">
                                {!! Form::label ('Descripción','Descripción de la asesoría:*')!!}
                                {!! Form::textarea ('mensaje',null,['id'=>'article-ckeditor','class'=>"form-control {{ $errors->has('mensaje') ? ' is-invalid' }}",'placeholder'=>'Descripción','required','id'])!!}
                                @if ($errors->has('mensaje'))
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('mensaje') }}</strong>
                                        </span>
                                @endif
                            </div>                                
                            <div class="form-group">
                                <label class="col-md-4 control-label">Adjunta un archivo si lo deseas</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="archivo" >
                                </div>
                            </div>

                            <h3>Ingresa tus datos de contacto:</h3>
                            <div class="form-group row">
                                {!! Form::label ('nombre','Su nombre:*')!!}
                                {!! Form::text ('nombre',null,['class'=>"form-control {{ $errors->has('nombre') ? ' is-invalid' }}",'placeholder'=>'Nombre','required'])!!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label ('apellido','Su apellido:*')!!}
                                {!! Form::text ('apellido',null,['class'=>"form-control {{ $errors->has('nombre') ? ' is-invalid' }}",'placeholder'=>'Apellido','required'])!!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label ('email','Email:*')!!}
                                {!! Form::email ('email',null,['class'=>"form-control {{ $errors->has('email') ? ' is-invalid' }}",'placeholder'=>'Email','required'])!!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label ('telefono','Telefono')!!}
                                {!! Form::text ('telefono',null,['class'=>"form-control {{ $errors->has('telefono') ? ' is-invalid'}}",'placeholder'=>'Telefono'])!!}
                                @if ($errors->has('telefono'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                {!! Form::label ('otros','Otros medios de contacto:')!!}
                                {!! Form::textarea ('otros',null,['class'=>"form-control {{ $errors->has('otros') ? ' is-invalid' }}",'placeholder'=>'Indique otros medios por donde puede ser contactado'])!!}
                            </div>
                    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
                                </div>
                            </div>
                        {!!Form::close()!!}              
                    </div>
                </div>
            </div>
@endsection