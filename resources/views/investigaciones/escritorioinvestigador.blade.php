@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 solicitudInv">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            <a onclick="goBack()" class="btn btn-primary boton">Crear Solicitud</a>
            <h1 style="float:left">Solicitud </h1>
        </div>
    </div>

    <div class="row separador">
      
        <div class="col-md-4 solicitudInv">
                <div class="card solii">
                    <div class="card-body">
                            <ul class="list-group text-center"> 
                                    <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                                        <p style='margin-right:20px'><b>Creadas</b></p>
                                    </li>
                                </ul>
                            @if(count(\App\Solicitud::all())>0)
                                @foreach(\App\Solicitud::all() as $sol)
                                    @if($sol->user_id == Auth::user()->id)
                                    <li class="list-group-item ">

                                        <table class="row solii">
                                                <tr>
                                                    <td><strong>Título:</strong></td>
                                                    <td><strong>Visualizar</strong></td>
                                                </tr>
                                                <tr >
                                                    <td><p>{{$sol->titulo}}</p></td>
                                                    <td><a href="{{route('solicitud.show',['id'=> $sol->id])}}" title="Ver Solicitud" class="btn btn-primary boton" style="border-radius: 5px;">Ver</a></td>
                                                </tr>
                                        </table>
                                    </li>
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
                        <ul class="list-group text-center"> 
                                <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                                    <p style='margin-right:20px'><b>Pendientes por Aprobación</b></p>
                                </li>
                            </ul>
                        @if(count(\App\Solicitud::all())>0)
                            @foreach(\App\Solicitud::all() as $sol)
                                @if(($sol->user_id == Auth::user()->id) && ($sol->estado=="pendiente"))
                                <li class="list-group-item ">

                                <table class="row solii">
                                        <tr>
                                            <td><strong>Título:</strong></td>
                                            <td><strong>Visualizar</strong></td>
                                        </tr>
                                        <tr >
                                            <td><p>{{$sol->titulo}}</p></td>
                                            <td><a href="{{route('solicitud.show',['id'=> $sol->id])}}" title="Ver Solicitud" class="btn btn-primary boton" style="border-radius: 5px;">Ver</a></td>
                                        </tr>
                                </table>
                                </li>
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
                        <ul class="list-group text-center"> 
                                <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                                    <p style='margin-right:20px'><b>Investigaciones Activas</b></p>
                                </li>
                            </ul>
                        @if(count(\App\Investigacion::all())>0)
                            @foreach(\App\Investigacion::all() as $inv)
                                @if(($inv->user_id == Auth::user()->id) && ($inv->estado == "activa"))
                                <li class="list-group-item ">

                                <table class="row solii">
                                        <tr>
                                            <td><strong>Título:</strong></td>
                                            <td><strong>Visualizar</strong></td>
                                        </tr>
                                        <tr >
                                            <td><p>{{$inv->titulo}}</p></td>
                                            <td><a href="{{route('moduloinvestigacion.show',['id'=> $inv->id])}}" class="btn btn-primary boton" style="border-radius: 5px;">Ver</a></td>
                                        </tr>
                                </table>
                                </li>
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