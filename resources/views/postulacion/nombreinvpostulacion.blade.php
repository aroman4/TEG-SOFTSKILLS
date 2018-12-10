@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
                <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Lista de Postulado </h1>
        </div>
        <div class="col-md-12 list-group-item ">            
            <div class="row">
                <div class="col-md-3">
                    <h3 style="color:black;">Nombre del Investigador</h3>
                </div>
                <div class="col-md-2">
                    <h3 style="color:black;">Curriculum</h3>
                </div>
                <div class="col-md-3">
                    <h3 style="color:black;">Ver Postulación</h3>
                </div>
                <div class="col-md-4">
                    <h3></h3>
                </div>
            </div>
        </div>
    
    <br>
    @forelse(\App\Investigacion::all() as $inv)
        <div class="col-md-12 list-group-item ">            
            @if($inv->user_id == Auth::user()->id)
            <h5 style="color:black;"><b>{{$inv->titulo}}</b></h5><hr>
                @forelse(\App\Postulacion::all() as $postulacion)
                    @if($postulacion->id_post == $inv->id)
                        <div class="row">  
                            <div class="col-md-3">
                                @if(!$postulacion->deafuera)
                                    <span style="color:black;">{{\App\User::find($postulacion->id_invest)->nombre}}</span>
                                    <span style="color:black;">{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                                    <br>
                                    <span style="color:black;">{{\App\User::find($postulacion->id_invest)->email}}</span>
                                @else
                                    <span style="color:black;">{{$postulacion->nombre}}</span>
                                    <span style="color:black;">{{$postulacion->apellido}}</span>
                                    <br>
                                    <span style="color:black;">{{$postulacion->email}}</span>
                                @endif
                            </div>
                            <div class="col-md-2"> 
                                <button type="button" class="btn btn-primary boton1">
                                        <i class="fa fa-download">  Download </i>
{{--                                     @if($postulacion->archivo != null)                                         
 --}}                                        <a href="archivoproyecto/{{$postulacion->archivo}}" download="{{$postulacion->archivo}}"></a>
{{--                                     @endif
 --}}                                </button> 
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-secondary boton1">Revisar Postulación</a></h3>
                            </div>
                            <div class="col-md-4">
                                <a  href="{{route('crearactividad',['id'=> $postulacion->id])}}" class="btn btn-success boton1"><i class="fa fa-check"></i>Aceptar</a></h3>

                                <a href="{{action('PostulacionController@RechazarPostulacion',['id'=> $postulacion->id])}}" class="btn btn-danger boton1"><i class="fa fa-times" style="color:#FFFFFF; width:6; height:6"></i>Rechazar</a>
                            
                                <br> <span style="color:black;">El estado es: </span>
                                <span style="color:black;">{{$postulacion->estado}}</span>
                            </div>
                        </div>   
                    @endif
                @endforeach 
            @endif
        </div>            
    @endforeach 
    </div>
</div>
@endsection