@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3>Crear producto en : {{$categoria->nombre}}</h3>
			</div>	
		</div>
		<form class="row" action="{{route('categorias/productos/crear',$categoria->id)}}" method="post" >
			@csrf
			<div class="col s12">
				<div class="input-field">
					<input type="text" name="nombre" required>
					<label for="nombre">Nombre del producto</label>
				</div>
			</div>
			<div class="col s12">
				<div class="input-field">
					<input type="number" name="precio" required>
					<label for="nombre">Precio del producto</label>
				</div>
			</div>
			<div class="col s12">
				<div class="input-field">
					<textarea name="descripcion" class="materialize-textarea" required></textarea>
					<label for="nombre">Descripción del producto</label>
				</div>
			</div>
			<div class="col s12">
				<button type="submit" class="waves-effect waves-light btn pink darken-4">Crear</button>
			</div>
		</form>
	</div>
@endsection