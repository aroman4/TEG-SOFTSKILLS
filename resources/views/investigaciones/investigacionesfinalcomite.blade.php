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
                <h3>Solicitudes (Pendientes por aprobación de Finalización de la Investigación):</h3>
                <hr>
                    @if(count(\App\Investigacion::all())>0)
                        @foreach(\App\Investigacion::all() as $inv)
                            @if($inv->estado_com=="enviado")
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>{{$inv->titulo}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('moduloinvestigacion.show',['id'=> $inv->id])}}" class="btn btn-primary boton" style="border-radius: 5px;">Ver</a>                                           
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay Investigación pendientes por aprobación de Finalización</b></p>
                    @endif       
            </div>
        </div>
    </div> 
</div>
</div>

@endsection