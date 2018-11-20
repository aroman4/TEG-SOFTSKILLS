@extends('layouts.menuinv')
@section('content')
<div class="col-md-9" style="margin:10px auto;">
    {!!Form::open(['action' => 'EncuestaController@storerespuestauno', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
    {{-- @csrf --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
                <a href="{{route('vistainvestigaciones')}}" class="btn btn-primary boton">Regresar</a>
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
                <th scope="row">{!! Form::label ('pregunta1','Cuales son sus capacidades para resolver problemas')!!}</th>
                <td><input type="radio" name="respuesta1" value="1"></td>
                <td><input type="radio" name="respuesta1" value="2"></td>
                <td><input type="radio" name="respuesta1" value="3"></td>
                <td><input type="radio" name="respuesta1" value="4"></td>
                <td><input type="radio" name="respuesta1" value="5"></td>
              </tr>
              <tr>
                <th scope="row">{!! Form::label ('pregunta2','Te Gusta Trabajar en Equipo')!!}</th>
                <td><input type="radio" name="respuesta2" value="1"></td>
                <td><input type="radio" name="respuesta2" value="2"></td>
                <td><input type="radio" name="respuesta2" value="3"></td>
                <td><input type="radio" name="respuesta2" value="4"></td>
                <td><input type="radio" name="respuesta2" value="5"></td>
              </tr>
              <tr>
                <th scope="row">{!! Form::label ('pregunta3','Te Adaptas a Cualquier cambio')!!}</th>
                <td><input type="radio" name="respuesta3" value="1"></td>
                <td><input type="radio" name="respuesta3" value="2"></td>
                <td><input type="radio" name="respuesta3" value="3"></td>
                <td><input type="radio" name="respuesta3" value="4"></td>
                <td><input type="radio" name="respuesta3" value="5"></td>
              </tr>
              <tr>
                <th scope="row">{!! Form::label ('pregunta4','Cumplio con la fecha de entrega')!!}</th>
                <td><input type="radio" name="respuesta4" value="1"></td>
                <td><input type="radio" name="respuesta4" value="2"></td>
                <td><input type="radio" name="respuesta4" value="3"></td>
                <td><input type="radio" name="respuesta4" value="4"></td>
                <td><input type="radio" name="respuesta4" value="5"></td>
                </tr>
                <tr>
                <th scope="row">{!! Form::label ('pregunta5','Eres bueno Optimizando tu tiempo')!!}</th>
                <td><input type="radio" name="respuesta5" value="1"></td>
                <td><input type="radio" name="respuesta5" value="2"></td>
                <td><input type="radio" name="respuesta5" value="3"></td>
                <td><input type="radio" name="respuesta5" value="4"></td>
                <td><input type="radio" name="respuesta5" value="5"></td>
                </tr>
                <tr>
                <th scope="row">{!! Form::label ('pregunta6','Como te consideras como persona')!!}</th>
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