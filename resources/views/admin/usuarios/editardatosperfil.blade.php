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
                <div class="card-header">{{ __('Editar Datos de Perfil') }}</div>

                <div class="card-body">
                        {!!Form::open(['route' => ['usuarios.update', $usuario], 'method' => 'PUT', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                        @csrf
                        <div class="form-group row">
                            {!! Form::label ('nombre','Nombre')!!}
                            {!! Form::text ('nombre', $usuario->nombre, ['class'=>"form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}",'placeholder'=>'Nombre','required'])!!}
                            @if ($errors->has('nombre'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('apellido','Apellido')!!}
                            {!! Form::text ('apellido', $usuario->apellido, ['class'=>"form-control {{ $errors->has('apellido') ? ' is-invalid' : '' }}",'placeholder'=>'Apellido','required'])!!}
                            @if ($errors->has('apellido'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('sexo','Sexo*')!!}
                            {!! Form::select ('sexo',['Femenino'=>'Femenino','Masculino'=>'Masculino'],null,['class'=>"form-control {{ $errors->has('sexo') ? ' is-invalid' : '' }}",'required'])!!}
                            @if ($errors->has('sexo'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('sexo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                                {!! Form::label ('edad','Edad')!!}
                                {!! Form::number ('edad', $usuario->edad, ['class'=>"form-control {{ $errors->has('edad') ? ' is-invalid' : '' }}",'placeholder'=>'Edad','required'])!!}
                                @if ($errors->has('edad'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('profesion','Profesión')!!}
                            {!! Form::text ('profesion', $usuario->profesion, ['class'=>"form-control {{ $errors->has('profesion') ? ' is-invalid' : '' }}",'placeholder'=>'Profesión','required'])!!}
                            @if ($errors->has('profesion'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('profesion') }}</strong>
                                </span>
                            @endif
                        </div> 
                        <div class="form-group row">
                            {!! Form::label ('telefono','Teléfono')!!}
                            {!! Form::number ('telefono', $usuario->telefono, ['class'=>"form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}",'placeholder'=>'00000000000','required'])!!}
                            @if ($errors->has('telefono'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            {!! Form::label ('direccion','Dirección')!!}
                            {!! Form::text ('direccion', $usuario->direccion, ['class'=>"form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}",'placeholder'=>'Dirección','required'])!!}
                            @if ($errors->has('direccion'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Subir imagen de perfil del Investigador</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="imagen" >
                            </div>
                            {!! Form::submit ('Guardar Datos',['class'=>'btn btn-primary boton'])!!}

                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-4 control-label">Subir imagen de perfil</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="imagen" >
                            </div>
                        </div> --}}
                        {!!Form::close()!!}  
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
