@extends('layouts.plantillaQ')

@section('content')
    {{-- @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif --}}
    
    <div class="col-md-4">
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
                <p>Solicitudes creadas (pendientes por aprobación):</p>
                @if(count(\App\Solicitud::all())>0)
                    @foreach(\App\Solicitud::all() as $sol)
                        @if(\App\User::find($sol->user_id)->tipo_usu == "cliente"  && ($sol->estado=="pendiente"))
                            <div>
                                <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p>No hay solicitudes pendientes</p>
                @endif
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
    </div>
@endsection