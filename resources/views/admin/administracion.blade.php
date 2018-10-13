@extends('layouts.plantilla')

@section('content')
<div class="container">
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida Administradora {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido Administrador {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <h1>Lista de usuarios: <a href="{{route('usuarios.export')}}" class="btn btn-secondary">Descargar Excel</a></h1>
    <div class="row">   
        <div class="col-md-3">
            <h3>Nombre de usuario</h3>
        </div>
        <div class="col-md-3">
            <h3>Email</h3>
        </div>
        <div class="col-md-3">
            <h3>Tipo de usuario </h3>
        </div>
        <div class="col-md-3">
            <h3>Acciones</h3>
        </div>
    </div>
    <hr>
    @forelse(\App\User::all() as $usu)
        @if($usu->tipo_usu != 'admin')
        <div class="row">            
            <div class="col-md-3">
                <span>{{$usu->nombre ." ". $usu->apellido ." @". $usu->nombre_usu}}</span>
            </div>
            <div class="col-md-3">                
                <span>{{$usu->email}}</span>
            </div>
            <div class="col-md-3">
                <span>{{$usu->tipo_usu}}</span>
            </div>
            <div class="col-md-3">
                <a href="{{route('usuarios.show', $usu->id)}}" class="btn btn-success"><i class="fas fa-user-tag"></i> Detalle</a>
                <a href="{{route('usuarios.borrar', $usu->id)}}" class="btn btn-danger" ><i class="fas fa-user-times"></i> Eliminar</a>
            </div>
        </div>
        @if($usu->tipo_usu == "investigador")
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <span>Tipo de investigador: </span>
                    <span>{{$usu->tipo_inv}}</span>
                </div>
                <div class="col-md-3">
                    <span>Cambiar tipo de investigador: </span>
                    {!!Form::open(['action' => ['UsersController@update',$usu->id], 'method' => 'POST'])!!}
                    <select name="tipo_inv">
                        <option>normal</option>
                        <option>comite</option>
                    </select>
                    {{Form::hidden('_method','PUT')}}
                    <button type="submit" class="btn btn-primary">Cambiar</button>
                    {{Form::close()}}
                </div>
            </div>
        @endif
        <hr>
        @endif
    @empty
        <p>No hay usuarios registrados</p>
    @endforelse
</div>
@endsection