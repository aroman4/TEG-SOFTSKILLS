@extends('layouts.menuinv')
@section('content')
<div class="col-md-9" style="margin:10px auto;">
    {!!Form::open(['action' => 'EncuestaController@storerespuestauno', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
    {{-- @csrf --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
                <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>
                <button type="submit" class="text-center btn btn-success boton">Enviar Resultados</button>
                <h1 style="float:left">Evaluar al Investigador</h1>
        </div>
    </div>
    {{-- <input type="hidden" name="encuestaid" value="{{ $encuesta->id }}"> --}}
    <div class="row">
        <div class="col-md-12 list-group-item ">
          <table class="table table-bordered text-center">
            <thead>
              <tr >
                <th style="background: #2B3033;color: white;" scope="col"><h1>Preguntas</h1></th>
                <th style="background: #2B3033;color: white;" scope="col">Muy en Desacuerdo</th>
                <th style="background: #2B3033;color: white;" scope="col">Algo en Desacuerdo</th>
                <th style="background: #2B3033;color: white;" scope="col">Ni de Acuerdo ni en Desacuerdo</th>
                <th style="background: #2B3033;color: white;" scope="col">Algo de Acuerdo</th>
                <th style="background: #2B3033;color: white;" scope="col">Muy de Acuerdo</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th scope="row">{!! Form::label ('pregunta1','En relación al interés mostrado el Investigador, se
                    puede decir que los resultados obtenidos de la actividad asignada están bien articulados y justificados.')!!}</th>
                <td><input type="radio" name="respuesta1" value="1"></td>
                <td><input type="radio" name="respuesta1" value="2"></td>
                <td><input type="radio" name="respuesta1" value="3"></td>
                <td><input type="radio" name="respuesta1" value="4"></td>
                <td><input type="radio" name="respuesta1" value="5"></td>
              </tr>
              <tr>
                <th scope="row">{!! Form::label ('pregunta2','Considera que el investigador supo organizar su tiempo en la elaboración de su actividad.')!!}</th>
                <td><input type="radio" name="respuesta2" value="1"></td>
                <td><input type="radio" name="respuesta2" value="2"></td>
                <td><input type="radio" name="respuesta2" value="3"></td>
                <td><input type="radio" name="respuesta2" value="4"></td>
                <td><input type="radio" name="respuesta2" value="5"></td>
              </tr>
              <tr>
                <th scope="row">{!! Form::label ('pregunta3','Usted esta totalmente conforme con la actividad realizada por el invetigador, cumplio con el objetivo general de la invetsigación.')!!}</th>
                <td><input type="radio" name="respuesta3" value="1"></td>
                <td><input type="radio" name="respuesta3" value="2"></td>
                <td><input type="radio" name="respuesta3" value="3"></td>
                <td><input type="radio" name="respuesta3" value="4"></td>
                <td><input type="radio" name="respuesta3" value="5"></td>
              </tr>
              <tr>
                <th scope="row">{!! Form::label ('pregunta4','El Investigador cumplió con la fecha tope de entrega de la actividad asignada.')!!}</th>
                <td><input type="radio" name="respuesta4" value="1"></td>
                <td><input type="radio" name="respuesta4" value="2"></td>
                <td><input type="radio" name="respuesta4" value="3"></td>
                <td><input type="radio" name="respuesta4" value="4"></td>
                <td><input type="radio" name="respuesta4" value="5"></td>
                </tr>
                <tr>
                <th scope="row">{!! Form::label ('pregunta5','La actividad realizada por el investigador es un proyecto innovador y arriesgado en su objetivo, lo que
                  se valora positivamente.')!!}</th>
                <td><input type="radio" name="respuesta5" value="1"></td>
                <td><input type="radio" name="respuesta5" value="2"></td>
                <td><input type="radio" name="respuesta5" value="3"></td>
                <td><input type="radio" name="respuesta5" value="4"></td>
                <td><input type="radio" name="respuesta5" value="5"></td>
                </tr>
                <tr>
                <th scope="row">{!! Form::label ('pregunta6','Creé usted que es un buen investigador')!!}</th>
                <td><input type="radio" name="respuesta6" value="1"></td>
                <td><input type="radio" name="respuesta6" value="2"></td>
                <td><input type="radio" name="respuesta6" value="3"></td>
                <td><input type="radio" name="respuesta6" value="4"></td>
                <td><input type="radio" name="respuesta6" value="5"></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div> 
          <input type="hidden" name="id_investg" value="{{ $inv->id}}">
          <input type="hidden" name="id_creador" value="{{ $inv->user_id }}">
          <input type="hidden" name="id_usuario" value="{{ $postulante }}">
    {!!Form::close()!!}              
  </div>
@endsection