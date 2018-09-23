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
                <div class="card-header">{{ __('Solicitud de Asesoría') }}</div>

                    <div class="card-body">
                        {!!Form::open(['action' => 'RequestController@store', 'method' => 'POST'])!!}

                             @csrf
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






