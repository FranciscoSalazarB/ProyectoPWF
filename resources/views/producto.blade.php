@extends('layout')
@section('content')
	<style type="text/css">
		.full_button {
			width: 100%;
		}
		.carousel{
			height: 225px;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col s6">
				<h3>{{$producto->nombre}}</h3>
			</div>
			<div class="col s6">
				<br>
				<h4>Categoría   <a href="{{route('categorias/productos',$producto->categoria->id)}}" class="waves-effect waves-light btn pink darken-4 center">{{$producto->categoria->nombre}}</a></h4>
			</div>
		</div>
		@auth
		@if(Auth::user()->cargo == 'Encargado' or Auth::user()->id == $producto->usuario->id)
		<div class="row">
			<div class="col s6">
				<h4>Propietario : {{$producto->usuario->name}}</h4>
			</div>
			<div class="col s6">
				<h5>{{$producto->consignado? "" : "Sin Consignar"}}</h5>
			</div>
		</div>
		@endif
		@endauth
		<div class="row">
			<div class="col s6"><h5>precio ${{$producto->precio}}</h5></div>
			<div class="col s6"><h5>Existencias : {{$producto->existencias}}</h5></div>
			<div class="col s12"><h5>Descipción : {{$producto->descripcion}}</h5></div>
		</div>
		@auth
		@if($producto->usuario->id == Auth::user()->id and $producto->consignado == 0)
		<div class="row">
			<div class="col s6"><a href="{{route('producto/editar',$producto->id)}}" class="waves-effect waves-light btn blue darken-4 center full_button">Editar</a></div>
			<div class="col s6"><a href="{{route('producto/eliminar',$producto->id)}}" class="waves-effect waves-light btn  red darken-4 center full_button">Eliminar</a></div>
		</div>
		@endif
		@if($producto->motivo != '' and ($producto->usuario->id == Auth::user()->id or Auth::user()->cargo == 'Encargado') and $producto->consignado == 0)
		<div class="row z-depth-3">
			<div class="col s12">
				<h3>Rechasado por : {{$producto->motivo}}</h3>
			</div>
		</div>
		@endif
		@if(Auth::user()->cargo == 'Encargado')
		<form action="{{route('producto/rechazar',$producto->id)}}" class="row" method="post">
			@csrf
			@if($producto->consignado == 0)
			<div class="col s12"><a href="{{route('producto/consignar',$producto->id)}}" class="waves-effect waves-light btn pink darken-4 center full_button">Consignar</a></div>
			<div class="col s12">
				<textarea name="motivo" class="materialize-textarea" required></textarea>
				<label for="pregunta">Motivo del rechazo</label>
			</div>
			<div class="col s12"><button class="waves-effect waves-light btn red darken-4 center full_button" type="submit">Rechazar</button></div>
			@else
			<div class="col s12"><a href="{{route('producto/desconsignar',$producto->id)}}" class="waves-effect waves-light btn red darken-4 center full_button">Desconsignar</a></div>
			@endif
		</form>
		@endif
		@endauth
		<div class="row z-depth-3">
			<div class="carousel">
				@foreach($producto->images as $image)
					<a class="carousel-item" href="#one!"><img src="{{asset($image->url)}}" ></a>
				@endforeach
			</div>
		</div>
		@auth
		@if($producto->usuario->id != Auth::user()->id)
		<form class="row" action="{{route('producto/comprar',$producto->id)}}" method="post">
			@csrf
			<div class="col s6">
				<div class="input-field">
					<input type="number" name="cantidad" required min="1" max="{{$producto->existencias}}">
					<label for="cantidad">Cantidad de piezas a comprar</label>
				</div>
			</div>
			<div class="col s6">
				<button class="waves-effect waves-light btn pink darken-4 center full_button" type="submit">Comprar</button>
			</div>
		</form>
		@endif
		@endauth
		<div class="row z-depth-3">
			<h3>Preguntas</h3>
			@foreach($producto->questions as $question)
			<div class="row">
				<div class="col s12">
					<h5>{{$question->user->name}} : {{$question->contenido}}</h5>
				</div>
			</div>
			@if($question->respuesta)
			<div class="row">
				<div class="col s12 pink darken-4 white-text">
					<h5>Propietario : {{$question->respuesta}}</h5>
				</div>
			</div>
			@else
			@auth
			@if($producto->usuario->id == Auth::user()->id)
			<form class="row" action="{{route('responder',$question->id)}}" method="post">
				@csrf
				<div class="col s10">
					<textarea name="respuesta" class="materialize-textarea" required></textarea>
					<label for="respuesta">Respuesta</label>
				</div>
				<div class="col s2">
					<button href="#" class="waves-effect waves-light btn pink darken-4 center" type="submit">Responder</button>
				</div>
			</form>
			@endif
			@endauth
			@endif
			@endforeach		
		</div>
		@auth
		@if($producto->usuario->id != Auth::user()->id)
		<form class="row" action="{{route('preguntar',$producto->id)}}" method="post">
			@csrf
			<h4>Realizar Preguntas</h4>
			<div class="col s6">
				<textarea name="pregunta" class="materialize-textarea" required></textarea>
				<label for="pregunta">Pregunta</label>
			</div>
			<div class="col s6">
				<button class="waves-effect waves-light btn pink darken-4 center full_button" type="submit">Preguntar</button>
			</div>
		</form>
		@endif
		@endauth
	</div>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems);
  });
	</script>
@endsection