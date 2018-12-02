@extends('layouts.plantillaQ')

@section('content')
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
        <div class="col-md-9 listaQuest">
            <div class="card" style="border: none">
                <div class="card-header text-center top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    <h3 style="float:right">{{ __('Solicitud de Asesoría') }}</h3>
                </div>

                    <div class="card-body">
                        {!!Form::open(['action' => 'RequestController@store', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}

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






