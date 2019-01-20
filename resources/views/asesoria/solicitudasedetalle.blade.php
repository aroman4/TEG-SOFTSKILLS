@include('header')
@extends('layouts.plantillaQpublic')

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    <a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-danger">Eliminar Solicitud</a>
                    <h2 style="float:right">Detalle de Solicitud de Asesor</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 list-group-item">
                    <p>Creada el {{$solicitud->created_at}}</p>
                    <p><b>Por:</b> {{$solicitud->nombre}} {{$solicitud->apellido}}</p>
                                      
                    <p><b>Descripción:</b></p>
                    <p style="border: 1px solid black;">{!! nl2br($solicitud->mensaje) !!}</p>
                    @if($solicitud->archivo != null)
                        <a class="btn btn-secondary" href="{{asset('archivoproyecto/'.$solicitud->archivo)}}">Descargar archivo adjunto</a>
                    @endif
                    <br><br>
                    <p><b>Contacto:</b></p>
                    
                    <p><b>Email:</b> {{$solicitud->email}}</p>
                    <p><b>Otros:</b> {{$solicitud->otros}}</p>
                   
                    <br><br>
                    {{-- @if((Auth::user()->tipo_inv == "comite" && !auth()->user()->votoejercido) && $solicitud->estado == "pendiente") --}}
                    @if(Auth::user()->tipo_inv == "comite" && $solicitud->estado == "pendiente" && ((DB::table('voto')->where('user_id',auth()->user()->id)->where('id_sol',$solicitud->id)->count() == 0)))
                        <a href="{{action('AsesoriaController@AceptarSolicitudAse',['id'=> $solicitud->id])}}" class="btn btn-success">Aceptar Solicitud</a>
                        <a href="{{action('AsesoriaController@RechazarSolicitudAse',['id'=> $solicitud->id])}}" class="btn btn-danger">Rechazar Solicitud</a>
                    @else
                        Usted ya ha votado.
                    @endif
                </div>                
            </div>
        </div>
    </div>
@endsection