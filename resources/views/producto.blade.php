@extends('layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s6">
				<h3>{{$producto->nombre}}</h3>
			</div>
			<div class="col s6">
				<br>
				<h4>Categoría : <a href="{{route('categorias/productos',$producto->categoria->id)}}" class="waves-effect waves-light btn pink darken-4 center">{{$producto->categoria->nombre}}</a></h4>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<h4>Propietario : {{$producto->usuario->name}}</h4>
			</div>
			<div class="col s6">
				<h5>{{$producto->consignado? "" : "Sin Consignar"}}</h5>
			</div>
		</div>
		<div class="row">
			<div class="col s12"><h5>precio ${{$producto->precio}}</h5></div>
			<div class="col s12s"><h5>Descipción : {{$producto->descripcion}}</h5></div>
		</div>
		<div class="row">
			<div class="carousel">
				@foreach($producto->images as $image)
					<a class="carousel-item" href="#one!"><img src="{{asset($image->url)}}" ></a>
				@endforeach
			</div>
		</div>
		<form class="row">
			<div class="col s6">
				<textarea name="pregunta" class="materialize-textarea" required></textarea>
				<label for="pregunta">Descripción del producto</label>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems);
  });
	</script>
@endsection