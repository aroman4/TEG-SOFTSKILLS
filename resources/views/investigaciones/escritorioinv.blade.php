@extends('layouts.menuinv')

@section('content')

<div class="col-md-9" style="margin: 0px auto;">
    <div class="row">
        <div class="col-md-6">
            <p>hola2</p>
            {{--<div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if(Auth::user()->sexo == "Femenino")
                            <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                        @else
                            <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                        @endif
                    </div>
                </div>
            </div>--}}
       
        </div>
        <div class="col-md-6">

                <p>hola2</p>

        </div>
       
    </div>
</div>
        
@endsection