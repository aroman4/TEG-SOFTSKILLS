@extends('layouts.plantilla')
@section('content')
    <div class="imagen-fija imagen-fija3">
		<div class="parte1 animated fadeInLeftBig">
				<h1 class="parte12 " style="color:#4477ab;"><b>Investigación</b></h1>
				<p class="parte12" style="font-size: 20px; ">Te Invitamos a ser parte de nuestra plataforma, a traves de nuestras investigaciones existentes sobre habilidades blandas o también puede postular las suyas propias.
				</p>
		</div>				
	</div>
	<div class="seccion1">
		<div class="textoSeccion1">
			<h1>Importancia</h1>
			<p style="font-size: 20px; padding: 30px;">Las habilidades duras o hard skills tienen el mismo significado de toda la vida: son el conjunto de conocimientos y habilidades específicas que una compañía busca y mide en sus candidatos. 
			Parece que las personas aún tienen una ventaja competitiva y fundamental sobre la tecnología: la habilidad de entender a otras personas. Expresar empatía, comunicarse persuasivamente, buscar consenso de manera 
			que los equipos puedan acordar un plan de acción, y aún más importante, sentirse comprometidos de manera colectiva con su éxito.
			Es sumamente importante investigar más sobre las habilidades blandas debido a que el 71% de los proyectos de software que se realizan fracasan por deficit de habilidades blandas.</p>
		</div>
	
	</div>
	
	<div class="noesperes" style="height: 600px;">
			<h2 style="margin:20px; " class="text-center">Investigaciones Realizadas por Todos Nuestros Investigadores</h2>    
				<div class="row" style="padding: 30px;">
					@foreach ($pub as $inv)
					<div class="card" style="margin:20px; height:40%; width:20%;">
						<div class="item px-1 mb-6 mb-md-0">
								<div class="d-block h-100">
									<div class="px-4 pt-4 pb-4 content text-center">
										<div class="form-group row">
											<p><b>{{($inv->titulo)}}</b></p>
										</div>
										<div class="form-group row">
											<p><b>{{$inv->descripcion}}</b> </p>
										</div>	       
									</div> 
								</div>
								<div class="text-center pt-4">
									<button type="button" class="btn btn-outline-info">
										<a href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
									</button>       
								</div>
								<div class="text-center pt-4">      
									<button type="button" class="btn btn-outline-info">
										<a href="{{ route('register') }}">{{ __('Registro') }}</a>
									</button>       
								</div>
								<div class="text-center pt-4">
									<a href="{{route('solicpostulacion',$inv->id)}}" class="btn btn-primary boton1">Postulación</a>
								</div>
								<div class="text-center pt-4">           
									<button type="button" class="btn btn-outline-info boton1">
										<a href="{{route('like',$inv->id)}}" class="far fa-thumbs-up">Like +{{$inv->cantidad}}</a>
									</button><br>
								</div>
							</div>
						</div>
					@endforeach 
				</div>
				{!! $pub->render()!!} 
	</div>	   
	<div class="imagen-fija imagen-fija4">
		<div class="texto-divImagen">
				<h1 class="texth1Index">¡No esperes más!</h1>
				<h3 style="padding:50px; color:#fff;">Te Invitamos a que seas parte de nuestra plataforma, no pierdas esta oportunidad.
				</h3>
				<a class="btn btn-primary" style="height:100px;width:300px;font-size:20px;padding-top:30px" href="{{route('register')}}">¡Quiero empezar!</a>
		</div>
	</div>
    
@endsection