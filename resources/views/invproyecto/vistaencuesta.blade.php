@extends('layouts.menuinv')
@section('content')

<div id="columnchart_material" style="width: 800px; height: 500px;"></div>

@endsection


  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Usuario', 'Respuesta1', 'Respuesta2', 'Respuesta3','Respuesta4','Respuesta5','Respuesta6'],
          @foreach($encuestastodas as $value)
            ['{!! App\User::find($value->id_usuario)->nombre .' '. App\User::find($value->id_usuario)->apellido !!}', '{!!$value->respuesta1!!}', '{!!$value->respuesta2!!}', '{!!$value->respuesta3!!}','{!!$value->respuesta4!!}','{!!$value->respuesta5!!}','{!!$value->respuesta6!!}'],
          @endforeach
          /* @foreach(\App\Encuesta::all() as $value)
            ['no se', '{!!$value->respuesta1!!}', '{!!$value->respuesta2!!}', '{!!$value->respuesta3!!}','{!!$value->respuesta4!!}','{!!$value->respuesta5!!}','{!!$value->respuesta6!!}'],
          @endforeach */
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  {{-- <body>
    
  </body> --}}