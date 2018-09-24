@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
<<<<<<< HEAD
    <a href="{{route('solicasesoria')}}" class="btn btn-primary">Crear Solicitud</a>
=======
    <a href="{{route('solicitud.create')}}" class="btn btn-primary">Crear Solicitud</a>
>>>>>>> 3f91974e52dc6a93a08e0e6239929b0b9c1c50ec
    <p>Solicitudes creadas:</p>
    {{-- {{\App\Solicitud::all()}} --}}
    @if(count(\App\Solicitud::all())>1)
        @foreach(\App\Solicitud::all() as $sol)
            @if($sol->user_id == Auth::user()->id)
                <div class="card">
                    <h3>{{$sol->titulo}}</h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay solicitudes creadas</p>
    @endif
@endsection