@extends('layouts.plantillaQ')

@section('content')
<form method="POST" action="/cuestionario/{{ $cuestionario->id }}/update">
    {{ method_field('PATCH') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h2 class="flow-text">Edit cuestionario</h2>
     <div class="row">
      <div class="input-field col s12">
        <input type="text" name="titulo" id="titulo" value="{{ $cuestionario->titulo }}">
        <label for="titulo">Question</label>
      </div>
      <div class="input-field col s12">
        <textarea id="descripcion" name="descripcion" class="materialize-textarea">{{ $cuestionario->descripcion }}</textarea>
        <label for="descripcion">Description</label>
      </div>
      <div class="input-field col s12">
      <button class="btn waves-effect waves-light">Update</button>
      </div>
    </div>
  </form>
@endsection