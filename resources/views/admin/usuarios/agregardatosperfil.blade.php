@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Datos de Perdil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group row">
                            {!! Form::label ('nombre_usu','Nombre de usuario*')!!}
                            {!! Form::text ('nombre_usu',null,['class'=>"form-control {{ $errors->has('nombre_usu') ? ' is-invalid' : '' }}",'placeholder'=>'Nombre de usuario','required'])!!}
                            @if ($errors->has('nombre_usu'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('nombre_usu') }}</strong>
                                </span>
                            @endif
                        </div> 
                 --}}
                         <div class="form-group row">
                            {!! Form::label ('sexo','Sexo*')!!}
                            <!--{!! Form::text ('sexo',null,['class'=>"form-control {{ $errors->has('sexo') ? ' is-invalid' }}",'placeholder'=>'Sexo'])!!}-->
                            {!! Form::select ('sexo',['Femenino'=>'Femenino','Masculino'=>'Masculino'],null,['class'=>"form-control {{ $errors->has('sexo') ? ' is-invalid' : '' }}",'required'])!!}
                            @if ($errors->has('sexo'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('sexo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Subir imagen de perfil</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="imagen" >
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('organizacion','Organización')!!}
                            {!! Form::text ('organizacion',null,['class'=>"form-control {{ $errors->has('organizacion') ? ' is-invalid' }}",'placeholder'=>'Organización','integer'])!!}
                            @if ($errors->has('organizacion'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('organizacion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('edad','Edad')!!}
                            {!! Form::text ('edad',null,['class'=>"form-control {{ $errors->has('edad') ? ' is-invalid' }}",'placeholder'=>'Edad','integer'])!!}
                            @if ($errors->has('edad'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('edad') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('profesion','Profesion')!!}
                            {!! Form::text ('profesion',null,['class'=>"form-control {{ $errors->has('profesion') ? ' is-invalid' }}",'placeholder'=>'Profesion'])!!}
                            @if ($errors->has('profesion'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('profesion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('telefono','Telefono')!!}
                            {!! Form::text ('telefono',null,['class'=>"form-control {{ $errors->has('edad') ? ' is-invalid'}}",'placeholder'=>'Telefono'])!!}
                            @if ($errors->has('telefono'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('direccion','Direccion')!!}
                            {!! Form::text ('direccion',null,['class'=>"form-control {{ $errors->has('direccion') ? ' is-invalid' }}",'placeholder'=>'Direccion'])!!}
                            @if ($errors->has('direccion'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div> --}}
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
