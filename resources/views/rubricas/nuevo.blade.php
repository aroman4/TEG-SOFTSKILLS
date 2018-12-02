@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="card" style="border: none">
            <div class="card-header text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h3 style="float:right">{{ __('Añadir nueva rúbrica') }}</h3>
            </div>

                <div class="card-body">
                    <form method="POST" action="{{route('rubrica.crear')}}" id="crearR" class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_asesoria" value="{{ $asesoria->id }}">
                        <input type="hidden" name="cliente_id" value="{{ $asesoria->id_cliente }}">
                        <div class="form-group row">
                            <label for="titulo">Titulo de la rúbrica</label>
                            <input name="titulo" id="titulo" type="text" class="form-control">
                        </div>
                        <div class="form-group row">                            
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>  
                        </div>
                        <div class="form-group row">
                            <label for="filas">Ingrese la cantidad de filas</label>                  
                            <select name="filas" form="crearR" class="form-control">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                              </select>
                        </div>
                        <div class="form-group row">                            
                            <label for="columnas">Ingrese la cantidad de columnas</label>                  
                            <select name="columnas" form="crearR" class="form-control">
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                        </div>        
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary">Siguiente (Crear)</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>
@endsection