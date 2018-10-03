@extends('layouts.plantilla')

@section('content')
    <div class="card">
        <div class="card-content">
        <span class="card-title"> Add Survey</span>
        <form method="POST" action="crear" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">    
            <div class="input-field col s12">
            <input name="titulo" id="titulo" type="text">
            <label for="titulo">Titulo del cuestionario</label>
            </div>          
            <div class="input-field col s12">
            <textarea name="descripcion" id="descripcion" class="materialize-textarea"></textarea>
            <label for="descripcion">Descripcion</label>
            </div>
            <div class="input-field col s12">
            <button class="btn waves-effect waves-light">Submit</button>
            </div>
        </div>
        </form>
    </div>
    </div>
@endsection