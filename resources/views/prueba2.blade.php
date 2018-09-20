<!DOCTYPE html>
<html lang="softskills">
<head>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/estilo.css')}}">
</head>
    <body>
        <header>
              @yield('content')
         </header>
         <br><br>

        {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label ('nombre_usu','Nombre de usuario*')!!}
                {!! Form::text ('nombre_usu',null,['class'=>'form-control','placeholder'=>'Nombre de usuario','required'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('email','Correo electronico*')!!}
                {!! Form::email ('email',null,['class'=>'form-control','placeholder'=>'Email','required'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('clave_usu','Contraseña*')!!}
                {!! Form::password ('clave_usu',['class'=>'form-control','placeholder'=>'****','required'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('tipo_usu','Tipo de usuario*')!!}
                {!! Form::select ('tipo_usu',['investigador'=>'Investigador','asesor'=>'Asesor','cliente'=>'Cliente'],null,['class'=>'form-control','required'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('edad','Edad')!!}
                {!! Form::number ('edad',null)!!}
            </div>
            <div class="form-group">
                {!! Form::label ('nombre','Nombre')!!}
                {!! Form::text ('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('apellido','Apellido')!!}
                {!! Form::text ('apellido',null,['class'=>'form-control','placeholder'=>'Apellido'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('telefono','Telefono')!!}
                {!! Form::number ('telefono',null)!!}
            </div>
            <div class="form-group">
                {!! Form::label ('direccion','Direccion')!!}
                {!! Form::text ('direccion',null,['class'=>'form-control','placeholder'=>'Direccion'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('pais','Pais')!!}
                {!! Form::text ('pais',null,['class'=>'form-control','placeholder'=>'Pais'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('profesion','Profesion')!!}
                {!! Form::text ('profesion',null,['class'=>'form-control','placeholder'=>'Profesion'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('sexo','Sexo')!!}
                {!! Form::text ('sexo',null,['class'=>'form-control','placeholder'=>'Sexo'])!!}
            </div>
            <div class="form-group">
                {!! Form::label ('cedula','Cedula')!!}
                {!! Form::number ('cedula',null)!!}
            </div>
            <div class="form-group">
                {!! Form::submit ('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
        {!! Form::close() !!}
    </body>
 </html>