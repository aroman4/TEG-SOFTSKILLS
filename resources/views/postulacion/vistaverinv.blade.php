@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('listapostulaciones')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Investigación </h1>
            @elseif(Auth::user()->tipo_inv == "comite")
                <a href="{{route('listapostulaciones')}}" class="btn btn-primary boton">Regresar</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item ">
            <p><b>Título:  </b>{{$investigaciones->titulo}}</p>
            <p><b>Caracteristica:  </b>{{$investigaciones->caracteristica}}</p>
            <p><b>Actividades:  </b>{{$investigaciones->actividades}}</p>
            <small>Creada el {{$investigaciones->created_at}}</small>
            <br><br>
        </div>
    </div>
</div>

@endsection