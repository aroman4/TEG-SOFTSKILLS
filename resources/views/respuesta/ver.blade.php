@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <h4>{{ $cuestionario->titulo }}</h4>
    <br>
    <table class="table table-dark">
    <thead>
        <tr>
            <th data-field="id">Pregunta</th>
            <th data-field="name">Respuesta(s)</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($cuestionario->pregunta as $item)
        <tr>
        <td>{{ $item->titulo }}</td>
        @foreach ($item->respuesta as $respuesta)
            <td>{{ $respuesta->respuesta }} <br/>
            <small>{{ $respuesta->created_at }}</small></td>
        @endforeach
        </tr>
        @empty
        <tr>
            <td>
            No hay respuestas para esta pregunta
            </td>
            <td></td>
        </tr>
        @endforelse
    </tbody>
    </table>
</div>
@endsection