@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3>Editar categoría</h3>
			</div>	
		</div>
		<form class="row center" action="{{route('categorias/editar',$categoria->id)}}" method="post">
			@csrf
			<div class="col s12">
				<div class="input-field">
					<input type="text" name="nombre" required value="{{$categoria->nombre}}">
					<label for="nombre">Nuevo Nombre</label>
				</div>
			</div>
			<div class="col s12">
				<div class="input-field">
					<textarea name="descripcion" class="materialize-textarea">{{$categoria->descripcion}}</textarea>
					<label for="nombre">Nueva descripción</label>
				</div>
			</div>
			<div class="col s1">
				<button type="submit" class="waves-effect waves-light btn pink darken-4">Actualizar</button>
			</div>
		</form>
	</div>
@endsection