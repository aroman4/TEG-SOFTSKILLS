@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
        <div class="row">
            <div class="col-md-3 list-group-item">
                @if(Auth::user()->tipo_usu == "asesor")
                    <a href="{{route('escritorioasesor')}}" class="btn btn-secondary">Regresar</a>
                @elseif(Auth::user()->tipo_usu == "cliente")
                    <a href="{{route('escritoriocliente')}}" class="btn btn-secondary">Regresar</a>    
                @endif
            </div>
            <div class="col-md-6 list-group-item">
                <h2 class="text-center">{{$cuestionario->titulo}}</h2>
            </div>
            <div class="col-md-3 list-group-item">
            </div>
        </div>
        <div class="list-group-item">
            {{ $cuestionario->descripcion }}
            <br/>Creado por: <a href="">{{ $cuestionario->user->nombre ." ". $cuestionario->user->apellido}}</a>
        </div>
        {!! Form::open(array('action'=>array('RespuestaController@store', $cuestionario->id))) !!}
        <div class="card">
        @forelse ($cuestionario->pregunta as $key=>$pregunta)
        <p class="card-header card-title">Pregunta {{ $key+1 }} - {{ $pregunta->titulo }}</p>
            @if($pregunta->tipo_pregunta === 'text')
                <div class="list-group-item">
                    <label for="respuesta">Su respuesta</label>
                    <input id="respuesta" type="text" name="{{ $pregunta->id }}[respuesta]" class="form-control">
                </div>
            @elseif($pregunta->tipo_pregunta === 'textarea')
                <div class="list-group-item">
                    <textarea class="form-control" id="textarea1" class="materialize-textarea" name="{{ $pregunta->id }}[respuesta]"></textarea>
                    <label for="textarea1">Textarea</label>
                </div>
            @elseif($pregunta->tipo_pregunta === 'radio')
                <div class="list-group-item">
                @foreach($pregunta->opcion as $key1=>$value)
                    <div class="form-check">
                        <input name="{{ $pregunta->id }}[respuesta]" type="radio" id="{{ $key1 }}" value="{{ $value }}" />
                        <label for="{{ $key1 }}" >{{ $value }}</label>
                    </div>
                @endforeach
                </div>
            @elseif($pregunta->tipo_pregunta === 'checkbox')
                <div class="list-group-item">    
                @foreach($pregunta->opcion as $key2=>$value)
                    <div class="form-check">
                        <input type="checkbox" id="something{{ $key2 }}" name="{{ $pregunta->id }}[respuesta][]" value="{{ $value }}" class="form-check-input"/>
                        <label for="something{{$key2}}" class="form-check-label">{{ $value }} </label>
                    </div>
                @endforeach
                </div>
            @endif 
        @empty
        <span class='flow-text center-align'>No hay preguntas</span>
        @endforelse
        <div class="list-group-item text-center">
            {{ Form::submit('Terminar y enviar respuestas', array('class'=>'btn btn-primary')) }}
            {!! Form::close() !!}
        </div>
        </div>
    </div>
</div>
@endsection