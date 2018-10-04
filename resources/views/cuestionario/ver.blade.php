@extends('layouts.plantillaQ')

@section('content')
    <div class="card">
        <div class="card-content">
        <span class="card-title"> Start taking cuestionario</span>
        <p>
        <span class="flow-text">{{ $cuestionario->titulo }}</span> <br/>
        </p>
        <p>  
        {{ $cuestionario->descripcion }}
        <br/>Created by: <a href="">{{ $cuestionario->user->nombre }}</a>
        </p>
        <div class="divider" style="margin:20px 0px;"></div>
            {!! Form::open(array('action'=>array('RespuestaController@store', $cuestionario->id))) !!}
            @forelse ($cuestionario->pregunta as $key=>$pregunta)
            <p class="flow-text">pregunta {{ $key+1 }} - {{ $pregunta->titulo }}</p>
                @if($pregunta->tipo_pregunta === 'text')
                    <div class="input-field col s12">
                    <input id="respuesta" type="text" name="{{ $pregunta->id }}[respuesta]">
                    <label for="respuesta">respuesta</label>
                    </div>
                @elseif($pregunta->tipo_pregunta === 'textarea')
                    <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="{{ $pregunta->id }}[respuesta]"></textarea>
                    <label for="textarea1">Textarea</label>
                    </div>
                @elseif($pregunta->tipo_pregunta === 'radio')
                    @foreach($pregunta->opcion as $key=>$value)
                    <p style="margin:0px; padding:0px;">
                        <input name="{{ $pregunta->id }}[respuesta]" type="radio" id="{{ $key }}" />
                        <label for="{{ $key }}">{{ $value }}</label>
                    </p>
                    @endforeach
                @elseif($pregunta->tipo_pregunta === 'checkbox')
                    @foreach($pregunta->opcion as $key=>$value)
                    <p style="margin:0px; padding:0px;">
                    <input type="checkbox" id="something{{ $key }}" name="{{ $pregunta->id }}[respuesta]" />
                    <label for="something{{$key}}">{{ $value }}</label>
                    </p>
                    @endforeach
                @endif 
                <div class="divider" style="margin:10px 10px;"></div>
            @empty
            <span class='flow-text center-align'>Nothing to show</span>
            @endforelse
        {{ Form::submit('Submit cuestionario', array('class'=>'btn waves-effect waves-light')) }}
        {!! Form::close() !!}
    </div>
    </div>
@endsection