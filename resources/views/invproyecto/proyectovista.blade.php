@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('vistainvestigaciones')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Subir Actividad Asignada </h1>
            @endif
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 list-group-item ">
                    {!!Form::open(['action' => 'PostulacionController@enviar', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                    @csrf    
                    <input type="hidden" name="idpostulacion" value="{{ $idpostulacion }}">
                        <div class="form-group">   
                            <label class="col-md-4 control-label">Subir Archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="archivo_inv" >
                                </div>
                        </div>  
                        <div class="form-group row">
                                {!! Form::label ('resumen1','Resumen:')!!}
                                {!! Form::textarea ('resumen1',null,['class'=>"form-control {{ $errors->has('resumen1') ? ' is-invalid' : '' }}",'placeholder'=>'Resumen del Archivo a Enviar','required'])!!}
                                @if ($errors->has('resumen1'))
                                <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('rresumen1') }}</strong>
                                </span>
                                @endif
                        </div>  
                        <button type="submit" class="btn btn-primary boton1">Enviar</button>
                    {!!Form::close()!!}              
            </div>
    </div>
</div>
@endsection