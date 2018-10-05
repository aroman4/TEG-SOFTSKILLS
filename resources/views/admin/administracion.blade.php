@extends('layouts.plantilla')

@section('content')
<div class="container">
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida Administradora {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido Administrador {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <h1>Lista de usuarios:</h1>
    @forelse(\App\User::all() as $usu)
        <div class="row">    
            <div class="col-md-6">
                <span>Email:</span>    
                <span>{{$usu->email}}</span>
            </div>
            <div class="col-md-6">
                <span>Tipo de usuario: </span>
                <span>{{$usu->tipo_usu}}</span>
            </div>
        </div>
        @if($usu->tipo_usu == "investigador")
            <div class="row">
                <div class="col-md-6">
                    <span>Tipo de investigador: </span>
                    <span>{{$usu->tipo_inv}}</span>
                </div>
                <div class="col-md-6">
                    <span>Cambiar tipo de investigador: </span>
                    {!!Form::open(['action' => ['UsersController@update',$usu->id], 'method' => 'POST'])!!}
                    <select name="tipo_inv">
                        <option>normal</option>
                        <option>comite</option>
                    </select>
                    {{Form::hidden('_method','PUT')}}
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    {{Form::close()}}
                </div>
            </div>
        @endif
        <hr>
    @empty
        <p>No hay usuarios registrados</p>
    @endforelse
</div>
@endsection