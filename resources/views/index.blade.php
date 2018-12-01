@extends('layouts.plantilla')
@section('content')
    <div class="fondo imagen-fija5">
	</div>
	<div class="banner">
		<h1 class="animated fadeInDownBig" style="margin-top:30%">Los estudios demuestran que el éxito está garantizado si tus Soft Skills son excelentes</h1>
		<img style="position:relative; z-index:1;" width="150" height="120" src="{{asset('img/statsup.jpg')}}">
	</div>
	<div class="seccion2">
		<h2>Somos expertos en el desarrollo de habilidades blandas (Soft Skills), especializados en el área de software 
			y Tecnologías de Información y Comunicación. Área que historicamente se ha enfocado más
a lo técnico, nosotros te ofrecemos Asesorías y desarrollo Investigativo en tan importante área como lo son
las habilidades blandas</h2>
    </div>
	
	<div class="noesperes">
		<div class="row" style="">
			<div class="col-md-6" style="padding:0;">
				<div class="text-center imagen-fija imagen-fija6" >
					<h1 class="texth1Index">Investigación</h1>
					<h3 style="padding: 50px;">En nuestra plataforma puede unirse a investigaciones existentes sobre habilidades blandas o puede postular las suyas propias</h3>
					<a class="btn btn-primary" style="height:100px;width:300px;font-size:20px;padding-top:30px" href="{{route('investigacion')}}">Saber más</a>
				</div>
			</div>
			<div class="col-md-6" style="padding:0">
				<div class="text-center imagen-fija imagen-fija1">
					<h1 class=" texth1Index">Asesoría</h1>
					<h3 style="padding: 50px;">Te ofrecemos asesorías con especialistas. <br>Las asesorías en habilidades 
							blandas brindan respuestas y soluciones a los problemas que puedan presentarse o se estén presentando en equipos de trabajo de TIC.</h3>
					<a class="btn btn-primary" style="height:100px;width:300px;font-size:20px;padding-top:30px" href="{{route('asesorias')}}">Saber más</a>
				</div>
			</div>
		</div>
	</div>
	</div>
    
  @endsection