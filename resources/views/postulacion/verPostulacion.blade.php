@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('nombreinvpostulacion')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Postulación </h1>
            @elseif(Auth::user()->tipo_inv == "comite")
                <a href="{{route('nombreinvpostulacion')}}" class="btn btn-primary boton">Regresar</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item ">
            <p><b>Otras Investigaciones que ha Pertenecido: </b>{{$postulacion->otros_proyectos}}</p>
            <p><b>Aporte:  </b>{{$postulacion->aporte}}</p>
            <p><b>Actividad:  </b>{{$postulacion->actividad}}</p>
            <small>Creada el {{$postulacion->created_at}}</small>
            <br><br>
        </div>
    </div>
</div>

@endsection