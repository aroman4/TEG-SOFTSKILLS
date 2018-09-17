<!DOCTYPE html>
<html lang="softskills">
<head>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/estilo.css')}}">
</head>
<body>
        <header>
                <nav class="menu-estilo-navegacion">
                        <ul class="menu-estilo-principal">
                                <li class="menu-estilo"><a class="menu" href="#"> Quienes Somos</a></li>
                                <li class="menu-estilo"><a class="menu" href="#"> Servicios</a></li>
                                <li class="menu-estilo"><a class="menu" href="#"> Staff</a></li>
                                <li class="menu-estilo"><a class="menu" href="#"> Bibliografía</a></li>
                                <li class="menu-estilo"><a class="menu" href="#"> Contactos</a></li>
                        </ul>
                 </nav>
        </header>
        {!! Form::open(['action' => 'RequestController@store', 'method' => 'POST'])!!}
        <div class = "form-group">
                {!! Form::label('nombre_solicitud', 'Nombre de la Solicitud:*  ')!!}
                {!! Form::text('nombre_solicitud',null,['class'=>'from-control','placeholder'=>'Nombre de la Solicitud','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('actividades', 'Actividades:*'  )!!}
                {!! Form::text('actividades',null,['class'=>'from-control','placeholder'=>'Actividades a Realizar','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::label('descripcion', 'Descripción:*' )!!}
                {!! Form::text('descripcion',null,['class'=>'from-control','placeholder'=>'Escriba aquí','required'])!!}
        </div>
        <div class = "form-group">
                {!! Form::submit('Ajustar Archivo',['class'=>'btn btn-primary'])!!}
        </div>
        <div class = "form-group">
                {!! Form::submit('Enviar Solicitud',['class'=>'btn btn-primary'])!!}
        </div>
        {!! Form::close()!!}


</body>
</html>
