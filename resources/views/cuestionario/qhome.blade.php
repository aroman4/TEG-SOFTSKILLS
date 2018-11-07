@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-10 listaQuest">
        <ul class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    @if(auth()->user()->tipo_usu == "asesor")
                        <h2 class="Titulo" style="float:right;"> Cuestionarios y rúbricas creados</h2>
                    @elseif(auth()->user()->tipo_usu == "cliente")
                        <h2 class="Titulo" style="float:right;"> Cuestionarios y rúbricas recibidos</h2>
                    @endif
                    {{-- <a href="{{route('cuestionario.nuevo') }}">Crear</a> --}}
                </div>
            </div>
            @if(auth()->user()->tipo_usu == "asesor")
                <div class="row">
                    <div class="col-md-12 list-group-item" style="background:black; color: darkgray">
                        <small style="font-style: italic; float:right">Para crear un nuevo cuestionario o rúbrica, debe hacerlo desde una asesoría activa   <a href="{{route('asesescritorio')}}" class="btn btn-dark" >Ir a asesorías</a></small>                            
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6 list-group-item contentAlv">
                    <h2>Cuestionarios:</h2>
                    <ul class="list-group">
                        @forelse ($cuestionarios as $cuestionario)
                            @if(auth()->user()->id == $cuestionario->user_id)                            
                                <li class="list-group-item listaAsesSolic">
                                    <div>
                                        {{ link_to_route('cuestionario.detalle', $cuestionario->titulo, ['id'=>$cuestionario->id])}}
                                        <a href="{{route('cuestionario.detalle', $cuestionario->id) }}" title="Editar cuestionario" class="secondary-content"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Ver respuestas del cuestionario" class="secondary-content"><i class="fas fa-chart-pie"></i></a>
                                    </div>
                                    @if($cuestionario->respondido == false)
                                        <span style="color:black">No respondido</span>
                                    @else
                                        <span style="color:black">Respondido</span>
                                    @endif
                                </li>                                                                                
                            @elseif(auth()->user()->id == $cuestionario->cliente_id && $cuestionario->respondido == false)
                                <li class="list-group-item listaAsesSolic">
                                    <a href="{{route('cuestionario.ver', $cuestionario->id) }}" title="Responder cuestionario" class="secondary-content">{{$cuestionario->titulo}}</a>  
                                </li>
                            @endif
                        @empty
                        <div class="list-group-item contentAlv">
                            <p class="flow-text center-align">No hay cuestionarios creados</p>
                        </div>
                        @endforelse
                    </ul> 
                </div>    
                {{-- rubricas --}}
                <div class="col-md-6 list-group-item contentAlv1">
                    <h2>Rúbricas:</h2>
                    <ul class="list-group">
                        @forelse (\App\Rubrica::all() as $rubrica)
                            @if(auth()->user()->id == $rubrica->user_id)                 
                                <li class="list-group-item listaAsesSolic">
                                    <div>
                                        {{ link_to_route('rubrica.detalle', $rubrica->titulo, ['id'=>$rubrica->id])}}
                                        <a href="{{route('rubrica.detalle', $rubrica->id) }}" title="Editar rubrica" class="secondary-content"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{route('rubrica.respuesta', $rubrica->id) }}" title="Ver respuestas de la rubrica" class="secondary-content"><i class="fas fa-chart-pie"></i></a>
                                        <a href="{{route('rubrica.responder', $rubrica->id) }}" title="Responder rúbrica" class=""><i class="fab fa-wpforms"></i></a>    
                                    </div>
                                    @if($rubrica->respondidoc == false)
                                        <span style="color:black">No respondido</span>
                                    @else
                                        <span style="color:black">Respondido</span>
                                    @endif
                                </li>                                   
                            @elseif(auth()->user()->id == $rubrica->cliente_id && $rubrica->respondidoc == false)
                                <li class="list-group-item listaAsesSolic">
                                    <a href="{{route('rubrica.responder', $rubrica->id) }}" title="Responder rubrica" class="secondary-content">{{$rubrica->titulo}}</a>  
                                </li>
                            @endif
                        @empty
                        <div class="list-group-item contentAlv1">
                            <p class="flow-text center-align">No hay rúbricas creadas</p>
                        </div>
                        @endforelse  
                    </ul> 
                </div>        
            </div>
        </ul>
    </div>
@endsection