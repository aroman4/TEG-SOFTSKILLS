@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <form method="post" id="make_pdf" action="{{action('CuestionarioController@reportePdf')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hidden_html" id="hidden_html" />
                        <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Generar PDF</button>
                    </form>
                    <h2 style="float:right">Reporte de asesoría</h2>
                </div>
            </div>
            <div id="reporte">
            <div class="row">
                <div class="col-md-12 list-group-item">
                    <p>Creada el {{$asesoria->created_at}}</p>
                    <h3>Asunto: <span>{{$asesoria->titulo}}</span></h3>
                    <h3>Cliente: <span>{{\App\User::find($asesoria->id_cliente)->nombre}} {{\App\User::find($asesoria->id_cliente)->apellido}}</span></h3>
                    @if(\App\User::find($asesoria->id_cliente)->organizacion != null)
                        <h3>Organización: {{\App\User::find($asesoria->id_cliente)->organizacion}}</h3>
                    @endif
                    <br><br>
                                      
                    <h3>Descripción:</h3>
                    <h4>{{$asesoria->mensaje}}</h4>
                    <br><br>

                    <h3>Reporte</h3>
                    <h4>{{$reporte->texto}}</h4>
                    <br><br>
                    @if($asesoria->archivo != null)
                        <a class="btn btn-secondary" href="{{asset('archivoproyecto/'.$asesoria->archivo)}}">Descargar archivo adjunto</a>
                    @endif
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