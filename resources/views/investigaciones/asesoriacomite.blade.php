@extends('layouts.menucomite')
@section('content')
<div class="col-md-9 solicitudInv">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            <h1 style="float:left">Solicitudes de Asesor </h1>
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
                <h3>Solicitudes</h3>
                @forelse(DB::table('solicitud')->where('tipo','asesor')->get(); as $sol)
                    @if($sol->estado == "pendiente")
                        <div class="investigaciones">
                            <h3><a href="{{route('solasedetalle',['id'=> $sol->id])}}">{{$sol->nombre.' '.$sol->apellido}}</a><small style="float:right"><b>Estatus: </b>{{$sol->estado}}<b> Fecha: </b>{{$sol->created_at}}</small></h3>
                        </div>
                    @endif
                @empty
                    <p><b>No hay solicitudes</b></p>        
                @endforelse                    
            </div>
        </div>
    </div>
</div>
</div>

@endsection