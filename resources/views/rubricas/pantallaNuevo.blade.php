@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="card" style="border: none">
            <div class="card-header text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h3 style="float:right">{{ __('Añadir nueva rúbrica') }}</h3>
            </div>
                <div class="card-body">
                    <h2>Elige una de las siguientes rúbricas predefinidas...</h2>                    
                    <div class="list-group">
                    @foreach(\App\Rubrica::all() as $rubrica)
                        @if($rubrica->predefinido || ($rubrica->predefinidoasesor && ($rubrica->user_id == auth()->user()->id)))
                            <div class="list-group-item listaAsesSolic">
                                <a href="{{route('rubrica.detallepred',['rubrica'=>$rubrica->id,'asesoria'=>$asesoria->id])}}">{{$rubrica->titulo}}</a>
                            </div>
                        @endif
                    @endforeach
                    </div>
                    <br>
                    <h2>...O crea una nueva rúbrica</h2>
                    <a href="{{route('rubrica.pantallanuevo',$asesoria->id)}}" class="btn btn-primary">Crear nueva</a>
                </div>
            </div>
        </div>
    </div>
@endsection