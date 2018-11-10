@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-10 listaQuest" style="background:white">
    <div class="list-group">
        <div class="row">
            <div class="col-md-12 list-group-item top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <a href="{{route('exportclientes')}}" class="btn btn-success">Descargar Excel</a>
                <h2 style="float:right">Banco de clientes</h2>
            </div>
        </div>
    </div>
    
    <div class="row">   
        <div class="col-md-3">
            <h3>Asesoria</h3>
        </div>
        <div class="col-md-3">
            <h3>Nombre cliente</h3>
        </div>
        <div class="col-md-3">
            <h3>Email</h3>
        </div>
        <div class="col-md-3">
            <h3>Acciones</h3>
        </div>
    </div>
    <hr>
    @forelse(\App\Asesoria::all() as $ase)   
        @if($ase->user_id == auth()->user()->id)
            <div class="row">
                <div class="col-md-3">
                    {{$ase->titulo}}
                </div>
                <div class="col-md-3">
                    <span>{{\App\User::find($ase->id_cliente)->nombre ." ". \App\User::find($ase->id_cliente)->apellido ." @". \App\User::find($ase->id_cliente)->nombre_usu}}</span>
                </div>
                <div class="col-md-3">                
                    <span>{{\App\User::find($ase->id_cliente)->email}}</span>
                </div>
                <div class="col-md-3">
                    <a href="{{route('moduloasesoria.show',['id'=> $ase->id])}}" class="btn btn-success"><i class="fas fa-handshake"></i> Ver Asesoría</a>
                    <a href="#" class="btn btn-primary" ><i class="fas fa-envelope"></i> Enviar Mensaje</a>
                </div>
            </div>
        @endif
        <hr>
    @empty
        <p>No hay usuarios registrados</p>
    @endforelse
</div>
@endsection