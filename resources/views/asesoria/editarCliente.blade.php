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
                <div class="card-header">{{ __('Editar Solicitud de Investigación') }}</div>

                    <div class="card-body">
                        {!!Form::open(['route' => ['solicitud.update', $Solicitud], 'method' => 'PUT', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                             @csrf
                                <div class="form-group row">
                                    {!! Form::label ('titulo','Titulo:*')!!}
                                    {!! Form::text ('titulo', $Solicitud->titulo, ['class'=>"form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}",'placeholder'=>'Titulo','required'])!!}
                                    @if ($errors->has('titulo'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                            </span>
                                    @endif
                                 </div>
                                <div class="form-group row">
                                    {!! Form::label ('caracteristica','Caracteristica:*')!!}
                                    {!! Form::text ('caracteristica', $Solicitud->caracteristicas, ['class'=>"form-control {{ $errors->has('caracteristica') ? ' is-invalid'}}",'placeholder'=>'Caracteristica'])!!}
                                    @if ($errors->has('caracteristica'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('caracteristica') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                        {!! Form::label ('descripcion','Descripción:*')!!}
                                        {!! Form::text ('descripcion', $Solicitud->descripcion,['class'=>"form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}",'placeholder'=>'Descripcion','required'])!!}
                                        @if ($errors->has('descripcion'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
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