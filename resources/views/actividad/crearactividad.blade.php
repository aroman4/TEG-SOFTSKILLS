@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('nombreinvpostulacion')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Crear Actividad </h1>
            @endif
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 list-group-item ">
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
                                        <button type="submit" class="btn btn-primary boton1">Enviar Actividad</button>
                                    </div>
                               </div>
                        {!!Form::close()!!}              
                    </div>
    </div>
</div>
@endsection