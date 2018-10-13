@extends('layouts.plantilla')

@section('content')
<div class="container">
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <div class="col-sm-12">
            <br>
            <h2 class="text-center">Investigaciones Realizadas por Todos Nuestros Investigadores</h2>    
            <br>
            <p>Hay {{ $pub->lastPage()}} Pagina</p>
        
        <div class="row justify-content-center">  
            @foreach ($pub as $inv)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <p><b>Titulo:</b>  {{($inv->titulo)}}</p>
                            </div>
                            <div class="form-group row">
                                <p><b>Creado por el Investigador</b> 
                                    {{\App\User::find($inv->user_id)->nombre}}</p>
                            </div>
                            <div class="form-group row">
                                <p><b>Fecha:</b> {{$inv->created_at}} </p>
                            </div>
                            <div class="form-group row">
                                <p><b>Actividad:</b> {{$inv->caracteristica}}</p>
                            </div>
                            <div class="col-12">
                                <hr style="color: #0056b2;" />
                                <a href="{{route('solicpostulacion')}}" class="btn btn-primary">Postulate</a>
                                <button type="button" class="btn btn-outline-info">
                                    <a href="#" class="far fa-thumbs-up">Like</a>
                               </button>

                                <div class="ec-stars-wrapper">   
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                                </div>       
                            </div> 
                        </div>
                    </div>
                </div>
            @endforeach    
        </div>
    </div>   
    {!! $pub->render()!!}
</div>
@endsection



