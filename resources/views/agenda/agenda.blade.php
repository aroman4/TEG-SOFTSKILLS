@extends('layouts.plantillaAgenda')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="card text-center">
        <div class="card-header"><a href="{{route('escritorioasesor')}}" class="btn btn-secondary" style="float:left;">Regresar</a> Agenda <a class="btn btn-primary" style="float:right;" href="{{route('crearevento')}}">Crear Evento</a></div>
        <div class="card-body">
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>
@endsection