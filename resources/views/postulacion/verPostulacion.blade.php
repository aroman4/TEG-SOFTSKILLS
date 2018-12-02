@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Postulación </h1>
                <em> 
                    @if($postulacion->estado == 'aceptada')
                        <p style="color: #fff;">Estátus: Postulación {{$postulacion->estado}} </p>
                    @else
                        <p style="color: #fff;">Estatus: Postulación {{$postulacion->estado}} </p>
                    @endif
                </em>
            @elseif(Auth::user()->tipo_inv == "comite")
                <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item ">
                <div class="form-group row" style="float:right;"><br>
                    <p>Creada el {{$postulacion->created_at}}</p>
                </div>
                <p><b>Otras Investigaciones que ha Pertenecido: </b>{{$postulacion->otros_proyectos}}</p>
                <p><b>Aporte:  </b>{{$postulacion->aporte}}</p>
                <p><b>Actividad:  </b>{{$postulacion->actividad}}</p>
            @if($postulacion->estado_inv == 'inicio')
                <p style="color:seagreen;"><b>Estátus: Investigación Iniciada</b> </p>
            @else
                <p style="color:seagreen;"><b>Estátus: Investigación Finalizada</b> </p>
            @endif
            </div>
        </div>
    </div>
</div>

@endsection