@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <ul class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    <h2 class="Titulo" style="float:right;">Reportes</h2>
                    {{-- <a href="{{route('cuestionario.nuevo') }}">Crear</a> --}}
                </div>
            </div>
            {{-- @if(auth()->user()->tipo_usu == "asesor")
                <div class="row">
                    <div class="col-md-12 list-group-item" style="background:black; color: darkgray">
                        <small style="font-style: italic; float:right">Para crear un nuevo cuestionario o rúbrica, debe hacerlo desde una asesoría activa   <a href="{{route('asesescritorio')}}" class="btn btn-dark" >Ir a asesorías</a></small>                            
                    </div>
                </div>
            @endif --}}
            <div class="row" style="min-height: 70vh">
                <div class="col-md-12 list-group-item contentAlv">
                    <h2>Lista de Asesorías y sus reportes</h2>
                    <div id="accordion">
                        @forelse(\App\Asesoria::all() as $index => $ase)
                            @if((Auth::user()->tipo_usu == "asesor") && ($ase->user_id == Auth::user()->id))
                                <div class="card">
                                    <div class="card-header" id="heading{{$index}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-light" data-toggle="collapse" data-target="#collapse{{$index}}" aria-expanded="true" aria-controls="collapse{{$index}}">
                                                Reportes disponibles para {{$ase->titulo}}
                                        </button>
                                        <a class="btn btn-dark" style="float:right" href="{{route('moduloasesoria.show',['id'=> $ase->id])}}">Ver asesoría</a>
                                    </h5>
                                    </div>
                                
                                    <div id="collapse{{$index}}" class="collapse" aria-labelledby="heading{{$index}}" data-parent="#accordion">
                                    <div class="card-body">
                                            <div class="row">
                                                    <div class="col-md-6 list-group-item" style="color:black">
                                                        <h2>Cuestionarios:</h2>
                                                        <ul class="list-group">
                                                            @forelse (\App\Cuestionario::all() as $cuestionario)
                                                                @if(auth()->user()->id == $cuestionario->user_id && $cuestionario->respondido == true && $cuestionario->id_asesoria == $ase->id)
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
                                                    <div class="col-md-6 list-group-item" style="color:black">
                                                        <h2>Rúbricas:</h2>
                                                        <ul class="list-group">
                                                            @forelse (\App\Rubrica::all() as $rubrica)
                                                                @if(auth()->user()->id == $rubrica->user_id && $rubrica->respondidoc == true && $rubrica->id_asesoria == $ase->id)
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
                                </div>
                            @endif
                        {{-- @if((Auth::user()->tipo_usu == "asesor") && ($ase->user_id == Auth::user()->id))
                        @endif --}}
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            {{--  --}}
        </ul>
    </div>
@endsection