
@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
        <div class="row">
            <div class="col-md-12 list-group-item text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h2 style="float:right"><span style="color:darkgray">Responder rúbrica:</span> {{$rubrica->titulo}}</h2>
            </div>     
        </div>
        <div class="row">
            <div class="col-md-12 list-group-item">   
                <p><b>Creada el: </b>{{$rubrica->created_at}}</p>
                <p><b>Descripción: </b>{{$rubrica->descripcion}}</p>
                <h4>Seleccione una opción por cada fila y presione Responder</h4>
                <form method="POST" action="{{route('rubrica.guardarResp',$rubrica->id)}}" id="crearR" class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <table class="table table-bordered">
                        <thead>
                            {{-- Llenando fila de arriba --}}
                            <tr>
                                <th scope="col"></th>
                                @for($j=0; $j < $rubrica->columnas; $j++)
                                    <th scope="col">{!!$rubrica->{'evaluacion'.$j}!!}</th>
                                @endfor
                            </tr>
                        </thead>
                        {{-- resto de la tabla --}}                    
                        <tbody>
                            @for($i=0; $i < $rubrica->filas; $i++)
                                <tr>
                                    <th scope="row">{{-- indicador/criterio --}}
                                        {!! $rubrica->{"criterio".$i} !!}                                        
                                    </th>
                                    @for($j=0; $j < $rubrica->columnas; $j++)
                                        <td> {{-- celdas internas --}}
                                            {!! $rubrica->{"celda".$i.$j} !!}
                                            <input type="radio" name="{{'respuestaa'.$i}}" value="{{$j}}">
                                        </td>
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>

                    </table>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary">Responder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection