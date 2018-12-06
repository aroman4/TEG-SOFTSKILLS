
@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
        <div class="row">
            <div class="col-md-12 list-group-item text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h2 style="float:right"><span style="color:darkgray">Crear rúbrica a partir de predefinida:</span> {{$rubrica->titulo}}</h2>
            </div>     
        </div>
        <div class="row">
            <div class="col-md-12 list-group-item">   
                <h4>Ingrese los datos de la rúbrica y presione guardar</h4>
                <form method="POST" action="{{route('rubrica.formar',$rubrica->id)}}" id="crearR" class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <label for="titulo">Titulo de la rúbrica</label>
                        <input name="titulo" id="titulo" type="text" class="form-control" value="{!! $rubrica->titulo !!}" required>
                    </div>
                    <div class="form-group row">                            
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" required>{!! $rubrica->descripcion !!}</textarea>  
                    </div>
                    <div class="form-group row">
                        <label for="baseevaluacion">Puntuación sobre la que se realizará la evaluación</label>
                        <input name="baseevaluacion" id="baseevaluacion" type="text" class="form-control" value="20" required>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            {{-- Llenando fila de arriba --}}
                            <tr>
                                <th scope="col"></th>
                                @for($j=0; $j < $rubrica->columnas; $j++)
                                    <th scope="col">                                        
                                        <textarea name="{{"evaluacion".$j}}" id="{{"evaluacion".$j}}" class="form-control" placeholder="{{"Valoración ".($j+1)}}" required>{!!$rubrica->{'evaluacion'.$j}!!}</textarea>
                                        <input type="text" name="{{"evaluacionval".$j}}" id="{{"evaluacionval".$j}}" class="form-control" placeholder="{{"Valoración numerica".($j+1)}}" value="{!!$j!!}" required>
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        {{-- resto de la tabla --}}                    
                        <tbody>
                            @for($i=0; $i < $rubrica->filas; $i++)
                                <tr>
                                    <th scope="row">{{-- indicador/criterio --}}
                                        <textarea name="{{"criterio".$i}}" id="{{"criterio".$i}}" class="form-control" placeholder="{{"Indicador/criterio ".$i}}" required>{!! $rubrica->{"criterio".$i} !!}  </textarea>
                                    </th>
                                    @for($j=0; $j < $rubrica->columnas; $j++)
                                        <td> {{-- celdas internas --}}
                                            <textarea name="{{"celda".$i.$j}}" id="{{"celda".$i.$j}}" class="form-control" placeholder="{{"Descripción "}}" required>{!! $rubrica->{"celda".$i.$j} !!}</textarea>                                                                        
                                        </td>
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>

                    </table>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary">Guardar</button>
                            <a class="btn btn-danger" href="{{route('rubrica.eliminar', $rubrica->id) }}" title="Eliminar rúbrica">Cancelar y descartar cambios</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection