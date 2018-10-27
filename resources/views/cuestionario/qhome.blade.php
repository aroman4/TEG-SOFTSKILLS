@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <ul class="list-group">
            <li class="list-group-item">
                <h2 class="Titulo"> Cuestionarios
                    <span style="float:right;">{{ link_to_route('cuestionario.nuevo','Nueva') }}
                    </span>
                </h2>
            </li>
            @forelse ($cuestionarios as $cuestionario)
                @if(auth()->user()->id == $cuestionario->user_id)
                <li class="list-group-item">
                    <div>
                        {{ link_to_route('cuestionario.detalle', $cuestionario->titulo, ['id'=>$cuestionario->id])}}
                        <a href="{{route('cuestionario.detalle', $cuestionario->id) }}" title="Editar cuestionario" class="secondary-content"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Ver respuestas del cuestionario" class="secondary-content"><i class="fab fa-wpforms"></i></a>
                    </div>
                    @if($cuestionario->respondido == false)
                        <span>No respondido</span>
                    @else
                        <span>Respondido</span>
                    @endif
                </li>
                @elseif(auth()->user()->id == $cuestionario->cliente_id && $cuestionario->respondido == false)
                    <li class="list-group-item">
                        <a href="{{route('cuestionario.ver', $cuestionario->id) }}" title="Responder cuestionario" class="secondary-content">{{$cuestionario->titulo}}</a>  
                    </li>
                @endif
            @empty
                <p class="flow-text center-align">No hay cuestionarios creados</p>
            @endforelse
        </ul>
    </div>
@endsection