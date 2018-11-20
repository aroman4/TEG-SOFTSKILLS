@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <ul class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>                    
                    <h2 class="Titulo" style="float:right;"> Mensajes</h2>                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 list-group-item" style="background:black; color: darkgray">
                    @if(auth()->user()->tipo_usu == "asesor")                
                        <small style="font-style: italic"><a href="{{route('bancoclientes')}}" class="btn btn-success" >Crear nuevo mensaje</a> Como Asesor selecciona un cliente en la próxima pantalla</small>                    
                    @else
                        <small style="font-style: italic"><a href="{{route('asesescritorio')}}" class="btn btn-success" >Crear nuevo mensaje</a> Como Cliente selecciona una asesoría y luego Enviar mensaje</small>
                    @endif
                </div>
            </div>
            <div class="row" style="min-height: 70vh">
                <div class="col-md-6 list-group-item contentAlv">
                    <h2>Recibidos:</h2>
                    <ul class="list-group">
                        @forelse ($recibidos as $mensaje)
                        <a href="{{route('vermensaje', $mensaje->id) }}" class="mensajeList">
                            @if($mensaje->estado == "leido")
                                <li class="list-group-item listaAsesSolic">                                   
                                    {{-- <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Ver respuestas del cuestionario" class="secondary-content"><i class="fas fa-chart-pie"></i></a> --}}
                                    <p>De: {{\App\User::find($mensaje->id_remitente)->nombre .' '.\App\User::find($mensaje->id_remitente)->apellido}}</p>
                                    <p>Asunto: {{$mensaje->asunto}}</p>
                                </li>  
                            @else
                                <li class="list-group-item list-group-item-info listaAsesSolic">                                   
                                    {{-- <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Ver respuestas del cuestionario" class="secondary-content"><i class="fas fa-chart-pie"></i></a> --}}
                                    <p><b>De: {{\App\User::find($mensaje->id_remitente)->nombre .' '.\App\User::find($mensaje->id_remitente)->apellido}}</b></p>
                                    <p><b>Asunto: {{$mensaje->asunto}}</b></p>
                                </li>                             
                            @endif
                        </a>
                        @empty
                        <div class="list-group-item contentAlv">
                            <p class="flow-text center-align">No hay mensajes recibidos</p>
                        </div>
                        @endforelse
                    </ul> 
                </div>
                <div class="col-md-6 list-group-item contentAlv1">
                    <h2>Enviados:</h2>
                    <ul class="list-group">
                        @forelse ($enviados as $mensaje)
                        <a href="{{route('vermensaje', $mensaje->id) }}" class="mensajeList">
                            <li class="list-group-item listaAsesSolic">                                
                                <p>Para: {{\App\User::find($mensaje->id_destinatario)->nombre .' '.\App\User::find($mensaje->id_destinatario)->apellido}}</p>
                                <p>Asunto: {{$mensaje->asunto}}</p>
                            </li>
                        </a>
                        @empty
                        <div class="list-group-item contentAlv">
                            <p class="flow-text center-align">No hay mensajes enviados</p>
                        </div>
                        @endforelse
                    </ul> 
                </div>        
            </div>
        </ul>
    </div>
@endsection