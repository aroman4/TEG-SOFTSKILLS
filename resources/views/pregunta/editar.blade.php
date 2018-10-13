@extends('layouts.plantillaQ')

@section('content')
    <form method="POST" action="/pregunta/{{ $pregunta->id }}/update">
    {{ method_field('PATCH') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h2 class="flow-text">Edit pregunta Title</h2>
    <div class="row">
        <div class="input-field col s12">
        <input type="text" name="titulo" id="titulo" value="{{ $pregunta->titulo }}">
        <label for="titulo">pregunta</label>
        </div>
        <div class="input-field col s12">
        <button class="btn waves-effect waves-light">Update</button>
        </div>
    </div>
    </form>
@endsection