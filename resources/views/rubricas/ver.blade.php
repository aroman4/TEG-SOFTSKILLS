@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
        <div class="row">
            <div class="col-md-12 list-group-item text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h2 style="float:right"><span style="color:darkgray">Ver rúbrica:</span> {{$rubrica->titulo}}</h2>
            </div>     
        </div>
        <div class="row">
            <div class="col-md-12 list-group-item">
                <p><b>Creada el: </b>{{$rubrica->created_at}}</p>
                <p><b>Descripción: </b>{{$rubrica->descripcion}}</p>
                <div class="text-right">
                    <a href="{{route('rubrica.detalle', $rubrica->id) }}" title="Editar rúbrica"><i class="fas fa-pencil-alt"></i> Editar</a>
                    <a href="{{route('rubrica.respuesta', $rubrica->id) }}" title="Ver respuesta de rúbrica"><i class="fas fa-chart-pie"></i> Ver respuestas</a>                                    
                    <a href="{{route('rubrica.responder', $rubrica->id) }}" title="Responder rúbrica"><i class="fab fa-wpforms"></i> Responder</a>                                    
                    <a href="{{route('rubrica.eliminar', $rubrica->id) }}" title="Eliminar rúbrica"><i class="fas fa-trash-alt"></i> Eliminar</a>
                </div>
                    
                    <table class="table table-bordered">
                        <thead>
                            {{-- Llenando fila de arriba --}}
                            <tr>
                                <th scope="col"></th>
                                @for($j=0; $j < $rubrica->columnas; $j++)
                                    <th scope="col">
                                        {!!$rubrica->{'evaluacion'.$j}!!}<br>
                                        {!!$rubrica->{'evaluacionval'.$j}!!}
                                    </th>
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
                                        </td>
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>

                    </table>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <a class="btn btn-success" href="{{route('moduloasesoria.show',$rubrica->id_asesoria)}}">Listo</a>
                            @if(!$rubrica->enviar)
                                <a class="btn btn-primary" href="{{route('rubrica.enviar',$rubrica->id)}}">Enviar a cliente</a>
                            @endif
                            @if(!$rubrica->predefinidoasesor)
                                <a class="btn btn-secondary" href="{{route('rubrica.guardarpred',$rubrica->id)}}">Guardar como predefinido</a>
                            @endif
                        </div>
                    </div>                    
            </div>
        </div>
    </div>    
</div>
@endsection