@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    <a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-danger">Eliminar Solicitud</a>
                    {{-- <a href="{{route('solicitud.edit', $solicitud->id)}}" class="btn btn-secondary">Editar Solicitud</a> --}}
                    <h2 style="float:right">Detalle de Solicitud</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 list-group-item">
                    <p><b>Creada el</b> {{$solicitud->created_at}}</p>
                    <p><b>Estatus: </b>{{$solicitud->estado}}</p>
                    <p><b>Asunto:</b> <span>{{$solicitud->titulo}}</span></p>
                    @if($solicitud->tipo == "normal")
                        <p><b>Cliente:</b> <span>{{\App\User::find($solicitud->user_id)->nombre}} {{\App\User::find($solicitud->user_id)->apellido}}</span></p>
                    @elseif($solicitud->tipo == "presolicitud")
                        <p><b>Cliente:</b> {{$solicitud->nombre}} {{$solicitud->apellido}}</p>
                    @endif
                    <br>
                                      
                    <p><b>Descripción:</b></p>
                    <p style="border: 1px solid black;">{!! nl2br($solicitud->mensaje) !!}</p>
                    @if($solicitud->archivo != null)
                        <a class="btn btn-secondary" href="{{asset('archivoproyecto/'.$solicitud->archivo)}}">Descargar archivo adjunto</a>
                    @endif
                    <br>
                    <p><b>Contacto:</b></p>
                    @if($solicitud->tipo == "normal")
                        <p><b>Email:</b> {{\App\User::find($solicitud->user_id)->email}}</p>
                    @elseif($solicitud->tipo == "presolicitud")
                        {{-- <p><b>Nombre:</b> {{$solicitud->nombre}}</p> --}}
                        <p><b>Email:</b> {{$solicitud->email}}</p>
                        <p><b>Otros:</b> {{$solicitud->otros}}</p>
                    @endif
                    <br><br>
                    @if(Auth::user()->tipo_usu == "asesor" && $solicitud->estado == "pendiente")
                        <a href="{{action('AsesoriaController@AceptarAsesoria',['id'=> $solicitud->id])}}" class="btn btn-success">Aceptar Solicitud</a>
                        <a href="{{action('AsesoriaController@RechazarSolicitud',['id'=> $solicitud->id])}}" class="btn btn-danger">Rechazar Solicitud</a>
                    @endif
                </div>                
            </div>
        </div>
    </div>
@endsection