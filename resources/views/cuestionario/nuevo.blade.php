@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <h2 class=""> Añadir nuevo cuestionario</h2>
        <form method="POST" action="crear" id="boolean" class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="">    
            <div class="">
                <label for="titulo">Titulo del cuestionario</label>
                <input name="titulo" id="titulo" type="text" class="form-control">
            </div>          
            <div class="">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>                
            </div>
            <div class="">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>
@endsection