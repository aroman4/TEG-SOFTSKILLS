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
                <div class="card-header">{{ __('Crear actividad') }}</div>
                    <div class="card-body">
                        {!!Form::open(['action' => 'ActividadController@store', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                            <input type="hidden" name="id_investigacion" value="{{ $inv->id }}"> 
                            @csrf
                            
                             <div class="form-group row">
                                    {!! Form::label ('fecha_entrega','fecha de Entrega de la Actividad:')!!}
                                    {!! Form::date ('fecha_entrega',null,['class'=>"form-control {{ $errors->has('fechas_entrega') ? ' is-invalid'}}",'placeholder'=>'dd/mm/aa','required'])!!}
                                    @if ($errors->has('fecha_entrega'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('fecha_entrega') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    {!! Form::label ('titulo','Titulo de la actividad:')!!}
                                    {!! Form::text ('titulo',null,['class'=>"form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}",'placeholder'=>'Titulo de la Actividad','required'])!!}
                                    @if ($errors->has('titulo'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                            </span>
                                    @endif
                                 </div>                                  
                               <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">Enviar Actividad</button>
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