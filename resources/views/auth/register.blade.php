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
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <p>Los campos señalados con * son requeridos</p>
                        <div class="form-group row">
                            {!! Form::label ('nombre_usu','Nombre de usuario*')!!}
                            {!! Form::text ('nombre_usu',null,['class'=>"form-control {{ $errors->has('nombre_usu') ? ' is-invalid' : '' }}",'placeholder'=>'Nombre de usuario','required'])!!}
                            @if ($errors->has('nombre_usu'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('nombre_usu') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('email','Correo electronico*')!!}
                            {!! Form::email ('email',null,['class'=>"form-control {{ $errors->has('email') ? ' is-invalid' : '' }}",'placeholder'=>'Email','required'])!!}
                            @if ($errors->has('email'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('password','Contraseña*')!!}
                            {!! Form::password ('password',['class'=>"form-control {{ $errors->has('password') ? ' is-invalid' : '' }}",'placeholder'=>'****','required'])!!}
                            @if ($errors->has('password'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma la Contraseña*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('tipo_usu','Tipo de usuario*')!!}
                            {!! Form::select ('tipo_usu',['investigador'=>'Investigador','asesor'=>'Asesor','cliente'=>'Cliente'],null,['class'=>"form-control {{ $errors->has('tipo_usu') ? ' is-invalid' : '' }}",'required'])!!}
                            @if ($errors->has('tipo_usu'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('tipo_usu') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('nombre','Nombre*')!!}
                            {!! Form::text ('nombre',null,['class'=>"form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}",'placeholder'=>'Nombre'])!!}
                            @if ($errors->has('nombre'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('apellido','Apellido*')!!}
                            {!! Form::text ('apellido',null,['class'=>"form-control {{ $errors->has('apellido') ? ' is-invalid' : '' }}",'placeholder'=>'Apellido'])!!}
                            @if ($errors->has('apellido'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('sexo','Sexo*')!!}
                            <!--{!! Form::text ('sexo',null,['class'=>"form-control {{ $errors->has('sexo') ? ' is-invalid' }}",'placeholder'=>'Sexo'])!!}-->
                            {!! Form::select ('sexo',['Femenino'=>'Femenino','Masculino'=>'Masculino'],null,['class'=>"form-control {{ $errors->has('sexo') ? ' is-invalid' : '' }}",'required'])!!}
                            @if ($errors->has('sexo'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('sexo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <p>Los siguientes campos son opcionales:</p>
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('edad','Edad')!!}
                            {!! Form::text ('edad',null,['class'=>"form-control {{ $errors->has('edad') ? ' is-invalid' }}",'placeholder'=>'Edad','integer'])!!}
                            @if ($errors->has('edad'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('edad') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('profesion','Profesion')!!}
                            {!! Form::text ('profesion',null,['class'=>"form-control {{ $errors->has('profesion') ? ' is-invalid' }}",'placeholder'=>'Profesion'])!!}
                            @if ($errors->has('profesion'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('profesion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('telefono','Telefono')!!}
                            {!! Form::text ('telefono',null,['class'=>"form-control {{ $errors->has('edad') ? ' is-invalid'}}",'placeholder'=>'Telefono'])!!}
                            @if ($errors->has('telefono'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('direccion','Direccion')!!}
                            {!! Form::text ('direccion',null,['class'=>"form-control {{ $errors->has('direccion') ? ' is-invalid' }}",'placeholder'=>'Direccion'])!!}
                            @if ($errors->has('direccion'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('pais','Pais')!!}
                            {!! Form::text ('pais',null,['class'=>"form-control {{ $errors->has('pais') ? ' is-invalid' }}",'placeholder'=>'Pais'])!!}
                            @if ($errors->has('pais'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('pais') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('cedula','Cedula')!!}
                            {!! Form::text ('cedula',null,['class'=>"form-control {{ $errors->has('edad') ? ' is-invalid' }}",'placeholder'=>'Cedula','integer'])!!}
                            @if ($errors->has('cedula'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
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
