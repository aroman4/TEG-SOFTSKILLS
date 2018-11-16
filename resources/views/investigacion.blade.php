@extends('layouts.plantilla')
@section('content')
    <div class="imagen-fija imagen-fija3">
		<div class="parte1">
				<h1 class="parte12">Investigación</h1>
				<p class="parte12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ipsum nulla, condimentum
					sed bibendum placerat, interdum eu diam. Aenean elementum vel dui pretium scelerisque. 
					Nullam feugiat luctus tortor nec hendrerit
				</p>
		</div>				
	</div>
	<div class="seccion1">
		<div class="textoSeccion1">
			<h1>Importancia</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ipsum nulla, condimentum
			sed bibendum placerat, interdum eu diam. Aenean elementum vel dui pretium scelerisque. 
			Nullam feugiat luctus tortor nec hendrerit. </p>
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
			<h1>Como Crear un Proyecto de Investigación</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ipsum nulla, condimentum
				sed bibendum placerat, interdum eu diam. Aenean elementum vel dui pretium scelerisque. 
				Nullam feugiat luctus tortor nec hendrerit
            </p>
            <br><br>
            <h1>No esperes mas ser parte de nosotros y demuestra tus conocimientos</h1>
		</div>
	</div>
    
@endsection