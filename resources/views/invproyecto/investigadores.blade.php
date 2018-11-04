@extends('layouts.plantilla')

@section('content')
<div class="row text-center">
    <div class="container">
                <br><br>  
        <h2 style='margin-right:20px'>Investigaciones con sus investigadores</h2>
        <br>
        <div class="text-center">
            <b>Investigadores:</b>
        </div>  
        <hr>
        @forelse(\App\Investigacion::all() as $inv)
            @if($inv->user_id == Auth::user()->id)
           <strong> <span>{{$inv->titulo}}</span></strong>
            <hr>
            <div class="row"> 
                    <div class="col-md-3">
                        <b>Nombre</b>
                    </div>
                    <div class="col-md-3">
                        <b>Apellido</b>
                    </div>
                    <div class="col-md-3">
                        <b>Ver Contenido</b>
                    </div>
                </div>
                @forelse(\App\Postulacion::all() as $postulacion)
                    @if($postulacion->id_post == $inv->id)
                        
                        <div class="row">
                            <div class="col-md-3">
                                <span>{{\App\User::find($postulacion->id_invest)->nombre}}</span>
                            </div>
                            <div class="col-md-3">
                                <span>{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-primary">Ver Más</a></h3>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach 
            @endif
        @endforeach
</div>
      
    <div class="col-md-3"> 
            <br>
        <a href="#" class="btn btn-warning" style='width:200px; height:200px'><i class="fa fa-check" style='width:200px; height:200px'></i></a>
            <br><br>
        <a href="#" class="btn btn-success" style='width:200px; height:200px'><i class="fa fa-check" style='width:200px; height:200px'></i></a>
    </div>
</div>
@endsection