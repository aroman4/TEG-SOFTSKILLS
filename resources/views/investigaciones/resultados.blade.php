@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 solicitudInv">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            <h1 style="float:left">Resultados </h1>
        </div>
    </div>

    <div class="row separador">
        <div class="col-md-12 solicitudInv">
                <div class="card solii">
                    <div class="card-body">
                            <ul class="list-group text-center"> 
                                <li class="list-group-item listaAsesSolic" style="background: #2B3033; color:#FFFFFF">
                                    <h1 style="float:left">Mis Investigaciones Finalizadas</h1>
                                </li>
                            </ul>
                            @if(count(\App\Investigacion::all())>0)
                                @foreach(\App\Investigacion::all() as $inv)
                                    @if($inv->user_id == Auth::user()->id)
                                    <li class="list-group-item ">
                                        <div class="row solii">
                                                <div class="col-md-8">
                                                    <p><strong>Título:</strong><br>  {{$inv->titulo}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    @if($inv->archivofinal != NULL && $inv->estado=='finalizada') 
                                                        <p><strong>Archivo final de mi Investigación: </strong><br> 
                                                            <a class="btn btn-success boton1" href="proyecto/{{$inv->archivofinal}}" download="{{$inv->archivofinal}}"><i title="Descargar Archivo Final"class="fa fa-download"> Download </i></a>
                                                        </p>
                                                    @endif
                                                </div>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            @else
                                <p>No has Creado Ninguna Investigación</p>
                            @endif
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection