@extends('layouts.menucomite')
@section('content')
<div class="col-md-9 solicitudInv">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            <h1 style="float:left">Solicitudes de Investigaciones </h1>
            <a href="{{route('escritoriocomite')}}" class="btn btn-primary boton">Regresar</a>
            @if(Auth::user()->sexo == "Femenino")
                <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
            @else
                 <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
            @endif
        </div>
    </div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3>Solicitudes (pendientes por aprobación):<h3>
                    @if(count(\App\Solicitud::all())>0)
                        @foreach(\App\Solicitud::all() as $sol)
                            @if(\App\User::find($sol->user_id)->tipo_usu == "investigador"  && ($sol->estado=="pendiente"))
                                <div>
                                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay solicitudes pendientes</b></p>
                    @endif       
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3>Investigaciones Activas:</h3>
                    @if(count(\App\Investigacion::all())>0)
                        @foreach(\App\Investigacion::all() as $inv)
                            @if($inv->estado=="activa")
                                <div class="investigaciones">
                                    <h3><a href="{{route('moduloinvestigacion.show',['id'=> $inv->id])}}">{{$inv->titulo}}</a></h3>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay investigaciones activas</b></p>
                    @endif
            </div>
        </div>
    </div>
    
</div>
</div>

@endsection