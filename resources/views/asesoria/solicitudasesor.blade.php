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
                    <h3 style="float:right">{{ __('Postulate como Asesor') }}</h3>
                </div>

                    <div class="card-body">
                        {!!Form::open(['action' => 'RequestController@storePostAsesor', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}

                             @csrf
                             <h4>Para ejercer el servicio de Asesor y pertenecer a nuestro staff, debe postularse colocando su Curriculum vitae y experiencia.
                                  Esta será evaluada por nuestro comité experto y le llegará una respuesta a su correo con la decisión.
                             </h4>
                                <div class="form-group row">
                                {!! Form::label ('Descripción','Escribe tu solicitud formal:')!!}
                                {!! Form::textarea ('mensaje',null,['class'=>"form-control {{ $errors->has('mensaje') ? ' is-invalid' }}",'placeholder'=>'mensaje'])!!}
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