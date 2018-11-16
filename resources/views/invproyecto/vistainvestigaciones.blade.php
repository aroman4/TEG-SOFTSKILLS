@extends('layouts.menuinv')
@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        <div class="col-md-3">
                            <p class="text-center">Seguimiento de Investigaciones</p>
                        </div>
                        <div class="card-header">
                            <div class="col-md-3">
                                <p class="text-center">Mis Investigaciones Creadas</p>
                                <a href="{{route('proyectogrupal')}}" class="btn btn-success">Revisar</a></h3>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="col-md-3">
                                <p class="text-center">Investigaciones a la que me postule</p>
                                <br><br>
                                <a href="{{route('proyectogrupalpost')}}" class="btn btn-success">Investigacion-postule</a></h3>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>

@endsection