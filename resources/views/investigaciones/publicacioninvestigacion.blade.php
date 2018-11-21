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
            {{-- <p>Hay {{ $pub->lastPage()}} Pagina</p> --}}
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
                                <p><b>Creado por el Investigador</b> 
                                    {{\App\User::find($inv->user_id)->nombre}}
                                </p>
                            </div>
                            <div class="form-group row">
                                <p><b>Actividad:</b> {{$inv->caracteristica}}</p>
                            </div>
                            <div class="col-12">
                                @if(auth()->user()->id == $inv->user_id)
                                    <p style="color:darkgreen;"><i>Es mi Investigación</i> </p>
                                 @else
                                    <hr style="color: #0056b2;" />
                                    <a href="{{route('solicpostulacion',$inv->id)}}" class="btn btn-primary">Postulación</a>      
                                @endif 
                                <button type="button" class="btn btn-outline-info">
                                    <a href="#" class="far fa-thumbs-up">Like</a>
                                </button>     
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




