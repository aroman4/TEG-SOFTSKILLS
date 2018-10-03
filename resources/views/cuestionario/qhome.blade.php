@extends('layouts.plantilla')

@section('content')
    <ul class="collection with-header">
        <li class="collection-header">
            <h2 class="flow-text">Recent cuestionarios
                <span style="float:right;">{{ link_to_route('cuestionario.nuevo','Nueva') }}
                </span>
            </h2>
        </li>
        @forelse ($cuestionarios as $cuestionario)
            <li class="collection-item">
            <div>
                {{ link_to_route('cuestionario.detalle', $cuestionario->title, ['id'=>$cuestionario->id])}}
                <a href="cuestionario/ver/{{ $cuestionario->id }}" title="Take cuestionario" class="secondary-content"><i class="material-icons">send</i></a>
                <a href="cuestionario/{{ $cuestionario->id }}" title="Edit cuestionario" class="secondary-content"><i class="material-icons">edit</i></a>
                <a href="cuestionario/preguntas/{{ $cuestionario->id }}" title="View cuestionario Answers" class="secondary-content"><i class="material-icons">textsms</i></a>
            </div>
            </li>
        @empty
            <p class="flow-text center-align">Nothing to show</p>
        @endforelse
    </ul>
@endsection