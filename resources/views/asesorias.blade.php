@extends('layouts.plantilla')
@section('content')
	<div class="imagen-fija imagen-fija1">
		<div class="texto-divImagen animated fadeInUp">
			<h1 class="texth1Index">Asesorías</h1>
			<h3 style="padding:50px">Le ofrecemos asesorías para su caso específico. <br>Atendidas por especialistas en competencias blandas para diagnosticar, 
				analizar y presentar resultados y propuestas de formación para la mejora de las 
				habilidades blandas en los integrantes de los equipos de trabajo, 
				mediante instrumentos de medición de soft skills
			</h3>
			<a class="btn btn-primary" style="height:100px;width:300px;font-size:20px;padding-top:30px" href="{{route('presolicitud')}}">Realiza una pre-solicitud</a>
		</div>
	</div>
	<div class="seccion1">
		<div class="textoSeccion1">
		<h1>Importancia</h1>
		<h4 style="padding:50px">Según estudios, solo el 29% de los proyectos tienen éxito, el resto fracasan o tienen inconvenientes. Entre estos factores de éxito se encuentran: apoyo ejecutivo; madurez emocional; involucración del usuario; objetivos de negocio claros; entre otros (Standish Group, 2015), podemos ver el papel claro que juegan las habilidades blandas. Al utilizar asesorías para la formación de las mismas, la probabilidad de éxito en los proyectos aumenta y como bonificación,  estas habilidades quedan para toda la vida</h4>
		</div>
	</div>
	<div class="imagen-fija imagen-fija2">
	<div class="texto-divImagen">
		<h1 class="texth1Index">¡No esperes más!</h1>
		<h3 style="padding:50px">Regístrate como cliente y accede a nuestros servicios ó postúlate como
			asesor si deseas formar parte de nuestro staff
		</h3>
		{{-- <a class="btn btn-primary" style="height:100px;width:300px;font-size:20px;padding-top:30px" href="{{route('register')}}">¡Quiero empezar!</a> --}}
		<a class="btn btn-primary" style="height:100px;width:300px;font-size:20px;padding-top:30px" href="{{route('presolicitud')}}">Realiza una pre-solicitud</a>
		<a class="btn btn-primary" style="height:100px;width:300px;font-size:20px;padding-top:30px" href="{{route('postulacionasesor')}}">Postúlate como asesor</a>
	</div>
	</div>
	
	{{-- <div class="noesperes">
        <!--<img src="{{asset('img/2.jpg')}}">-->
		<h1>No esperes</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ipsum nulla, condimentum
		sed bibendum placerat, interdum eu diam. Aenean elementum vel dui pretium scelerisque. 
		Nullam feugiat luctus tortor nec hendrerit. </p>
	</div>   --}}
@endsection