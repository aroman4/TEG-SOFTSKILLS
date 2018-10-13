@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="row">
        <div class="col-md-4">
            @if(Auth::user()->tipo_usu == "asesor")
                <a href="{{route('escritorioasesor')}}" class="btn btn-secondary">Regresar</a>
            @elseif(Auth::user()->tipo_usu == "cliente")
                <a href="{{route('escritoriocliente')}}" class="btn btn-secondary">Regresar</a>    
            @endif
        </div>
        <div class="col-md-4">
            <h2 class="text-center">{{$asesoria->titulo}}</h2>
        </div>
        <div class="col-md-4">
            <div style="float:right">
            @if(Auth::user()->tipo_usu == "asesor")                
                <a href="{{route('moduloasesoria.edit', $asesoria->id)}}" class="btn btn-warning">Editar</a>
                <a href="{{route('moduloasesoria.destroy', $asesoria->id)}}" class="btn btn-danger">Eliminar</a>
            @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Cliente: <span>{{\App\User::find($asesoria->id_cliente)->nombre}} {{\App\User::find($asesoria->id_cliente)->apellido}}</span></p>
            <p>Descripción: {{$asesoria->mensaje}}</p>        
            <div class="text-center">  
                <h1>Cuestionarios</h1>      
                <a href="{{route('cuestionario.nuevoq',$asesoria->id)}}" class="btn btn-primary">Crear</a>
                <div class="list-group">
                    @forelse (\App\Cuestionario::all() as $cuestionario)
                        @if($cuestionario->id_asesoria == $asesoria->id)
                            <li class="list-group-item">
                            <div>
                                {{ link_to_route('cuestionario.detalle', $cuestionario->titulo, ['id'=>$cuestionario->id])}}
                                <a href="cuestionario/ver/{{ $cuestionario->id }}" title="Responder cuestionario" class="secondary-content"><i class="far fa-play-circle"></i></a>
                                <a href="cuestionario/{{ $cuestionario->id }}" title="Editar cuestionario" class="secondary-content"><i class="fas fa-pencil-alt"></i></a>
                                <a href="cuestionario/respuesta/{{ $cuestionario->id }}" title="Ver respuestas del cuestionario" class="secondary-content"><i class="fab fa-wpforms"></i></a>
                            </div>
                            </li>
                        @endif
                    @empty
                        <p class="flow-text center-align">No hay cuestionarios creados</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-right">
                <p>Estado de la asesoria: <span>{{$asesoria->estado}}</span></p>
                <p>Creada el {{$asesoria->created_at}}</p>
            </div>
            <a href="#" class="aseElem aseElemMsj">Mensajes</a>
            <a href="#" class="aseElem aseElemAg">Agenda</a>
            <a href="#" class="aseElem aseElemRep">Reportes</a>
        </div>
    </div>
</div>
@endsection