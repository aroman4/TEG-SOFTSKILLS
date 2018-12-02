@extends('layouts.plantilla')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->sexo == "Femenino")
                        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                    @else
                        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                    @endif                                       

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
