
@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
        <div class="row">
            <div class="col-md-12 list-group-item text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h2 style="float:right"><span style="color:darkgray">Crear/Editar rúbrica:</span> {{$rubrica->titulo}}</h2>
            </div>     
        </div>
        <div class="row">
            <div class="col-md-12 list-group-item">   
                <h4>Ingrese los datos de la rúbrica y presione guardar</h4>
                <form method="POST" action="{{route('rubrica.formar',$rubrica->id)}}" id="crearR" class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <table class="table table-bordered">
                        <thead>
                            {{-- Llenando fila de arriba --}}
                            <tr>
                                <th scope="col"></th>
                                @for($j=0; $j < $rubrica->columnas; $j++)
                                    <th scope="col">                                        
                                        <textarea name="{{"evaluacion".$j}}" id="{{"evaluacion".$j}}" class="form-control" placeholder="{{"Valoración ".($j+1)}}">{!!$rubrica->{'evaluacion'.$j}!!}</textarea>
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        {{-- resto de la tabla --}}                    
                        <tbody>
                            @for($i=0; $i < $rubrica->filas; $i++)
                                <tr>
                                    <th scope="row">{{-- indicador/criterio --}}
                                        <textarea name="{{"criterio".$i}}" id="{{"criterio".$i}}" class="form-control" placeholder="{{"Indicador/criterio ".$i}}">{!! $rubrica->{"criterio".$i} !!}  </textarea>
                                    </th>
                                    @for($j=0; $j < $rubrica->columnas; $j++)
                                        <td> {{-- celdas internas --}}
                                            <textarea name="{{"celda".$i.$j}}" id="{{"celda".$i.$j}}" class="form-control" placeholder="{{"Descripción "}}">{!! $rubrica->{"celda".$i.$j} !!}</textarea>                                                                        
                                        </td>
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>

                    </table>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection