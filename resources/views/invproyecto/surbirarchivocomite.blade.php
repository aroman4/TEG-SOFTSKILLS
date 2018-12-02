@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('vistainvestigaciones')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Cargar Archivo al Comité</h1>
            @endif
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 list-group-item ">
                    {!!Form::open(['action' => 'InvestigacionController@enviaralcomite', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                    @csrf    
                    <input type="hidden" name="idinvestigacion" value="{{ $idinvestigacion }}">
                        <div class="form-group">   
                            <label class="col-md-4 control-label">Subir Archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="archivof" >
                                </div>
                        </div> 
                        
                       {{--  <div class="form-group row">
                                {!! Form::label ('descripcion3','Descripción:')!!}
                                {!! Form::text ('descripcion3',null,['class'=>"form-control {{ $errors->has('descripcion3') ? ' is-invalid' : '' }}",'placeholder'=>'Descripcion el Archivo a Enviar','required'])!!}
                                @if ($errors->has('descripcion3'))
                                <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('descripcion3') }}</strong>
                                </span>
                                @endif
                        </div> --}}

                        <button type="submit" class="btn btn-primary boton1">Enviar</button>
                    {!!Form::close()!!}              
            </div>
    </div>
</div>
@endsection