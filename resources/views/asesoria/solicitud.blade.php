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
                    <h2>Cliente: <span>{{\App\User::find($solicitud->user_id)->nombre}} {{\App\User::find($solicitud->user_id)->apellido}}</span></h2>
                    <h2>Asunto:</h2>
                    <h4>{{$solicitud->titulo}}</h4>
                    <p>Creada el {{$solicitud->created_at}}</p>
                    <h2>Descripción:</h2>
                    <h4>{{$solicitud->mensaje}}</h4>
                    @if($solicitud->archivo != null)
                        <a class="btn btn-secondary" href="{{asset('archivoproyecto/'.$solicitud->archivo)}}">Descargar archivo adjunto</a>
                    @endif
                    <br><br>
                    @if(Auth::user()->tipo_usu == "asesor" && $solicitud->estado == "pendiente")
                        <a href="{{action('AsesoriaController@AceptarAsesoria',['id'=> $solicitud->id])}}" class="btn btn-success">Aceptar Solicitud</a>
                    @endif
                </div>                
            </div>
        </div>
    </div>
@endsection