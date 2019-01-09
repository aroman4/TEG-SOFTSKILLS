@extends('layouts.menuinv')
{{-- <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
 --}}
@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
                <h1 style="float:left">Publicaciones de Investigaciones </h1>
                <div class="boton">
                {!! $pub->render()!!}</div>
                <em>Total de {{ $pub->lastPage()}} Página </em>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12 list-group-item ">            
          <div class="row justify-content-center">  
            @foreach ($pub as $inv)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row" style="float:right;"><br>
                                <p ><b>Fecha:</b> {{$inv->created_at}} </p>
                                @if(auth()->user()->id == $inv->user_id)
                                        <p style="color:darkgreen; margin:8px;"><b><i>  </i></b> </p><br>
                                    @if($inv->estado == 'activa')
                                        <a href="{{route('subirarchivofinal',$inv->id)}}" class="btn btn-success boton1"><i class="fa fa-upload" aria-hidden="true"></i> Subir Archivo</a>  
                                    @endif
                                @endif
                            </div>
                            <div class=" row">
                                <h4><i>Título:  {{($inv->titulo)}}</i></h4>
                            </div>
                            <div class=" row">
                                @if(\App\User::find($inv->user_id)->sexo == "Femenino")
                                    <p><b>Creado por la Investigadora: </b>{{\App\User::find($inv->user_id)->nombre ." ".\App\User::find($inv->user_id)->apellido}}</h1>
                                @else
                                    <p><b> Creado por la Investigador: </b>{{\App\User::find($inv->user_id)->nombre ." ".\App\User::find($inv->user_id)->apellido}}</h1>
                                @endif
                            </div>
                            <div class=" row">
                                <p><b>Objetivo General:</b> {{$inv->objetivos}}</p>
                            </div>
                            <div class=" row">
                                <p><b>Palabras Claves:</b> {{$inv->caracteristica}}</p>
                            </div>
                            <div class=" row">
                                <p><b>Resumen:</b> {{$inv->descripcion}}</p>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    @if($inv->estado == 'activa')
                                        <p><b>Estátus:</b>  Investigación Activa</p>
                                        <hr style="color: #0056b2; margin:8px;" />
                                        <a href="{{route('solicpostulacion',$inv->id)}}" class="btn btn-primary boton1">Postúlate</a>
                                        <div style="margin:20px;"></div>
                                    @else
                                        <p><b>Estátus:</b> Investigación Finalizada </p>
                                        <div style="margin:8px;"></div>
                                            @if($inv->archivofinal != NULL) 
                                                <a class="btn btn-primary boton1" href="proyecto/{{$inv->archivofinal}}" download="{{$inv->archivofinal}}"><i title="Descargar Archivo Final"class="fa fa-download"> Download </i></a>
                                            @endif
                                        <div style="margin:20px;"></div>
                                    @endif
                                    <div style="margin:6px;"></div>
                                    <div class="row" ><br>
                                            <a href="{{route('solicitud.show',['id'=> $inv->id])}}" title="Ver Solicitud" class="btn btn-primary boton" style="border-radius: 5px;"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a></td>
                                    </div>
                                    <div style="margin:20px;"></div>
                                    <div style="margin:20px;"></div>

                                    <div class="row" ><br>
                                        <a href="{{route('like',$inv->id)}}" class="far fa-thumbs-up">Like +{{$inv->cantidad}}</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            @endforeach    
        </div>
    </div> 
</div>   
</div>
@endsection




