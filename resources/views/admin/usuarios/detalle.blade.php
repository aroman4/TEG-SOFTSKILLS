@extends('layouts.plantilla')

@section('content')
    <div class="col-md-12 listaQuest">
            <div class="row separador">
                <div class="col-md-12 list-group-item text-right top-bar" style="color:white;">
                        <button style="float:left" onclick="goBack()" class="btn btn-primary boton">Regresar</button>
                    <h1>(@if($usuario->tipo_inv == "comite")
                        Miembro Comité
                    @else
                        {{$usuario->tipo_usu}}
                    @endif) {{ $usuario->nombre . " " . $usuario->apellido }}</h1>
                </div>
            </div>
            <div class="row" style="height:70vh">
                <div class="col-md-6 list-group-item" style="overflow:auto">
                    <div class="text-center">
                        <br> 
                            @if($usuario->imagen != null)
                                <br><img style="border-radius: 80%; width: 380px;height: 350px;margin: 6px 0;" src="{{asset('imagenperfil/'.$usuario->imagen)}}">
                             @else
                             <br><img style="border-radius: 80%; width: 380px;height: 350px;margin: 6px 0;" src="{{asset('imagenperfil/avatarplaceholder.png')}}">
                            @endif
                    </div>
                </div>
                <div class="col-md-6 list-group-item" style="overflow:auto">
                    <div class="text-center">
                        <br>
                            <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                                <h2 style='margin-right:20px'>Perfil de usuario</h2>
                            </li>
                        </div>
                            <li class="list-group-item listaAsesSolic">
                                <p><b>Nombre:</b> {{$usuario->nombre}}</p>
                                <p><b>Apellido:</b> {{$usuario->apellido}}</p>
                                <p><b>Sexo:</b> {{$usuario->sexo}}</p>
                                <p><b>Edad:</b> {{$usuario->edad}}</p>
                                <p><b>Dirección:</b> {{$usuario->direccion}}</p>
                                <p><b>Correo:</b> {{$usuario->email}}</p>
                                <p><b>Profesión:</b> {{$usuario->profesion}}</p>
                            </li>
                            <div style="padding:8px;">                        
                                <a href="{{route('editarusu',$usuario->id)}}" class="btn btn-success boton1">Editar Pefil</a>
                                <a href="{{route('usuarios.borrar', $usuario->id)}}" class="btn btn-danger" ><i class="fas fa-user-times"></i> Eliminar</a>
        {{--                         <a href="#" class="btn btn-danger boton1">Agregar Datos al Perfil </a>
         --}}                    </div>
            </div>
        </div>
@endsection