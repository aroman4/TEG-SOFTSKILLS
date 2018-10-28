@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-10 listaQuest">
        <ul class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    @if(auth()->user()->tipo_usu == "asesor")
                        <h2 class="Titulo" style="float:right;"> Cuestionarios creados</h2>
                    @elseif(auth()->user()->tipo_usu == "cliente")
                        <h2 class="Titulo" style="float:right;"> Cuestionarios recibidos</h2>
                    @endif
                    {{-- <a href="{{route('cuestionario.nuevo') }}">Crear</a> --}}
                </div>
            </div>
            @forelse ($cuestionarios as $cuestionario)
                @if(auth()->user()->id == $cuestionario->user_id)
                    <div class="row">
                        <div class="col-md-12 list-group-item" style="background:black; color: darkgray">
                            <small style="font-style: italic; float:right">Para crear un nuevo cuestionario, debe hacerlo desde una asesoría activa   <a href="{{route('asesescritorio')}}" class="btn btn-dark" >Ir a asesorías</a></small>                            
                        </div>
                    </div>
                    <div class="row" style="min-height: 50vh">
                        <div class="col-md-6 list-group-item contentAlv">
                            <h2>Cuestionarios respondidos:</h2>
                            @if($cuestionario->respondido == true)
                                <ul class="list-group">
                                    <li class="list-group-item listaAsesSolic">
                                        <div>
                                            {{ link_to_route('cuestionario.detalle', $cuestionario->titulo, ['id'=>$cuestionario->id])}}
                                            <a href="{{route('cuestionario.detalle', $cuestionario->id) }}" title="Editar cuestionario" class="secondary-content"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Ver respuestas del cuestionario" class="secondary-content"><i class="fab fa-wpforms"></i></a>
                                        </div>
                                        @if($cuestionario->respondido == false)
                                            <span style="color:black">No respondido</span>
                                        @else
                                            <span style="color:black">Respondido</span>
                                        @endif
                                    </li>
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-6 list-group-item contentAlv1">
                            <h2>Cuestionarios no respondidos:</h2>
                            @if($cuestionario->respondido == false)
                                <ul class="list-group">
                                    <li class="list-group-item listaAsesSolic">
                                        <div>
                                            {{ link_to_route('cuestionario.detalle', $cuestionario->titulo, ['id'=>$cuestionario->id])}}
                                            <a href="{{route('cuestionario.detalle', $cuestionario->id) }}" title="Editar cuestionario" class="secondary-content"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Ver respuestas del cuestionario" class="secondary-content"><i class="fab fa-wpforms"></i></a>
                                        </div>
                                        @if($cuestionario->respondido == false)
                                            <span style="color:black">No respondido</span>
                                        @else
                                            <span style="color:black">Respondido</span>
                                        @endif
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>                
                @elseif(auth()->user()->id == $cuestionario->cliente_id && $cuestionario->respondido == false)
                    <li class="list-group-item listaAsesSolic">
                        <a href="{{route('cuestionario.ver', $cuestionario->id) }}" title="Responder cuestionario" class="secondary-content">{{$cuestionario->titulo}}</a>  
                    </li>
                @else
                    <li class="list-group-item listaAsesSolic">
                        No hay cuestionarios nuevos por responder
                    </li>
                @endif
            @empty
                <p class="flow-text center-align">No hay cuestionarios creados</p>
            @endforelse
        </ul>
    </div>
@endsection