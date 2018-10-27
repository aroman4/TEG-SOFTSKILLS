@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-10 escritorioA">
        {{-- <div class="row">
            <div class="col-md-6">
                <h2 class="escritorioH2 text-center">Asesorías Activas:</h2>
                <ul class="list-group">
                    @forelse(\App\Asesoria::all() as $ase)
                        @if(($ase->user_id == Auth::user()->id) && ($ase->estado == "activa"))
                            <div class="asesoria">
                                <li class="list-group-item"><a href="{{route('moduloasesoria.show',['id'=> $ase->id])}}">{{$ase->titulo}}</a></li>
                            </div>
                        @endif            
                    @empty
                        <p>No hay asesorías activas</p>
                        <a class="btn btn-warning">Ver solicitudes</a>
                        
                    @endforelse
                </ul>
            </div>
            <div class="col-md-6">                
                <h2 class="escritorioH2 text-center">Solicitudes creadas (pendientes por aprobación):</h2>
                <ul class="list-group">             
                    @forelse(\App\Solicitud::all() as $sol)
                        @if(\App\User::find($sol->user_id)->tipo_usu == "cliente"  && ($sol->estado=="pendiente"))
                            <div>
                                <li class="list-group-item"><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></li>
                            </div>
                        @endif
                    @empty
                        <p>No hay solicitudes pendientes</p>
                    @endforelse
                </ul>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgAse" href="#"></a>
                    <h2 class="texElem">Asesorías</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgSol" href="{{route('solicitud.index')}}"></a>
                    <h2 class="texElem">Solicitudes</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgRep" href="{{route('reportedetalle')}}"></a>
                    <h2 class="texElem">Reportes</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgInst" href="{{route('cuestionario.home')}}"></a>
                    <h2 class="texElem">Cuestionarios</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgCal" href="{{route('agenda')}}"></a>
                    <h2 class="texElem">Agenda/Calendario</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgCont" href="#"></a>
                    <h2 class="texElem">Banco de Clientes</h2>
                </div>
            </div>
        </div>
    </div>
@endsection