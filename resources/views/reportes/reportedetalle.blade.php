
@extends('layouts.plantillaQ')
<head>
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        
        @foreach ($cuestionario->pregunta as $key=>$item)
        google.charts.setOnLoadCallback({{ 'drawChart'.$key }});
            function {!! 'drawChart'.$key !!}() {
                var data = google.visualization.arrayToDataTable([
                ['Respuesta', 'Cantidad de respuestas'],
                @foreach(DB::table('respuesta')->where('pregunta_id',$item->id)->select('respuesta')->groupBy('respuesta')->get() as $resp)
                    ['{!! $resp->respuesta !!}',{!! DB::table('respuesta')->where('respuesta',$resp->respuesta)->count(); !!}],   
                @endforeach
            ]);

            var options = {
            title: '{{$item->titulo .' - '.$item->respuesta->count().' Respuestas'}}',
            pieHole: 0.4,
            };
    
            var chart_area = document.getElementById('piechart'+{{$key}});
            var chart = new google.visualization.PieChart(chart_area);
    
            google.visualization.events.addListener(chart,'ready',function(){
                chart_area.innerHTML = '<img src="'+ chart.getImageURI() +'" class="img-responsive">';
            });
    
            chart.draw(data, options);
            }
        @endforeach
      </script>
    </head>
@section('content')
<div class="col-md-9 listaQuest">
    <div class="list-group">
        <div class="row">
            <div class="col-md-12 list-group-item top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                {{-- <a href="{{route('reportepdf',['cuestionario'=>$cuestionario,'asesoria'=>$asesoria])}}" class="btn btn-success">Generar pdf</a> --}}
                <form method="post" id="make_pdf" action="{{action('CuestionarioController@reportePdf')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="hidden_html" id="hidden_html" />
                    <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Generar PDF</button>
                </form>
                <h2 style="float:right"><span style="color:darkgray">Reporte de:</span> {{$cuestionario->titulo}}</h2>
            </div>
        </div>
        <div id="reporte">
            <div class="row">
                <div class="col-md-12 list-group-item">
                    <h3>{{$cuestionario->titulo}}</h3>
                    <p><b>Cuestionario perteneciente a asesoría:</b> {{$asesoria->titulo}}</p>
                    <p><b>Asesor:</b> {{\App\User::find($asesoria->user_id)->nombre .' '.\App\User::find($asesoria->user_id)->apellido}}</p>
                    <p><b>Cliente:</b> {{\App\User::find($asesoria->id_cliente)->nombre.' '.\App\User::find($asesoria->id_cliente)->apellido}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 list-group-item">
                    @forelse ($cuestionario->pregunta as $key=>$item)
                        {{-- <h3>Pregunta:</h3> --}}
                        <h3>Pregunta: {{ $item->titulo }}</h3>
                        <h4>Respuestas: {{'('.$item->respuesta->count().')'}}</h4>
                        <table class="table table-striped">
                                <tbody>
                        @foreach ($item->respuesta as $respuesta)                            
                                <tr>
                                    <td>{{ $respuesta->respuesta }}</td>
                                </tr>                                   
                        @endforeach
                            </tbody>
                        </table>
                        <div id="{{'piechart'.$key}}" style="width: 900px; height: 500px;"></div>
                    @empty
                        No hay respuestas para esta pregunta
                    @endforelse
                               
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $(document).ready(function(){
        $('#create_pdf').click(function(){
            $('#hidden_html').val($('#reporte').html());
            $('#make_pdf').submit();
        });
    });    
</script>