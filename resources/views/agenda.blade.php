@extends('layouts.plantillaAgenda')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Full Calendar Example</div>
        <div class="panel-body">
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>
@endsection