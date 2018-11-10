@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="card" style="border: none">
            <div class="card-header text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h3 style="float:right">{{ __('Añadir nuevo cuestionario') }}</h3>
            </div>

                <div class="card-body">
                    <form method="POST" action="{{route('cuestionario.crear')}}" id="boolean" class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_asesoria" value="{{ $asesoria->id }}">
                        <input type="hidden" name="cliente_id" value="{{ $asesoria->id_cliente }}">
                        <div class="form-group row">
                            <label for="titulo">Titulo del cuestionario</label>
                            <input name="titulo" id="titulo" type="text" class="form-control">
                        </div>
                        <div class="form-group row">                            
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>  
                        </div>
                
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary">Siguiente</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>
@endsection