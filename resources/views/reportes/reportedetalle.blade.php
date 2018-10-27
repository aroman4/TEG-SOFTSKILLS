@extends('layouts.plantillaQ')

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
@endsection