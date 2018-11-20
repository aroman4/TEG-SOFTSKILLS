@extends('layouts.plantillaQ')

@section('content')
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
        <div class="col-md-9 listaQuest">
            <div class="card" style="border: none">
                <div class="card-header text-center top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    <h3 style="float:right">{{ __('Crear evento') }}</h3>
                </div>

                    <div class="card-body">
                        <form method="POST" action="{{action('EventController@crear')}}" class="form-group">
                            
                                <input type="hidden" name="id_asesoria" value="{{ $idase }}">
                             @csrf
                                <div class="form-group row">    
                                    <label for="title">Descripción:</label>
                                    <input name="title" id="title" type="text" class="form-control">                     
                                    <label for="start_date">Fecha inicio:</label>
                                    <input name="start_date" id="start_date" type="date" class="form-control">
                                    <label for="end_date">Fecha fin:</label>
                                    <input name="end_date" id="end_date" type="date" class="form-control">
                                </div>                          
                            </div>                    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Crear evento</button>
                                </div>
                            </div>
                        {!!Form::close()!!}              
                    </div>
                </div>
            </div>
        </div>
@endsection