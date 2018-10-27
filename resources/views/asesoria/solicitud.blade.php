@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-10 listaQuest">
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
                <div class="col-md-12 list-group-item contentAlv">
                    <h2 style="color: darkgray">Asunto:</h2>
                    <h1>{{$solicitud->titulo}}</h1>
                    <p style="color: darkgray">Creada el {{$solicitud->created_at}}</p>
                    <h2 style="color: darkgray">Descripción:</h2>
                    <h4>{{$solicitud->mensaje}}</h4>
                    <br><br>
                    @if(Auth::user()->tipo_usu == "asesor")
                        <a href="{{action('AsesoriaController@AceptarAsesoria',['id'=> $solicitud->id])}}" class="btn btn-success">Aceptar Solicitud</a>
                    @endif
                </div>                
            </div>
        </div>
    </div>
@endsection