@extends('layouts.menuinv')
@section('content')

<div class="col-md-9 solicitudInv">
    <div class="row separador">
        <div class="col-md-12 list-group-item text-right top-bar" style="color:white;">
            @if(Auth::user()->sexo == "Femenino")
                <h1>Investigadora: {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @else
                <h1>Investigador: {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @endif
        </div>
    </div>
    <div class="row" style="height:70vh">
        <div class="col-md-6 list-group-item" style="overflow:auto">
            <div class="text-center">
                <br> 
                    @if(auth()->user()->imagen != null)
                        <br><img style="border-radius: 80%; width: 380px;height: 350px;margin: 6px 0;" src="{{asset('imagenperfil/'.auth()->user()->imagen)}}">
                     @else
                     <br><img style="border-radius: 80%; width: 380px;height: 350px;margin: 6px 0;" src="{{asset('imagenperfil/avatarplaceholder.png')}}">
                    @endif
            </div>
        </div>
        <div class="col-md-6 list-group-item" style="overflow:auto">
            <div class="text-center">
                <br>
                    <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                        <h2 style='margin-right:20px'>Mi Perfil</h2>
                    </li>
                </div>
                    <li class="list-group-item listaAsesSolic">
                        <p><b>Nombre:</b> {{Auth::user()->nombre}}</p>
                        <p><b>Apellido:</b> {{Auth::user()->apellido}}</p>
                        <p><b>Sexo:</b> {{Auth::user()->sexo}}</p>
                        <p><b>Edad:</b> {{Auth::user()->edad}}</p>
                        <p><b>Dirección:</b> {{Auth::user()->direccion}}</p>
                        <p><b>Correo:</b> {{Auth::user()->email}}</p>
                        <p><b>Profesión:</b> {{Auth::user()->profesion}}</p>
                    </li>
                    <div style="padding:8px;">
                        <a href="{{route('solicinvestigacion')}}" class="btn btn-primary boton1">Crear Solicitud</a>
                        <a href="#" class="btn btn-success boton1">Editar Pefil</a>
                        <a href="#" class="btn btn-danger boton1">Agregar Datos al Perfil </a>
                    </div>
    </div>
</div>
@endsection
        