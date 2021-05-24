@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3>Crear categoría</h3>
			</div>	
		</div>
		<form class="row" action="{{route('categorias/crear')}}" method="post" >
			@csrf
			<div class="col s12">
				<div class="input-field">
					<input type="text" name="nombre">
					<label for="nombre">Nombre de la categoría</label>
				</div>
			</div>
			<div class="col s12">
				<div class="input-field">
					<textarea name="descripcion" class="materialize-textarea"></textarea>
					<label for="nombre">Descripción de la catgoría</label>
				</div>
			</div>
			<div class="col s12">
				<button type="submit" class="waves-effect waves-light btn pink darken-4">Crear</button>
			</div>
		</form>
	</div>
@endsection