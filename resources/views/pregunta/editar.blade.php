@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-10 listaQuest">
        <div class="card" style="border: none">
            <div class="card-header text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h3 style="float:right">{{ __('Reformular pregunta') }}</h3>
            </div>

                <div class="card-body">
                    <form method="POST" action="{{route('pregunta.update', $pregunta->id) }}">
                        {{ method_field('PATCH') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label for="titulo">Pregunta</label>
                            <input type="text" name="titulo" id="titulo" value="{{ $pregunta->titulo }}" class="form-control">                            
                        </div>
                
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>
@endsection