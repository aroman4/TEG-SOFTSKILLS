@extends('layouts.menuinv')

@section('content')

<div class="col-md-9" style="margin: 0px auto; ">
    <div class="col-md-12 text-right" style="color:#FFF:black;">
        @if(Auth::user()->sexo == "Femenino")
            <h1>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
        @else
            <h1>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->sexo == "Femenino")
                <h1>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @else
                <h1>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" style="">
                <ul>
                        <li class="text-center">
                            @if(auth()->user()->imagen != null)
                                <img class="userImg" src="{{asset('imagenperfil/'.auth()->user()->imagen)}}">
                            @else
                                <img class="userImg" src="{{asset('imagenperfil/avatarplaceholder.png')}}">
                            @endif
                        </li>
                    </ul>
        </div>
        <div class="col-md-6">
                <p>hola2</p>
        </div>
    </div>
</div>
@endsection
