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
                <div class="card-header">{{ __('Solicitud de Investigación') }}</div>

                    <div class="card-body">
                        {!!Form::open(['action' => 'RequestController@store', 'method' => 'POST'])!!}

                             @csrf
                                <div class="form-group row">
                                    {!! Form::label ('titulo','Titulo:*')!!}
                                    {!! Form::text ('titulo',null,['class'=>"form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}",'placeholder'=>'Titulo','required'])!!}
                                    @if ($errors->has('titulo'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                            </span>
                                    @endif
                                 </div>
                                <div class="form-group row">
                                    {!! Form::label ('caracteristica','Caracteristica:*')!!}
                                    {!! Form::text ('caracteristica',null,['class'=>"form-control {{ $errors->has('caracteristica') ? ' is-invalid'}}",'placeholder'=>'Caracteristica'])!!}
                                    @if ($errors->has('caracteristica'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('caracteristica') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                        {!! Form::label ('descripcion','Descrición:*')!!}
                                        {!! Form::text ('descripcion',null,['class'=>"form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}",'placeholder'=>'Descripcion','required'])!!}
                                        @if ($errors->has('descripcion'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                                {{ __('Adjustar Archivo') }}
                                        </button>
                                        </div>
                                </div>
                                <br><br>
                                <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                {{ __('Aceptar') }}
                                                </button>
                                        </div>
                                </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






