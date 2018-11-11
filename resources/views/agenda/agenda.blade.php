@extends('layouts.plantillaAgenda')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
        <div class="list-group-item top-bar">
            <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button> 
            <a class="btn btn-primary" href="{{route('crearevento')}}">Crear Evento</a> 
            <h3 style="float:right;">Agenda</h3>
        </div>
        <div class="list-group-item">
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>
@endsection