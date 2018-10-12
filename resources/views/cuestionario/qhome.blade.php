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
                <li class="list-group-item">
                <div>
                    {{ link_to_route('cuestionario.detalle', $cuestionario->titulo, ['id'=>$cuestionario->id])}}
                    <a href="cuestionario/ver/{{ $cuestionario->id }}" title="Responder cuestionario" class="secondary-content"><i class="far fa-play-circle"></i></a>
                    <a href="cuestionario/{{ $cuestionario->id }}" title="Editar cuestionario" class="secondary-content"><i class="fas fa-pencil-alt"></i></a>
                    <a href="cuestionario/respuesta/{{ $cuestionario->id }}" title="Ver respuestas del cuestionario" class="secondary-content"><i class="fab fa-wpforms"></i></a>
                </div>
                </li>
            @empty
                <p class="flow-text center-align">No hay cuestionarios creados</p>
            @endforelse
        </ul>
    </div>
@endsection