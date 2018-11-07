@extends('layouts.menuinv')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card-body">

                <div class="col-md-3">
                    <p class="text-center">Resultados y Encuestas</p>
                </div>
                <div class="col-md-3">
                    <a href="{{route('encuesta')}}" class="btn btn-success">Encuesta Inicial</a></h3>
                </div>
                <div class="col-md-3">
                    <br><br>
                    <a href="{{route('encuestados')}}" class="btn btn-success">Encuenta Final</a></h3>
                </div>
                <div class="col-md-3">
                        <br><br>
                        <a href="#" class="btn btn-success">Resultados</a></h3>
                    </div>
            </div>
    </div>
</div>

@endsection