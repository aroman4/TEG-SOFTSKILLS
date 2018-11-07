@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-10 listaQuest">
        <ul class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    <h2 style="float:right"><span style="color:darkgray">Reportes de:</span> {{$asesoria->titulo}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 list-group-item">
                    <div class="row">
                            <div class="col-md-6 list-group-item">
                                <h2>Cuestionarios:</h2>
                                <ul class="list-group">
                                    @forelse (\App\Cuestionario::all() as $cuestionario)
                                        @if(auth()->user()->id == $cuestionario->user_id && $cuestionario->respondido == true && $cuestionario->id_asesoria == $asesoria->id)
                                            <li class="list-group-item listaAsesSolic">
                                                <div>
                                                    <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Respuestas cuestionario" class="secondary-content">{{$cuestionario->titulo}}</a>
                                                </div>
                                            </li>                                                                                
                                        {{-- @elseif(auth()->user()->id == $cuestionario->cliente_id && $cuestionario->respondido == false)
                                            <li class="list-group-item listaAsesSolic">
                                                <a href="{{route('cuestionario.ver', $cuestionario->id) }}" title="Responder cuestionario" class="secondary-content">{{$cuestionario->titulo}}</a>  
                                            </li> --}}
                                        @endif
                                    @empty
                                    {{-- <div class="list-group-item">
                                        <p class="flow-text center-align">No hay cuestionarios creados para esta asesoría</p>
                                    </div> --}}
                                    @endforelse
                                </ul> 
                            </div>
                            <div class="col-md-6 list-group-item">
                                <h2>Rúbricas:</h2>
                                <ul class="list-group">
                                    @forelse (\App\Rubrica::all() as $rubrica)
                                        @if(auth()->user()->id == $rubrica->user_id && $rubrica->respondidoc == true && $rubrica->id_asesoria == $asesoria->id)
                                            <li class="list-group-item listaAsesSolic">
                                                <div>
                                                    <a href="{{route('rubrica.respuesta', $rubrica->id) }}" title="Ver respuestas de la rubrica" class="secondary-content">{{$rubrica->titulo}}</a>  
                                                </div>
                                            </li>                                   
                                        {{-- @elseif(auth()->user()->id == $rubrica->cliente_id && $rubrica->respondidoc == false)
                                            <li class="list-group-item listaAsesSolic">
                                                    <a href="{{route('rubrica.respuesta', $rubrica->id) }}" title="Ver respuestas de la rubrica" class="secondary-content">{{$rubrica->titulo}}</a>  
                                            </li> --}}
                                        @endif
                                    @empty
                                    {{-- <div class="list-group-item">
                                        <p class="flow-text center-align">No hay rúbricas creadas</p>
                                    </div> --}}
                                    @endforelse  
                                </ul> 
                            </div>        
                        </div>
                </div>
            </div>
        </ul>
    </div>
@endsection