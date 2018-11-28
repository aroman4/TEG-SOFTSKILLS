@extends('layouts.menuinv')

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
            <button  onclick="goBack()" class="btn btn-primary boton">Regresar</button>
                  <h1 class="boton1">Resultados </h1>
            @endif
            <form method="post" id="make_pdf" action="{{action('CuestionarioController@reportePdf')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="hidden_html" id="hidden_html" />
                <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Generar PDF</button>
            </form>
            <h1 style="float:left">Calificación: $postulacion->id_invest </h1>
        </div>
    </div>

    <div id="reporte">
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    </div>
@endsection


  <head>
      <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
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
            title: 'Resultados Obtenidos'
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        /* var chart_area = document.getElementById('columnchart_material');
            var chart = new google.visualization.BarChart(chart_area);

            google.visualization.events.addListener(chart,'ready',function(){
                chart_area.innerHTML = '<img src="'+ chart.getImageURI() +'" class="img-responsive">';
            });

            chart.draw(data, google.charts.Bar.convertOptions(options)); */
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
  {{-- <body>
    
  </body> --}}