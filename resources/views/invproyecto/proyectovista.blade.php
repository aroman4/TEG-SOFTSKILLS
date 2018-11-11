@extends('layouts.plantilla')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">{{ __('Subir Actividad') }}</div>
                <div class="card-body">
                    {!!Form::open(['action' => 'PostulacionController@enviar', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                    @csrf    
                    <input type="hidden" name="idpostulacion" value="{{ $idpostulacion }}">
                        <div class="form-group">   
                            <label class="col-md-4 control-label">Subir Archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="archivo_inv" >
                                </div>
                        </div>   
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    {!!Form::close()!!}              
                </div>
            </div>
        </div>
    <br><br><br>
    <div class="text-center">
        <a href="{{route('proyectogrupalpost')}}" class="btn btn-secondary">Regresar</a>
    </div>
</div>
@endsection