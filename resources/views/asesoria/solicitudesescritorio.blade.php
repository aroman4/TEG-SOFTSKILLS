@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-4">
        <h2>Asesorías Activas:</h2>
        <ul class="list-group">
            
                <p>Solicitudes creadas (pendientes por aprobación):</p>
                @forelse(\App\Solicitud::all() as $sol)
                    @if(\App\User::find($sol->user_id)->tipo_usu == "cliente"  && ($sol->estado=="pendiente"))
                        <div>
                            <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                        </div>
                    @endif
                @empty
                    <p>No hay solicitudes pendientes</p>                
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
@endsection