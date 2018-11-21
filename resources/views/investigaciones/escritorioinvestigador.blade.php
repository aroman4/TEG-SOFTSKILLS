@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 solicitudInv">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            <a href="{{route('solicinvestigacion')}}" class="btn btn-primary boton">Crear Solicitud</a>
            <h1 style="float:left">Solicitud </h1>
        </div>
    </div>

    <div class="row separador">
      
        <div class="col-md-4 solicitudInv">
                <div class="card solii">
                    <div class="card-body">
                        <h3 class="text-center"><b>Creadas</b></h3>
                            @if(count(\App\Solicitud::all())>0)
                                @foreach(\App\Solicitud::all() as $sol)
                                    @if($sol->user_id == Auth::user()->id)
                                        <table class="row solii">
                                                <tr>
                                                        <hr>
                                                    <td><strong>Título:</strong></td>
                                                    <td><strong>Visualizar</strong></td>
                                                </tr>
                                                <tr >
                                                    <td><p>{{$sol->titulo}}</p></td>
                                                    <td><a href="{{route('solicitud.show',['id'=> $sol->id])}}" class="btn btn-primary boton" style="border-radius: 5px;">Ver</a></td>
                                                </tr>
                                        </table>
                                    @endif
                                @endforeach
                            @else
                            <hr>
                                <p>No hay Solicitudes Creadas</p>
                            @endif
                    </div>
                </div>
        </div>
        <div class="col-md-4 solicitudInv">
                <div class="card solii">
                <div class="card-body">
                    <h3 class="text-center">Pendientes por Aprobación</h3>
                        @if(count(\App\Solicitud::all())>0)
                            @foreach(\App\Solicitud::all() as $sol)
                                @if(($sol->user_id == Auth::user()->id) && ($sol->estado=="pendiente"))
                                <table class="row solii">
                                        <tr>
                                                <hr>
                                            <td><strong>Título:</strong></td>
                                            <td><strong>Visualizar</strong></td>
                                        </tr>
                                        <tr >
                                            <td><p>{{$sol->titulo}}</p></td>
                                            <td><a href="{{route('solicitud.show',['id'=> $sol->id])}}" class="btn btn-primary" style="border-radius: 5px;">Ver</a></td>           
                                        </tr>
                                </table>
                                @endif
                            @endforeach
                        @else
                        <hr>
                            <p>No hay Solicitudes Pendientes</p>
                        @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 content solicitudInv">
                <div class="card solii">
                <div class="card-body">
                    <h3 class="text-center">Investigaciones Activas</h3>
                        @if(count(\App\Investigacion::all())>0)
                            @foreach(\App\Investigacion::all() as $inv)
                                @if(($inv->user_id == Auth::user()->id) && ($inv->estado == "activa"))
                                <table class="row solii">
                                        <tr>
                                                <hr>
                                            <td><strong>Título:</strong></td>
                                            <td><strong>Visualizar</strong></td>
                                        </tr>
                                        <tr >
                                            <td><p>{{$inv->titulo}}</p></td>
                                            <td><a href="{{route('moduloinvestigacion.show',['id'=> $inv->id])}}" class="btn btn-primary boton" style="border-radius: 5px;">Ver</a></td>
                                        </tr>
                                </table>
                                @endif
                            @endforeach
                        @else
                        <hr>
                            <p>No hay solicitud activas</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection