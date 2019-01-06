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
		<h2 class="text-center">Investigaciones Realizadas por Nuestros Investigadores</h2>    
				<div class="row justify-content-center" style="margin-right:15px;">  
					@foreach ($pub as $inv)
						<div class="col-md-8">
							<div class="card ">
								<div class="card-body ">
									<div class="form-group row" style="float:right;"><br>
										<p style="margin:10px"><b>Fecha:</b> {{$inv->created_at}} </p>
										<p style="margin:10px"><b>Estatus:</b> {{$inv->estado}} </p>
									</div>
									<div class="form-group row">
										<p><b>Título:</b>  {{($inv->titulo)}}</p>
									</div>
									<div class="row">
										<p><b>Actividad:</b> {{$inv->caracteristica}}</p>
									</div>
									<div class="row">
										<p><b>Descripción:</b> {{$inv->descripcion}}</p>
									</div>
									<div class="col-12">
										<a class="btn btn-success boton1"href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
										<a class="btn btn-secondary boton1"href="{{ route('register') }}">{{ __('Registro') }}</a>	
										@guest										
											<a href="{{route('solicpostulacionfuera',$inv->id)}}" class="btn btn-primary boton1">Postúlate</a>
										@else
											<a href="{{route('solicpostulacion',$inv->id)}}" class="btn btn-primary boton1">Postúlate</a>
										@endguest
										{{-- <div class="row" style="float:right;"><br>
                                            <a href="{{route('like',$inv->id)}}" class="far fa-thumbs-up">Like +{{$inv->cantidad}}</a>
										</div> --}}
									</div> 
								</div>
							</div>
						</div>
					@endforeach  
				</div>
				<br><br>
				<div class="row justify-content-center">
					{!! $pub->render()!!} 
				</div>
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