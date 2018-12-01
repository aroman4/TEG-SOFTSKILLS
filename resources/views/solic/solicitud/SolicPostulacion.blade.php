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
                        {!!Form::open(['action' => 'PostulacionController@store', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                            <input type="hidden" name="id_post" value="{{ $inv }}"> 
                            @csrf
                            <div class="form-group row">
                                {!! Form::label ('tituloinv','Titulo de la Postulación:')!!}
                                {!! Form::text ('tituloinv',null,['class'=>"form-control {{ $errors->has('tituloinv') ? ' is-invalid'}}",'placeholder'=>'Ingrese el Titulo de su postulación','required'])!!}
                                @if ($errors->has('tituloinv'))
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('tituloinv') }}</strong>
                                        </span>
                                @endif
                            </div>
                             <div class="form-group row">
                                    {!! Form::label ('otros_proyectos','Cuales proyectos has creado:')!!}
                                    {!! Form::text ('otros_proyectos',null,['class'=>"form-control {{ $errors->has('otros_proyectos') ? ' is-invalid'}}",'placeholder'=>'Escribe que otros proyectos has participado y creado','required'])!!}
                                    @if ($errors->has('otros_proyectos'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('otros_proyectos') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    {!! Form::label ('actividad','Actividad que deseas participar de la Investigación:  ')!!}
                                    {{-- <p>{{\App\Investigacion::find($inv)->actividades}}</p> --}}
                                    <ul class="form-control">
                                        @foreach(json_decode(\App\Investigacion::find($inv)->actividades) as $key=>$value)
                                            <li><input type="radio" value="{{$value}}" name="actividad" id="actividad"> {{$value}}</li>
                                        @endforeach
                                    </ul>
                                    {{-- {!! Form::textarea ('actividad',null,['class'=>"form-control {{ $errors->has('actividad') ? ' is-invalid' : '' }}",'placeholder'=>'Escribe la actividad a desarrollar','required'])!!}
                                    @if ($errors->has('actividad'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('actividad') }}</strong>
                                            </span>
                                    @endif --}}
                                 </div>
                                <div class="form-group row">
                                        {!! Form::label ('aporte','Aportes:')!!}
                                        {!! Form::text ('aporte',null,['class'=>"form-control {{ $errors->has('aporte') ? ' is-invalid' : '' }}",'placeholder'=>'Cual seria tu aporte','required'])!!}
                                        @if ($errors->has('aporte'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('aporte') }}</strong>
                                        </span>
                                        @endif
                                </div>                                    
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Subir Curriculum</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="archivo" >
                                    </div>
                                </div>
                               <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">Enviar Postulación</button>
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