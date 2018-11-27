@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('publicacioninve')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Subir Actividad Final de la Investigación</h1>
            @endif
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 list-group-item ">
                    {!!Form::open(['action' => 'InvestigacionController@enviar', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                    @csrf    
                     <input type="hidden" name="idinvestigacion" value="{{ $idinvestigacion }}">
                         <div class="form-group">   
                            <label class="col-md-4 control-label">Subir Archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="archivofinal" >
                                </div>
                        </div>   
                        <button type="submit" class="btn btn-primary boton1">Enviar</button>
                    {!!Form::close()!!}              
            </div>
    </div>
</div>
@endsection