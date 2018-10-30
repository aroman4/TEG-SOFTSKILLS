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
                    <a class="escritorioElem" id="imgCont" href="{{route('bancoclientes')}}"></a>
                    <h2 class="texElem">Banco de Clientes</h2>
                </div>
            </div>
        </div>
    </div>
@endsection