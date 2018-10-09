@extends('layouts.plantilla')

@section('content')

    <div class="row filaEscritorio">
    {{-- @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif --}}
    <div class="col-md-2 barraLateralEscritorio">
        <ul class="list-group">
            <li class="list-group-item">{{Auth::user()->nombre ." ". Auth::user()->apellido}}</li>
            <li class="list-group-item"><a href="#"></a>Escritorio</li>
            <li class="list-group-item"><a href="#"></a>Asesorías</li>
            <li class="list-group-item"><a href="#"></a>Solicitudes</li>
            <li class="list-group-item"><a href="#"></a>Reportes</li>
            <li class="list-group-item"><a href="#"></a>Instrumentos</li>
            <li class="list-group-item"><a href="#"></a>Calendario</li>
        </ul>
    </div>
    <div class="col-md-4">
        <h2>Asesorías Activas:</h2>
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
        <div class="row"><a href="{{route('solicitud.index')}}" class="ElementoEsc">Solicitudes</a></div>
        <div class="row"><a href="{{route('cuestionario.home')}}" class="ElementoEsc">Instrumento cuestionario</a></div>
    </div>
    <div class="col-md-3">
        <p>Otra cosa</p>
    </div>
    </div>
@endsection