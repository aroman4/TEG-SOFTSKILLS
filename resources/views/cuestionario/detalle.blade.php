@extends('layouts.plantillaQ')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> {{ $cuestionario->titulo }}</span>
      <p>
        {{ $cuestionario->description }}
      </p>
      <br/>
      <a href='ver/{{$cuestionario->id}}'>Take cuestionario</a> | <a href="{{$cuestionario->id}}/editar">Editar cuestionario</a> | <a href="{{route('cuestionario.respuestas',$cuestionario->id)}}">View Answers</a> <a href="#doDelete" style="float:right;" class="modal-trigger red-text">Delete cuestionario</a>
      <!-- Modal Structure -->
      <!-- TODO Fix the Delete aspect -->
      <div id="doDelete" class="modal bottom-sheet">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <h4>Are you sure?</h4>
              <p>Do you wish to delete this cuestionario called "{{ $cuestionario->titulo }}"?</p>
              <div class="modal-footer">
                <a href="/cuestionario/{{ $cuestionario->id }}/borrar" class=" modal-action waves-effect waves-light btn-flat red-text">Yep yep!</a>
                <a class=" modal-action modal-close waves-effect waves-light green white-text btn">No, stop!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="divider" style="margin:20px 0px;"></div>
      <p class="flow-text center-align">preguntas</p>
      <ul class="collapsible" data-collapsible="expandable">
          @forelse ($cuestionario->pregunta as $pregunta)
          <li style="box-shadow:none;">
          <div class="collapsible-header">{{ $pregunta->titulo }} <a href="{{route('pregunta.editar',$pregunta->id)}}" style="float:right;">Edit</a></div>
            <div class="collapsible-body">
              <div style="margin:5px; padding:10px;">
                  {!! Form::open() !!}
                    @if($pregunta->tipo_pregunta === 'text')
                      {{ Form::text('titulo')}}
                    @elseif($pregunta->tipo_pregunta === 'textarea')
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Provide answer</label>
                      </div>
                    </div>
                    @elseif($pregunta->tipo_pregunta === 'radio')
                      @foreach($pregunta->opcion as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                          <input type="radio" id="{{ $key }}" />
                          <label for="{{ $key }}">{{ $value }}</label>
                        </p>
                      @endforeach
                    @elseif($pregunta->tipo_pregunta === 'checkbox')
                      @foreach($pregunta->opcion as $key=>$value)
                      <p style="margin:0px; padding:0px;">
                        <input type="checkbox" id="{{ $key }}" />
                        <label for="{{$key}}">{{ $value }}</label>
                      </p>
                      @endforeach
                    @endif 
                  {!! Form::close() !!}
              </div>
            </div>
          </li>
          @empty
            <span style="padding:10px;">Nothing to show. Add questions below.</span>
          @endforelse
      </ul>
      <h2 class="flow-text">Add Question</h2>
      <form method="POST" action="{{ $cuestionario->id }}/preguntas" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <select name="tipo_pregunta" id="tipo_pregunta">
              <option value="" disabled selected>Choose your option</option>
              <option value="text">Text</option>
              <option value="textarea">Textarea</option>
              <option value="checkbox">Checkbox</option>
              <option value="radio">Radio Buttons</option>
            </select>
          </div>                
          <div class="input-field col s12">
            <input name="titulo" id="titulo" type="text">
            <label for="titulo">Question</label>
          </div>  
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g"></span>

          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Submit</button>
          </div>
        </div>
        </form>
    </div>
  </div>    
@endsection