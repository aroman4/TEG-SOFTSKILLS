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
                                        <a href="{{route('subirarchivofinal',$inv->id)}}" class="btn btn-success boton1">Subir Archivo</a>  
                                    @endif
                            </div>
                            <div class=" row">
                                <h4><b>Título:</b>  {{($inv->titulo)}}</h4>
                            </div>
                            <div class=" row">
                                @if(\App\User::find($inv->user_id)->sexo == "Femenino")
                                    <p><b>Creado por la Investigadora: </b>{{\App\User::find($inv->user_id)->nombre}}</h1>
                                @else
                                    <p><b> Creado por la Investigador: </b>{{\App\User::find($inv->user_id)->nombre}}</h1>
                                @endif
                               
                            </div>
                            <div class=" row">
                                <p><b>Actividad:</b> {{$inv->caracteristica}}</p>
                            </div>
                            <div class=" row">
                                <p><b>Descripción:</b> {{$inv->descripcion}}</p>
                            </div>
                            <div class="col-12">
                                <div class="row">

                                    @if($inv->estado == 'activa')
                                        <p style="color: #CC9900; margin:8px; float:right;"><b>Investigación Activa</b> </p>
                                        <hr style="color: #0056b2; margin:8px;" />
                                        <a href="{{route('solicpostulacion',$inv->id)}}" class="btn btn-primary boton1">Postulación</a>
                                        <div style="margin:8px;"></div>
                                    @else
                                        <p style="color: #990000; margin:8px; float:right;"><b>Investigación Finalizada</b> </p>
                                        <button type="button" class="btn btn-primary boton1" >
                                                @if($inv->archivofinal != NULL) 
                                                     <a class="btn btn-primary boton1" href="proyecto/{{$inv->archivofinal}}" download="{{$inv->archivofinal}}"><i title="Descargar Archivo Final"class="fa fa-download"> Download </i></a>
                                                @endif
                                          
                                         {{-- </button> --}}
                                    @endif
                                {{--<p style="color:darkgreen; margin:8px;"><b><i>Es mi Investigación</i></b> </p>--}}                                        
                                    <div style="margin:8px;"></div>
                                        <button type="button" class="btn btn-outline-info boton1">
                                            <a href="{{route('like',$inv->id)}}" class="far fa-thumbs-up">Like +{{$inv->cantidad}}</a>
                                        </button>
                                    
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




