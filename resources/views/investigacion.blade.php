@extends('layouts.plantilla')
@section('content')
    <div class="imagen-fija imagen-fija3">
		<div class="parte1 animated fadeInLeftBig">
				<h1 class="parte12 ">Investigación</h1>
				<p class="parte12">En nuestra plataforma puede unirse a investigaciones existentes sobre habilidades blandas o puede postular las suyas propias
				</p>
		</div>				
	</div>
	<div class="seccion1">
		<div class="textoSeccion1">
			<h1>Importancia</h1>
			<p>Es sumamente importante investigar más sobre las habilidades blandas debido a que el 71% de los proyectos de software que se realizan fracasan por deficit de habilidades blandas.</p>
		</div>
	
	</div>
	
	<div class="noesperes">
		<div class="col-sm-12">
			<br>
			<h2 class="text-center">Investigaciones Realizadas por Todos Nuestros Investigadores</h2>    
			<br>
			<div class="row justify-content-center">  
				@foreach ($pub as $inv)
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="form-group row">
									<p><b>Titulo:</b>  {{($inv->titulo)}}</p>
								</div>
								<div class="form-group row">
									<p><b>Actividad:</b> {{$inv->caracteristica}}</p>
								</div>
								<div class="col-12">
									<button type="button" class="btn btn-outline-info">
										<a href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
									</button>       
									<button type="button" class="btn btn-outline-info">
										<a href="{{ route('register') }}">{{ __('Registro') }}</a>
									</button>       
									<button type="button" class="btn btn-outline-info">
										<a href="#" class="far fa-thumbs-up">Like</a>
									</button>       
								</div> 
							</div>
						</div>
					</div>
				@endforeach    
			</div>
		</div>   
		{!! $pub->render()!!}
	</div>
	</div>
	<div class="imagen-fija imagen-fija4">
		<div class="texto-divImagen">
				<h1 class="texth1Index">¡No esperes más!</h1>
				<h3 style="padding:50px">Regístrate como investigador y postulate a una investigación o solicita la creación de tu investigación propia
				</h3>
				<a class="btn btn-primary" style="height:100px;width:300px;font-size:20px;padding-top:30px" href="{{route('register')}}">¡Quiero empezar!</a>
		</div>
	</div>
    
@endsection