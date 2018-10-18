@extends('layouts.plantilla')

@section('content')
<div class="container">
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida Administradora {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido Administrador {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <h1 class="text-center">Lista de Postulado </h1>
    <br>
    <div class="row">   
        <div class="col-md-3">
            <h3>Nombre del Investigador</h3>
        </div>
        <div class="col-md-3">
            <h3>Curriculum</h3>
        </div>
        <div class="col-md-3">
            <h3>Ver Postulación</h3>
        </div>
        <div class="col-md-3">
            <h3></h3>
        </div>
    </div>
    <hr>
    @forelse(\App\Solicitud::all() as $solic)
        @if($solic->estado == 'pendiente')
        <div class="row">            
            <div class="col-md-3">
                
            </div>
            <div class="col-md-3">                
                <span>{{$solic->archivo}}</span>
            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">
                <a href="" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</a>
                <a href="" class="btn btn-danger" ><i class="fa fa-times"></i> Rechazar</a>
            </div>
        </div>
        <hr>
        @endif
    @empty
        <p>Postulación Aceptada</p>
    @endforelse
</div>
@endsection