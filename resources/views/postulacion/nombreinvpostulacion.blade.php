@extends('layouts.menuinv')

@section('content')
    <br>
    
    <div  class="col-md-10"style="margin:0px auto;">
            <a style="float:right;" href="{{route('listapostulaciones')}}" class="btn btn-secondary">Regresar</a></h3>

        <h1 style="margin-top:3px;" class="text-center">Lista de Postulado </h1>
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
        <span>{{$inv->titulo}}</span>
            @forelse(\App\Postulacion::all() as $postulacion)
                @if($postulacion->id_post == $inv->id)
                    <div class="row">            
                        <div class="col-md-3">
                            <span>{{\App\User::find($postulacion->id_invest)->nombre}}</span>
                            <span>{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                            <br>
                            <span>{{\App\User::find($postulacion->id_invest)->email}}</span>
                        </div>
                        <div class="col-md-3">                
                            <a href="archivoproyecto/{{$postulacion->archivo}}" download="{{$postulacion->archivo}}">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-download">  Download </i>
                                </button>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-secondary">Revisar Postulación</a></h3>
                        </div>
                        <div class="col-md-3">
                            <a  href="{{route('crearactividad',['id'=> $postulacion->id_post])}}" class="btn btn-success"><i class="fa fa-check"></i>Aceptar</a></h3>

                            <a href="{{action('PostulacionController@RechazarPostulacion',['id'=> $postulacion->id])}}" class="btn btn-danger"><i class="fa fa-times" style="color:#FFFFFF; width:6; height:6"></i>Rechazar</a>
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