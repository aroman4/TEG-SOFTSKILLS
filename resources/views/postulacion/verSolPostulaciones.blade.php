@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('listapostulaciones')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Postulación </h1>
            @elseif(Auth::user()->tipo_inv == "comite")
                <a href="{{route('listapostulaciones')}}" class="btn btn-primary boton">Regresar</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item ">
            <p><b>Otras Investigaciones que has Participado:  </b>{{$postulacion->otros_proyectos}}</p>
            <p><b>Aporte:  </b> {{$postulacion->aporte}}</p>
            <p><b>Actividades: </b> {{$postulacion->actividad}}
                {{-- Listar los objetivos especificos --}}</p>
                @if($postulacion->estado == 'aceptada')
                    <p style="color: #CC9900;"><b>Estátus: Investigación {{$postulacion->estado}}</b> </p>
                @else
                    <p style="color: #CC9900;"><b>Estátus: Investigación {{$postulacion->estado}}</b> </p>
                @endif            
                <p>Creada el {{$postulacion->created_at}}</p>
            <br><br>
        </div>
    </div>
</div>

@endsection