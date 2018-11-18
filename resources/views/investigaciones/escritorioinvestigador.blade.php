@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 solicitudInv">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            <a style="float:right; margin-top:5px; border-radius: 5px;" href="{{route('solicinvestigacion')}}" class="btn btn-primary">Crear Solicitud</a>
            <h1 style="float:left">Solicitud </h1>
        </div>
    </div>

  <div class="row separador">
      
    <div class="col-md-3 solicitudInv">
            <div class="card">
                <div class="card-body">
                    <p class="text-center"><b>Creadas</b></p>
                        @if(count(\App\Solicitud::all())>0)
                            @foreach(\App\Solicitud::all() as $sol)
                                @if($sol->user_id == Auth::user()->id)
                                    <div class="row">
                                        <p><b>Título:</b> {{$sol->titulo}}</p>
                                        <a href="{{route('solicitud.show',['id'=> $sol->id])}}" class="btn btn-primary" style="border-radius: 5px;">Ver</a>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p>No hay Solicitudes Creadas</p>
                        @endif
                </div>
            </div>
    </div>
    <div class="col-md-3 solicitudInv">
            <div class="card">
            <div class="card-body">
                <p><b>Pendientes por Aprobación</b></p>
                    @if(count(\App\Solicitud::all())>0)
                        @foreach(\App\Solicitud::all() as $sol)
                            @if(($sol->user_id == Auth::user()->id) && ($sol->estado=="pendiente"))
                                <div class="solicitud">
                                    <p><b>Título:</b> {{$sol->titulo}}</p>
                                    <a href="{{route('solicitud.show',['id'=> $sol->id])}}" class="btn btn-primary" style="border-radius: 5px;">Ver</a>
                                </div>
                             @endif
                        @endforeach
                    @else
                        <p>No hay Solicitudes Pendientes</p>
                    @endif
            </div>
        </div>
    </div>
    <div class="col-md-3 content solicitudInv">
            <div class="card">
            <div class="card-body">
                <p><b>Investigaciones Activas</b></p>
                    @if(count(\App\Investigacion::all())>0)
                        @foreach(\App\Investigacion::all() as $inv)
                            @if(($inv->user_id == Auth::user()->id) && ($inv->estado == "activa"))
                                <div class="investigaciones">
                                    <p><b>Título:</b> {{$inv->titulo}}</p>
                                    <a href="{{route('moduloinvestigacion.show',['id'=> $inv->id])}}" class="btn btn-primary" style="border-radius: 5px;">Ver</a>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay asesorías activas</b></p>
                     @endif
            </div>
        </div>
    </div>
</div>
</div>



@endsection