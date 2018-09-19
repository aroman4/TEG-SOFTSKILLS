@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            {!! Form::label ('nombre_usu','Nombre de usuario*')!!}
                            {!! Form::text ('nombre_usu',null,['class'=>"form-control {{ $errors->has('nombre_usu') ? ' is-invalid' : '' }}",'placeholder'=>'Nombre de usuario','required'])!!}
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre_usu') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('email','Correo electronico*')!!}
                            {!! Form::email ('email',null,['class'=>"form-control {{ $errors->has('email') ? ' is-invalid' : '' }}",'placeholder'=>'Email','required'])!!}
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('clave_usu','Contraseña*')!!}
                            {!! Form::password ('clave_usu',['class'=>"form-control {{ $errors->has('clave_usu') ? ' is-invalid' : '' }}",'placeholder'=>'****','required'])!!}
                            @if ($errors->has('clave_usu'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('clave_usu') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('tipo_usu','Tipo de usuario*')!!}
                            {!! Form::select ('tipo_usu',['investigador'=>'Investigador','asesor'=>'Asesor','cliente'=>'Cliente'],null,['class'=>"form-control {{ $errors->has('tipo_usu') ? ' is-invalid' : '' }}",'required'])!!}
                            @if ($errors->has('tipo_usu'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipo_usu') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('edad','Edad')!!}
                            {!! Form::number ('edad',null)!!}
                            @if ($errors->has('edad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('edad') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('nombre','Nombre')!!}
                            {!! Form::text ('nombre',null,['class'=>"form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}",'placeholder'=>'Nombre'])!!}
                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('apellido','Apellido')!!}
                            {!! Form::text ('apellido',null,['class'=>"form-control {{ $errors->has('apellido') ? ' is-invalid' : '' }}",'placeholder'=>'Apellido'])!!}
                            @if ($errors->has('apellido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('telefono','Telefono')!!}
                            {!! Form::number ('telefono',null)!!}
                            @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('direccion','Direccion')!!}
                            {!! Form::text ('direccion',null,['class'=>"form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}",'placeholder'=>'Direccion'])!!}
                            @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('pais','Pais')!!}
                            {!! Form::text ('pais',null,['class'=>"form-control {{ $errors->has('pais') ? ' is-invalid' : '' }}",'placeholder'=>'Pais'])!!}
                            @if ($errors->has('pais'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pais') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('profesion','Profesion')!!}
                            {!! Form::text ('profesion',null,['class'=>"form-control {{ $errors->has('profesion') ? ' is-invalid' : '' }}",'placeholder'=>'Profesion'])!!}
                            @if ($errors->has('profesion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('profesion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('sexo','Sexo')!!}
                            {!! Form::text ('sexo',null,['class'=>"form-control {{ $errors->has('sexo') ? ' is-invalid' : '' }}",'placeholder'=>'Sexo'])!!}
                            @if ($errors->has('sexo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sexo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('cedula','Cedula')!!}
                            {!! Form::number ('cedula',null)!!}
                            @if ($errors->has('cedula'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
