@extends('layouts.plantilla')

@section('content')
<div class="row text-center">
<div class="col-md-4">
        <br>
        <br>

    <h2 style='margin-right:20px'>Investigadores:</h2>
    <br>
        <ul>
            @forelse(\App\Postulacion::all() as $postulacion)
                @if(Auth::user()->id != $postulacion->id_invest)
                    <span>Nombre y Apellido: {{\App\User::find($postulacion->id_invest)->nombre}}</span>
                    <span>{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                    <span>Correo:{{\App\User::find($postulacion->id_invest)->email}}</span>
                    <br>
                    <span>El estado es: </span>
                    <span>{{$postulacion->estado}}</span>
                    <hr>
                @endif
            @endforeach 
        </ul>
</div>
      
    <div class="col-md-3"> 
            <br>
            <br>

        <a href="#" class="btn btn-success" style='width:200px; height:200px'><i class="fa fa-check" style='width:200px; height:200px'></i></a>
    </div> 
    <div class="col-md-3">  
            <br>
            <br> 
        <a href="#" class="btn btn-success" style='width:200px; height:200px'><i class="fa fa-check" style='width:200px; height:200px'></i></a>
    </div> 
</div>
@endsection