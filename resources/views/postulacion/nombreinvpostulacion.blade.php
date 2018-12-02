@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
                <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Lista de Postulado </h1>
        </div>
    </div>
        <br><br>
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
    @forelse(\App\Investigacion::all() as $inv)
        @if($inv->user_id == Auth::user()->id)
        <h5><b>{{$inv->titulo}}</b></h5><hr>
            @forelse(\App\Postulacion::all() as $postulacion)
                @if($postulacion->id_post == $inv->id)
                    <div class="row">            
                        <div class="col-md-3">
                            @if(!$postulacion->deafuera)
                                <span>{{\App\User::find($postulacion->id_invest)->nombre}}</span>
                                <span>{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                                <br>
                                <span>{{\App\User::find($postulacion->id_invest)->email}}</span>
                            @else
                                <span>{{$postulacion->nombre}}</span>
                                <span>{{$postulacion->apellido}}</span>
                                <br>
                                <span>{{$postulacion->email}}</span>
                            @endif
                        </div>
                        <div class="col-md-3"> 
                            <button type="button" class="btn btn-primary boton1">
                                    <i class="fa fa-download">  Download </i>
                                 @if($postulacion->archivo != null)                                         
                                    <a href="archivoproyecto/{{$postulacion->archivo}}" download="{{$postulacion->archivo}}"></a>
                                 @endif
                            </button>
                             
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-secondary boton1">Revisar Postulación</a></h3>
                        </div>
                        <div class="col-md-3">
                            <a  href="{{route('crearactividad',['id'=> $postulacion->id])}}" class="btn btn-success boton1"><i class="fa fa-check"></i>Aceptar</a></h3>

                            <a href="{{action('PostulacionController@RechazarPostulacion',['id'=> $postulacion->id])}}" class="btn btn-danger boton1"><i class="fa fa-times" style="color:#FFFFFF; width:6; height:6"></i>Rechazar</a>
                          
                            <br> <span>El estado es: </span>
                            <span>{{$postulacion->estado}}</span>
                        </div>
                    </div>
                    <hr>
            
                @endif
            @endforeach 
        @endif
    @endforeach 
</div>
@endsection