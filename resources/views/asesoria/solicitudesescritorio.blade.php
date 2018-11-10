@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 escritorioA">
        <div class="list-group">
        <div class="row">
            <div class="col-md-12 list-group-item text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h1 style="float:right">Solicitudes</h1>
            </div>
        </div>
        <div class="row" style="min-height: 70vh">
            <div class="col-md-6 list-group-item contentAlv">
                <h2>Solicitudes pendientes por aprobación:</h2>
                <ul class="list-group">
                    @forelse($solicitudespen as $sol)
                        @if(\App\User::find($sol->user_id)->tipo_usu == "cliente" && ($sol->estado=="pendiente"))
                            @if((auth()->user()->tipo_usu == "asesor") || ((auth()->user()->tipo_usu == "cliente") && (auth()->user()->id == $sol->user_id)))
                                <div>
                                    <li class="list-group-item listaAsesSolic">
                                        <a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a>
                                        <small>{{\App\User::find($sol->user_id)->nombre .' '. \App\User::find($sol->user_id)->apellido}}</small>
                                    </li>                                
                                </div>
                            @endif
                        @endif
                    @empty
                        <p>No hay solicitudes pendientes</p>                
                    @endforelse
                </ul>
                {{$solicitudespen->links()}}
            </div>
            <div class="col-md-6 list-group-item contentAlv1">
                <h2>Solicitudes aprobadas:</h2>
                <ul class="list-group">
                    @forelse($solicitudesace as $sol)
                        @if(\App\User::find($sol->user_id)->tipo_usu == "cliente"  && ($sol->estado=="aceptada"))
                            @if((auth()->user()->tipo_usu == "asesor") || ((auth()->user()->tipo_usu == "cliente") && (auth()->user()->id == $sol->user_id)))
                                <div>
                                    <li class="list-group-item listaAsesSolic">
                                        <a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a>
                                        <small>{{\App\User::find($sol->user_id)->nombre .' '. \App\User::find($sol->user_id)->apellido}}</small>
                                    </li>
                                </div>
                            @endif
                        @endif
                    @empty
                        <p>No hay solicitudes pendientes</p>                
                    @endforelse
                </ul>
                {{$solicitudesace->links()}}
            </div>
        </div>
        </div>
    </div>
@endsection