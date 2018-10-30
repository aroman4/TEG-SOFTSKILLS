
@extends('layouts.plantillaQ')
<head>
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
  
          var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            @foreach(\App\Pregunta::all() as $preg)
              ['{{$preg->titulo}}',5],
                /* @foreach($preg->respuesta() as $resp)
                  ['{{$preg->titulo}}',{{$resp->respuesta}}],
                @endforeach */
            @endforeach
          ]);
  
          var options = {
            title: 'Prueba'
          };
  
          var chart_area = document.getElementById('piechart');
          var chart = new google.visualization.PieChart(chart_area);
  
          google.visualization.events.addListener(chart,'ready',function(){
              chart_area.innerHTML = '<img src="'+ chart.getImageURI() +'" class="img-responsive">';
          });
  
          chart.draw(data, options);
        }
      </script>
    </head>
@section('content')
<div class="col-md-10 listaQuest">
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
                    @forelse ($cuestionario->pregunta as $item)
                        <h3>Pregunta:</h3>
                        <p>{{ $item->titulo }}</p>
                        <h4>Respuesta:</h4>
                        @foreach ($item->respuesta as $respuesta)
                            <p>{{ $respuesta->respuesta }}</p>
                            {{-- <small>{{ $respuesta->created_at }}</small> --}}
                        @endforeach
                    @empty
                        No hay respuestas para esta pregunta
                    @endforelse
                    <div id="piechart" style="width: 900px; height: 500px;"></div>                
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
{{-- @extends('layouts.plantillaQ')

@section('content')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          @foreach(\App\Pregunta::all() as $preg)
            ['{{$preg->titulo}}',5],
              /* @foreach($preg->respuesta() as $resp)
                ['{{$preg->titulo}}',{{$resp->respuesta}}],
              @endforeach */
          @endforeach
        ]);

        var options = {
          title: 'Prueba'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
@endsection --}}