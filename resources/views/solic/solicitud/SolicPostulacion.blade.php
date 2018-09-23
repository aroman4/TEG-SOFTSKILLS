@extends('layouts.plantilla')

@section('content')
<div class="container">
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Solicitud de Postulación') }}</div>

                    <div class="card-body">
                        {!!Form::open(['action' => 'RequestController@store', 'method' => 'POST', 'files'=> true])!!}

                             @csrf
                                <div class="form-group row">
                                    {!! Form::label ('opinion','Opinión:*')!!}
                                    {!! Form::text ('opinion',null,['class'=>"form-control {{ $errors->has('opcion') ? ' is-invalid' : '' }}",'placeholder'=>'Escribe tu Opinión','required'])!!}
                                    @if ($errors->has('opinion'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                            </span>
                                    @endif
                                 </div>
                                <div class="form-group row">
                                    {!! Form::label ('otros_proyectos','Cuales proyectos has creado:*')!!}
                                    {!! Form::text ('otros_proyectos',null,['class'=>"form-control {{ $errors->has('otros_proyectos') ? ' is-invalid'}}",'placeholder'=>'Escribe que otros proyectos has participado y creado','required'])!!}
                                    @if ($errors->has('otros_proyectos'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('otros_proyectos') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                        {!! Form::label ('aporte','Apostes:*')!!}
                                        {!! Form::text ('aporte',null,['class'=>"form-control {{ $errors->has('aporte') ? ' is-invalid' : '' }}",'placeholder'=>'Cual seria tu aporte','required'])!!}
                                        @if ($errors->has('aporte'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('aporte') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Agregar archivos </div>
                                              <div class="panel-body">
                                                <form method="POST" action="http://localhost/softskills/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
                                                  
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  
                                                  <div class="form-group">
                                                    <label class="col-md-4 control-label">Subir Curriculum</label>
                                                    <div class="col-md-6">
                                                      <input type="file" class="form-control" name="file" >
                                                    </div>
                                                  </div>
                                      
                                                  <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                      <button type="submit" class="btn btn-primary">Enviar Postulación</button>
                                                    </div>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                        {!!Form::close()!!}              
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection