@extends('layouts.menuinv')
@section('content')

<div class="col-md-9 solicitudInv">
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Solicitud de Investigación') }}</div>

                    <div class="card-body">
                        {!!Form::open(['action' => 'RequestController@store', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}

                             @csrf
                                <div class="form-group row">
                                    {!! Form::label ('titulo','Titulo:*')!!}
                                    {!! Form::text ('titulo',null,['class'=>"form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}",'placeholder'=>'Titulo','required'])!!}
                                    @if ($errors->has('titulo'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                            </span>
                                    @endif
                                 </div>
                                 <div class="form-group row">
                                    {!! Form::label ('objetivos','Objetivo General:*')!!}
                                    {!! Form::text ('objetivos',null,['class'=>"form-control {{ $errors->has('objetivos') ? ' is-invalid'}}",'placeholder'=>'Objetivo General de la Investigación'])!!}
                                    @if ($errors->has('objetivos'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('objetivos') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    {!! Form::label ('caracteristica','Palabras Claves:*')!!}
                                    {!! Form::text ('caracteristica',null,['class'=>"form-control {{ $errors->has('caracteristica') ? ' is-invalid'}}",'placeholder'=>'Palabras Claves'])!!}
                                    @if ($errors->has('caracteristica'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('caracteristica') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                    {{-- <div class="form-group row agg-actividad">
                                        {!! Form::label ('actividades','Actividades:*')!!}
                                        <span class="add-option btn btn-success boton1" style="cursor:pointer;">Añadir objetivo</span>                                        
                                        <div class="input-field form-control" style="border:none;">
                                            <input type="text" name="actividades[]" id="actividades[]" class="form-control">
                                            <span style="float:right; cursor:pointer;"class="delete-option btn btn-danger boton1">Borrar objetivo</span>                                            
                                        </div>
                                        @if ($errors->has('actividades'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('actividades') }}</strong>
                                        </span>
                                        @endif
                                    </div> --}}
                                    <div class="form-group row agg-actividad">
                                        {!! Form::label ('objetivos','Objetivos:*')!!}
                                        <span class="add-option btn btn-success boton1" style="cursor:pointer;">Añadir objetivo</span>                                        
                                        <div class="input-field form-control" style="border:none;">
                                            Objetivo Específico: 
                                            <div class="input-field form-control" style="border:none;">
                                                <input type="text" name="objetivosespecificos[]" id="objetivosespecificos[]" class="form-control">
                                                <span style="float:right; cursor:pointer;"class="delete-option btn btn-danger boton1"><i title="Borrar" class="fa fa-trash" aria-hidden="true"></i> Borrar</span>                                            
                                            </div>
                                            Actividades del objetivo: 
                                            <span class="add-actividad btn btn-success boton1" style="cursor:pointer;">Añadir actividad</span> 
                                            <div class="actividadesObj"></div>
                                        </div>
                                        @if ($errors->has('actividades'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('actividades') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label ('descripcion','Resumen:*')!!}
                                        {!! Form::textarea ('descripcion',null,['class'=>"form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}",'placeholder'=>'Resumen de la investigación','required'])!!}
                                        @if ($errors->has('descripcion'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                        @endif
                                    </div>                                       
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Subir Archivo</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="archivo" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary boton1">Enviar Solicitud</button>
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

{{-- <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script> --}}
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/actividad.js')}}"></script>



