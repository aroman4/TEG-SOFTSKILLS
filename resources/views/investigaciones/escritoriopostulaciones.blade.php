@extends('layouts.plantilla')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                @if(Auth::user()->sexo == "Femenino")
                    <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                @else
                    <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <p><b>Postulaciones Creadas (Pendientes por Aprobación):</b></p>
                    @if(count(\App\Postulacion::all())>0)
                        @foreach(\App\Postulacion::all() as $sol)
                            @if(($post->id_invest == Auth::user()->id) && ($post->estado=="pendiente"))
                                <div class="postulacion">
                                    <h3><a href="{{route('modulopostulacion.showPost',['id'=> $post->id])}}">{{Investigacion::find($post->id_post)->titulo}}</a></h3><!--duda-->
                                </div>
                             @endif
                        @endforeach
                    @else
                        <p><b>No hay Postulacion creadas Pendientes por aprobar</b></p>
                    @endif
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <p><b>Postulaciones Aceptadas - Activas:</b></p>
                    @if(count(\App\Postulacion::all())>0)
                        @foreach(\App\Postulacion::all() as $inv)
                            @if(($post->id_invest == Auth::user()->id) && ($post->estado == "activa"))
                                <div class="postulacion">
                                    <h3><a href="{{route('modulopostulacion.showPost',['id'=> $post->id])}}">{{Investigacion::find($post->id_post)->titulo}}</a></h3>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay postulaciones activas</b></p>
                     @endif
            </div>
        </div>
    </div>
</div>
@endsection