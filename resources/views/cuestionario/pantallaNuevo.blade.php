@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="card" style="border: none">
            <div class="card-header text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h3 style="float:right">{{ __('Añadir nuevo cuestionario') }}</h3>
            </div>
                <div class="card-body">
                    <h2>Elige uno de los siguientes cuestionarios predefinidos...</h2>
                    <div class="list-group">
                    @foreach(\App\Cuestionario::all() as $cuestionario)
                        @if($cuestionario->predefinido || ($cuestionario->predefinidoasesor && ($cuestionario->user_id == auth()->user()->id)))
                            <div class="list-group-item listaAsesSolic">
                                <a href="{{route('cuestionario.detallepred',['cuestionario'=>$cuestionario->id,'asesoria'=>$asesoria->id])}}">{{$cuestionario->titulo}}</a>
                            </div>
                        @endif
                    @endforeach
                    </div>
                    <br>
                    <h2>...O crea un nuevo cuestionario</h2>
                    <a href="{{route('cuestionario.nuevoq',$asesoria->id)}}" class="btn btn-primary">Crear nueva</a>
                </div>
            </div>
        </div>
    </div>
@endsection