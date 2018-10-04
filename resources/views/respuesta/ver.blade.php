@extends('layouts.plantillaQ')

@section('content')
    <h4>{{ $cuestionario->titulo }}</h4>
    <table class="bordered striped">
    <thead>
        <tr>
            <th data-field="id">Question</th>
            <th data-field="name">Answer(s)</th>
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
            No answers provided by you for this Survey
            </td>
            <td></td>
        </tr>
        @endforelse
    </tbody>
    </table>
@endsection