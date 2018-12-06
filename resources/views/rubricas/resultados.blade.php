@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
        <div class="row">
            <div class="col-md-12 list-group-item text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <form method="post" id="make_pdf" action="{{action('CuestionarioController@reportePdf')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="hidden_html" id="hidden_html" />
                    <button style="float:left" type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Generar PDF</button>
                    <a style="float:left" class="btn btn-success" href="{{route('exportrubrica',$rubrica->id)}}">Generar Excel</a>
                </form>
                <h2 style="float:right"><span style="color:darkgray">Resultados</span> {{$rubrica->titulo}}</h2>
            </div>     
        </div>
        <div id="reporte">
        <div class="row">            
            <div class="col-md-12 list-group-item">                   
                @if($rubrica->respondidoa || $rubrica->respondidoc)
                    @if($rubrica->respondidoa)
                        <h3>Rúbrica:  {{$rubrica->titulo}}</h3>
                        <h2>Resultados Asesor</h2>
                        
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
                                    <th scope="col">Puntuación</th>
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
                                            {{-- marcar la respuesta en la tabla --}}
                                            {{--  || $rubrica->{'respuestac'.$i} == $j --}}
                                            @if($rubrica->{'respuestaa'.$i} == $rubrica->{"evaluacionval".$j})
                                                <td class="table-success">
                                            @else
                                                <td>
                                            @endif
                                            {{-- celdas internas --}}
                                                {!! $rubrica->{"celda".$i.$j} !!}
                                            </td>                                        
                                        @endfor  
                                        {{-- mostrar puntaje --}}
                                        <td>{!! /* $rubrica->{"total".$i.'a'} */$rubrica->{'respuestaa'.$i} !!}</td>
                                    </tr>
                                @endfor
                            </tbody>

                        </table>
                        {{-- mostrar puntaje --}}
                        {{-- <h4>Puntuación total / {{$rubrica->baseevaluacion}}pts: <span style="font-size:50px">{!! $rubrica->totala !!}</span></h4> --}}
                        <div id="piechart" style="width: 900px; height: 500px;"></div>
                    @endif
                    @if($rubrica->respondidoc)
                        <h2>Resultados Cliente</h2>
                            
                        <table class="table table-bordered">
                            <thead>
                                {{-- Llenando fila de arriba --}}
                                <tr>
                                    <th scope="col"></th>
                                    @for($j=0; $j < $rubrica->columnas; $j++)
                                        <th scope="col">{!!$rubrica->{'evaluacion'.$j}!!}</th>
                                    @endfor
                                    <th scope="col">Puntuación</th>
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
                                            {{-- marcar la respuesta en la tabla --}}
                                            @if($rubrica->{'respuestac'.$i} == $rubrica->{"evaluacionval".$j})
                                                <td class="table-success">
                                            @else
                                                <td>
                                            @endif
                                            {{-- celdas internas --}}
                                                {!! $rubrica->{"celda".$i.$j} !!}
                                            </td>                                        
                                        @endfor  
                                        {{-- mostrar puntaje --}}
                                        <td>{!! /* $rubrica->{"total".$i.'c'} */$rubrica->{'respuestac'.$i} !!}</td>
                                    </tr>
                                @endfor
                            </tbody>

                        </table>
                        {{-- mostrar puntaje --}}
                        {{-- <h4>Puntuación total / {{$rubrica->baseevaluacion}}pts: <span style="font-size:50px">{!! $rubrica->totalc !!}</span></h4> --}}
                        <div id="piechart2" style="width: 900px; height: 500px;"></div>
                        <h2>Comparación resultados cliente y asesor</h2>
                     @endif
                @else
                    No hay respuestas para esta rúbrica
                @endif
                
                <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
            </div>{{-- col con list item --}}
        </div>
        </div>{{-- reporte --}}
    </div>{{-- listgroup --}}
</div>
@endsection
<head>
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);
  
        function drawChart() {
  
          var data = google.visualization.arrayToDataTable([
            ['Task', '{!! $rubrica->titulo !!}'],
            @for($i = 0; $i < $rubrica->filas; $i++)
                ['{!! $rubrica->{'criterio'.$i} !!}',{!! $rubrica->{'total'.$i.'a'} !!}],
            @endfor
          ]);
  
          var options = {
            title: 'Resultados asesor'
          };

          /* var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options); */
  
          var chart_area = document.getElementById('piechart');
          var chart = new google.visualization.PieChart(chart_area);
  
          google.visualization.events.addListener(chart,'ready',function(){
              chart_area.innerHTML = '<img src="'+ chart.getImageURI() +'" class="img-responsive">';
          });
  
          chart.draw(data, options);
        }
        function drawChart2() {
  
        var data = google.visualization.arrayToDataTable([
            ['Task', '{!! $rubrica->titulo !!}'],
            @for($i = 0; $i < $rubrica->filas; $i++)
                ['{!! $rubrica->{'criterio'.$i} !!}',{!! $rubrica->{'total'.$i.'c'} !!}],
            @endfor
        ]);

        var options = {
            title: 'Resultados cliente'
        };

        /* var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options); */

        var chart_area = document.getElementById('piechart2');
        var chart = new google.visualization.PieChart(chart_area);

        google.visualization.events.addListener(chart,'ready',function(){
            chart_area.innerHTML = '<img src="'+ chart.getImageURI() +'" class="img-responsive">';
        });

        chart.draw(data, options);
        }
      </script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Criterio', 'Asesor', 'Cliente'],
            @for($i = 0; $i < $rubrica->filas; $i++)
                ['{!! $rubrica->{'criterio'.$i} !!}', {!! $rubrica->{'total'.$i.'a'} !!}, {!! $rubrica->{'total'.$i.'c'} !!}],
            @endfor            
            ]);

            var options = {
            chart: {
                title: 'Comparación resultados'
            }
            };

            /* var chart = new google.charts.Bar(document.getElementById('columnchart_material')); */
            var chart_area = document.getElementById('columnchart_material');
            var chart = new google.visualization.BarChart(chart_area);

            google.visualization.events.addListener(chart,'ready',function(){
                chart_area.innerHTML = '<img src="'+ chart.getImageURI() +'" class="img-responsive">';
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
        </script>
    </head>
    <script>
        $(document).ready(function(){
            $('#create_pdf').click(function(){
                $('#hidden_html').val($('#reporte').html());
                $('#make_pdf').submit();
            });
        });    
    </script>