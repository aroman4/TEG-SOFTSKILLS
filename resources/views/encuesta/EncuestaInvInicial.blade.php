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
                <div class="card-header">{{ __('Encuesta Número 1') }}</div>

                    <div class="card-body">
                        {!!Form::open(['action' => 'EncuestaController@store', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                             @csrf  
                            <input type="hidden" name="id_investg" value="{{ $inv->id}}">
                            <input type="hidden" name="id_creador" value="{{ $inv->user_id }}">
                                <div class="form-group row">
                                    {!! Form::label ('pregunta1','Cuales son tus capacidades para resolver problemas:*')!!}
                                    {!! Form::textarea ('pregunta1',null,['class'=>"form-control {{ $errors->has('pregunta1') ? ' is-invalid' : '' }}",'placeholder'=>'Escribe tu Respuesta','required'])!!}
                                    @if ($errors->has('pregunta1'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('pregunta1') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    {!! Form::label ('pregunta2','Te Gusta Trabajar en Equipo:*')!!}
                                    {!! Form::select ('pregunta2',['Si'=>'Si','No'=>'No','Normal'=>'Normal'],null,['class'=>'form-control','required'])!!}                                
                                </div>
                                <div class="form-group row">
                                    {!! Form::label ('pregunta3','Te Adaptas a Cualquier cambio:*')!!}
                                    {!! Form::textarea ('pregunta3',null,['class'=>"form-control {{ $errors->has('pregunta3') ? ' is-invalid' : '' }}",'placeholder'=>'Escribe tu Respuesta','required'])!!}
                                    @if ($errors->has('pregunta3'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('pregunta3') }}</strong>
                                        </span>
                                    @endif
                                </div>   
                                <div class="form-group row">
                                    {!! Form::label ('pregunta4','Que Tipo de Actitud:*')!!}
                                    {!! Form::select ('pregunta4',['Positiva'=>'Positiva','Negativa'=>'Negativa','Ninguna'=>'Ninguna'],null,['class'=>'form-control','required'])!!}                                
                                </div>  
                                <div class="form-group row">
                                    {!! Form::label ('pregunta5','Eres bueno Optimizando tu tiempo:*')!!}
                                    {!! Form::textarea ('pregunta5',null,['class'=>"form-control {{ $errors->has('pregunta5') ? ' is-invalid'}}",'placeholder'=>'Escribe tu Respuesta'])!!}
                                    @if ($errors->has('pregunta5'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('pregunta5') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    {!! Form::label ('pregunta6','Como te consideras como persona:*')!!}
                                    {!! Form::textarea ('pregunta6',null,['class'=>"form-control {{ $errors->has('pregunta6') ? ' is-invalid'}}",'placeholder'=>'Escribe tu Respuesta'])!!}
                                    @if ($errors->has('pregunta6'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('pregunta6') }}</strong>
                                            </span>
                                    @endif
                                </div>                                   
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">Enviar Respuestas</button>
                                        </div>
                                    </div>
                        {!!Form::close()!!}              
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






