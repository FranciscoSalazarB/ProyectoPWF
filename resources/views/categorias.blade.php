@extends('layout')

@section('content')
	<style type="text/css">
		#agregar_categoria{
			width: 100%;
			margin-bottom: 2rem;
			font-size: 1.5rem;
		}
		#vista_categorias{
			padding-bottom: 2rem;
		}
		.contenedor_categoria{
			margin-top: 1rem;
			margin-bottom: 1rem;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3 class="center">Categorías</h3>
			</div>
			<div class="col s12 center">
				<form class="row center" action="#" method="post">
					@csrf
					<div class="col s4"></div>
					<div class="col s4 center">
                		<div class="input-field">
                    		<input type="text" name="poducto" placeholder="Buscar producto" required>
                		</div>
            		</div>
            		<div class="col s1">
            			<br>
            			<button class="waves-effect waves-light btn pink darken-4" type="submit">Buscar</button>
            		</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row z-depth-3 grey lighten-5" id="vista_categorias">
			<a href="{{route('categorias/crear')}}" class="waves-effect waves-light btn pink darken-4 center" id="agregar_categoria">Agregar nueva categoría</a>
			<div class="col s12">
				<div class="container">
				@if(count($categorias)==0)	
					<h3 class="center">No hay categorías disponibles</h3>
				@else
					@foreach($categorias as $categoria)
						<div class="col s12 z-depth-3 contenedor_categoria white">
							<h3>{{$categoria->nombre}}</h3>
							<div class="row">
								<div class="col s6">
									<p>Descripción : {{$categoria->descripcion}}</p>
								</div>
								<div class="col s2">
									<a href="{{route('categorias/editar',$categoria->id)}}" class="waves-effect waves-light btn blue darken-4 center">Editar</a>
								</div>
								<div class="col s2">
									<a href="{{route('categorias/eliminar',$categoria->id)}}" class="waves-effect waves-light btn  red darken-4 center">Eliminar</a>
								</div>
								<div class="col s2">
									<a href="{{route('categorias/productos',$categoria->id)}}" class="waves-effect waves-light btn pink darken-4 center">Entrar</a>
								</div>
							</div>
						</div>
					@endforeach
				@endif
				</div>
			</div>
		</div>
	</div>
@endsection