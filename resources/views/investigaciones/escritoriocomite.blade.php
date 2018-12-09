@extends('layouts.menucomite')
@section('content')
<div class="col-md-9 solicitudInv">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->sexo == "Femenino")
                <h1>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @else
                 <h1>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</h1>
            @endif
        </div>
    </div>
</div>
@endsection