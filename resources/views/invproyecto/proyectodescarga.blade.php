@extends('layouts.plantilla')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">{{ __('Subir Actividad') }}</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Subir Archivo</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="archivo" >
                            </div>
                    </div>
                    @forelse(\App\Postulacion::all() as $postulacion)

                        <div class="col-md-3">                
                            <a href="proyecto/{{$postulacion->archivo}}" download="{{$postulacion->archivo}}">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-upload">  Download </i>
                                </button>
                            </a>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>

    <br><br><br>
    <div class="text-center">
        <a href="{{route('proyectogrupalpost')}}" class="btn btn-secondary">Regresar</a>
    </div>
</div>
@endsection