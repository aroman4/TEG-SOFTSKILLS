@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
    <div class="row">
        <div class="col-md-12 list-group-item top-bar">
            <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
            @if(Auth::user()->tipo_usu == "asesor" && $asesoria->estado=="activa")                
                {{-- <a href="{{route('moduloasesoria.edit', $asesoria->id)}}" class="btn btn-warning">Editar</a> --}}
                <a href="{{route('eliminarasesoria', $asesoria->id)}}" class="btn btn-danger">Eliminar</a>
                <a href="{{route('finalizarasesoria', $asesoria->id)}}" class="btn btn-warning">Finalizar asesoría</a>
            @endif
            <h2 style="float:right"><span style="color:darkgray">Detalle de:</span> {{$asesoria->titulo}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 list-group-item contentAlv">
            @if(Auth::user()->tipo_usu == "asesor")
                <p>Cliente: <span>{{\App\User::find($asesoria->id_cliente)->nombre}} {{\App\User::find($asesoria->id_cliente)->apellido}}</span></p>
            @elseif(Auth::user()->tipo_usu == "cliente")
                <p>Asesor: <span>{{\App\User::find($asesoria->user_id)->nombre}} {{\App\User::find($asesoria->user_id)->apellido}}</span></p>
            @endif
            <p>Descripción: {{$asesoria->mensaje}}</p>        
            <div class="text-center">  
                <h1>Cuestionarios y Rúbricas</h1>      
                @if(Auth::user()->tipo_usu == "asesor" && $asesoria->estado=="activa")
                    <a href="{{route('cuestionario.nuevoq',$asesoria->id)}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Cuestionario</a>
                    <a href="{{route('rubrica.nuevo',$asesoria->id)}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Rúbrica</a>
                @endif
                <br><br>
                <div class="list-group">
                    {{-- Cuestionarios --}}
                    @forelse (\App\Cuestionario::all() as $cuestionario)
                        @if($cuestionario->id_asesoria == $asesoria->id)
                            <li class="list-group-item listaAsesSolic">
                            <div>
                                
                                @if(Auth::user()->tipo_usu == "asesor")
                                    <a href="{{route('cuestionario.detalle', $cuestionario->id)}}" style="float:left">{{$cuestionario->titulo}}</a>
                                    <a href="{{route('cuestionario.detalle', $cuestionario->id) }}" title="Editar cuestionario" ><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Ver respuestas del cuestionario"><i class="fas fa-chart-pie"></i></a>                                    
                                    @if($cuestionario->respondido == false)
                                        <span style="color:black">No respondido</span>
                                    @else
                                        <span style="color:black">Respondido</span>
                                    @endif
                                @elseif(Auth::user()->tipo_usu == "cliente" && $cuestionario->respondido == false)
                                    <a href="{{route('cuestionario.ver', $cuestionario->id) }}" title="Responder cuestionario" class="">{{$cuestionario->titulo}}</a>    
                                    <span style="color:black">Cuestionario</span>
                                @endif
                            </div>
                            
                            </li>
                        @endif
                    @empty
                        <p class="flow-text center-align">No hay cuestionarios creados</p>
                    @endforelse
                    {{-- Rúbricas --}}
                    @forelse (\App\Rubrica::all() as $rub)
                        @if($rub->id_asesoria == $asesoria->id)
                            <li class="list-group-item listaAsesSolic">
                            <div>
                                
                                @if(Auth::user()->tipo_usu == "asesor")
                                    <a href="{{route('rubrica.detalle', $rub->id)}}" style="float:left">{{$rub->titulo}}</a>
                                    <a href="{{route('rubrica.detalle', $rub->id) }}" title="Editar rúbrica"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{route('rubrica.respuesta', $rub->id) }}" title="Ver respuesta de rúbrica"><i class="fas fa-chart-pie"></i></a>                                    
                                    <a href="{{route('rubrica.responder', $rub->id) }}" title="Responder rúbrica"><i class="fab fa-wpforms"></i></a>
                                    @if($rub->respondidoc == false)
                                        <span style="color:black">No respondido</span>
                                    @else
                                        <span style="color:black">Respondido</span>
                                    @endif
                                @elseif(Auth::user()->tipo_usu == "cliente" && $rub->respondidoc == false)
                                    <a href="{{route('rubrica.responder', $rub->id) }}" title="Responder rúbrica" class="">{{$rub->titulo}}</a>    
                                    <span style="color:black">Rúbrica</span>
                                @endif
                            </div>
                            
                            </li>
                        @endif
                    @empty
                        <p class="flow-text center-align">No hay rúbricas creadas</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-6 list-group-item contentAlv1">
            <div class="text-right">
                <p>Estado de la asesoria: <span>{{$asesoria->estado}}</span></p>
                <p>Creada el {{$asesoria->created_at}}</p>
            </div>
            <div class="aseElemW">
                <a href="{{action('AsesoriaController@getChat',$asesoria)}}" class="aseElem aseElemMsj"><h2 class="texDet">Chat</h2></a>                
            </div>
            <div class="aseElemW">
                <a href="{{route('mostrarAgAs',$asesoria->id)}}" class="aseElem aseElemAg"><h2 class="texDet">Ver Eventos<br>de la Asesoría</h2></a>
            </div>
            <div class="aseElemW">
                <a href="{{route('reporteasesoria',$asesoria->id)}}" class="aseElem aseElemRep"><h2 class="texDet">Reportes</h2></a>                
            </div>
        </div>
    </div>
    </div>
</div>
@endsection