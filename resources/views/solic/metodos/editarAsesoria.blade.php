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
                <div class="card-header">{{ __('Editar Solicitud de Asesoría') }}</div>

                    <div class="card-body">
                        {!!Form::open(['route' => 'solicitud.update', $solicitud, 'action' => 'RequestController@store', 'method' => 'PUT', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}

                             @csrf
                                <div class="form-group row">
                                {!! Form::label ('Titulo','Titulo:*')!!}
                                {!! Form::text ('titulo', $solicitud=>titulo, ['class'=>"form-control {{ $errors->has('titulo') ? ' is-invalid' }}",'placeholder'=>'Titulo'])!!}
                                @if ($errors->has('titulo'))
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                @endif
                                </div>
                                <div class="form-group row">
                                {!! Form::label ('mensaje','Mensaje:*')!!}
                                {!! Form::textarea ('mensaje', $solicitud=>mensaje, ['class'=>"form-control {{ $errors->has('mensaje') ? ' is-invalid' }}",'placeholder'=>'mensaje'])!!}
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
        </div>
    </div>
</div>
@endsection