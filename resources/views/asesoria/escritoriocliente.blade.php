@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-10 escritorioA">
        <div class="row">
            <div class="col-md-12 text-right" style="color:white">
            @if(Auth::user()->sexo == "femenino")
                <h1>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @else
                <h1>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="text-center" style="position:absolute; width:100%; top:30%">
                    {{-- <a class="escritorioElem" id="imgPedir" href="#"></a>
                    <h2 class="texElem1">Solicitar Asesoría</h2> --}}
                    <h3 style="color:white">Realiza una solicitud de asesoría</h3>
                    <a class="btn btn-warning" href="{{route('solicasesoria')}}">Solicitar Asesoría</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgAse" href="{{route('asesescritorio')}}"></a>
                    <h2 class="texElem">Asesorías</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgSol" href="{{route('solicitud.index')}}"></a>
                    <h2 class="texElem">Solicitudes</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="elemEsc">
                    <a class="escritorioElem" id="imgRep" href="{{route('reportedetalle')}}"></a>
                    <h2 class="texElem">Reportes</h2>
                </div>
            </div>
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
        </div>
    </div>
    
    {{-- <div class="col-md-4 text-center">
        <a href="{{route('solicasesoria')}}" class="btn btn-primary">Crear Solicitud</a>
        <h2 class="escritorioH2 text-center">Asesorías Activas:</h2>
        <ul class="list-group">
            @forelse(\App\Asesoria::all() as $ase)
                @if(($ase->id_cliente == Auth::user()->id) && ($ase->estado == "activa"))
                    <div class="asesoria">
                        <li class="list-group-item"><a href="{{route('moduloasesoria.show',['id'=> $ase->id])}}">{{$ase->titulo}}</a></li>
                    </div>
                @endif            
            @empty
                <p>No hay asesorías activas</p>
            @endforelse
            <p>Solicitudes creadas (pendientes por aprobación):</p>
            @forelse(\App\Solicitud::all() as $sol)
                @if(($sol->user_id == Auth::user()->id) && ($sol->estado=="pendiente"))
                    <div class="solicitud">
                        <li class="list-group-item"><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></li>
                    </div>
                @endif
            @empty
                <p>No hay solicitudes pendientes</p>
            @endforelse
        
        </ul>
    </div>
    <div class="col-md-3">
        <div class="row"><a class="escritorioElem imgSol" href="{{route('solicitud.index')}}" class="ElementoEsc">Solicitudes</a></div>
        <div class="row"><a class="escritorioElem imgInst" href="{{route('cuestionario.home')}}" class="ElementoEsc">Instrumento cuestionario</a></div>
    </div>
    <div class="col-md-3">
        <div class="row"><a class="escritorioElem imgCal" href="{{route('solicitud.index')}}" class="ElementoEsc">Calendario</a></div>
        <div class="row"><a class="escritorioElem imgRep" href="{{route('cuestionario.home')}}" class="ElementoEsc">Reportes</a></div>
    </div>
    </div> --}}
@endsection