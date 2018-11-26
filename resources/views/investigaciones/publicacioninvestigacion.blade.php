@extends('layouts.menuinv')
{{-- <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
 --}}
@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
                <h1 style="float:left">Publicaciones de Investigaciones </h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12 list-group-item ">            <br>
            <p>Total de {{ $pub->lastPage()}} Página </p>
          <div class="row justify-content-center">  
            @foreach ($pub as $inv)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row" style="float:right;">
                                <p ><b>Fecha:</b> {{$inv->created_at}} </p>
                            </div>
                            <div class="form-group row">
                                <h4><b>Titulo:</b>  {{($inv->titulo)}}</h4>
                            </div>
                            <div class="form-group row">
                                @if(\App\User::find($inv->user_id)->sexo == "Femenino")
                                    <p><b>Creado por la Investigadora: </b>{{\App\User::find($inv->user_id)->nombre}}</h1>
                                @else
                                    <p><b> Creado por la Investigador: </b>{{\App\User::find($inv->user_id)->nombre}}</h1>
                                @endif
                               {{--  <p><b>Creado por la Investigadora:</b>
                                    {{\App\User::find($inv->user_id)->nombre}}</p> --}}
                            </div>
                            <div class="form-group row">
                                <p><b>Actividad:</b> {{$inv->caracteristica}}</p>
                            </div>
                            <div class="form-group row">
                                <p><b>Descripción:</b> {{$inv->descripcion}}</p>
                            </div>
                            <div class="col-12">
                                <div class="row">

                                    @if($inv->estado == 'activa')
                                        <p style="color: #CC9900; margin:8px;"><b>Investigación Activa</b> </p>
                                    @else
                                        <p style="color: #990000; margin:8px;"><b>Investigación Finalizada</b> </p>
                                        <button type="button" class="btn btn-primary" >
                                                <i>  Download </i>
                                          @if($inv->archivofinal != null)                                         
                                          <a href="archivoproyecto/{{$inv->archivofinal}}" download="{{$inv->archivofinal}}"></a>
                                        @endif
                                         </button>
                                    @endif

                                    @if(auth()->user()->id == $inv->user_id)
                                        <p style="color:darkgreen; margin:8px;"><b><i>Es mi Investigación</i></b> </p>
                                        <div style="margin:8px;"></div>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="archivo" >
                                        </div>  
                                    @else
                                        <hr style="color: #0056b2; margin:8px;" />
                                        <a href="{{route('solicpostulacion',$inv->id)}}" class="btn btn-primary">Postulación</a>
                                        <div style="margin:8px;"></div>      
                                    @endif
                                    <div style="margin:8px;"></div>
                                        <button type="button" class="btn btn-outline-info">
                                            <a href="#" class="far fa-thumbs-up">Like</a>
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
    {!! $pub->render()!!}
</div>
@endsection




