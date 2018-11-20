@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="card" style="border: none">
            <div class="card-header text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h3 style="float:right">{{ __('Reporte final de asesoría') }}</h3>
            </div>
                <div class="card-body">                    
                    <form method="POST" action="{{ route('finalizarasesoriapost') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_asesoria" value="{{ $asesoria->id }}">                        
                        <div class="form-group row">
                            <label for="texto">Escriba el reporte:</label>
                            <textarea style="height: 500px" name="texto" id="texto" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-success" href="{{route('reporteasesoria',$asesoria->id)}}">Ver reportes de cuestionarios y rúbricas para esta asesoría</a>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Adjuntar Archivo</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="archivo" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <input type="checkbox" name="enviar" value="1" >Enviar reporte a cliente<br>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>
@endsection