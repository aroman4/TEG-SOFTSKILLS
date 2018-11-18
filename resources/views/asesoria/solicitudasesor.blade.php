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
                             <h4>Para ejercer el servicio de Asesor y pertenecer a nuestro staff, debe postularse colocando su Curriculum y experiencia.
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
                                <label class="col-md-4 control-label">Subir Archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="archivo" >
                                </div>
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