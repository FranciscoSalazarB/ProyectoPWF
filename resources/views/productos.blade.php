@extends('layout')

@section('content')
	<style type="text/css">
		#agregar_producto{
			width: 100%;
			margin-bottom: 2rem;
			font-size: 1rem;
		}
		#vista_productos{
			padding-bottom: 2rem;
		}
		.contenedor_productos{
			margin-top: 1rem;
			margin-bottom: 1rem;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3>{{$categoria->nombre}}</h3>
			</div>	
		</div>
	</div>
	<div class="container">
		<div class="row z-depth-3 grey lighten-5" id="vista_productos">
			<a href="{{route('categorias/productos/crear',$categoria->id)}}" class="waves-effect waves-light btn pink darken-4 center" id="agregar_producto">Agregar nuevo producto</a>
			<div class="col s12">
				<div class="container">
					@if(count($productos)==0)
						<h3>No hay productos disponibles en esta categoría</h3>
					@else
						@foreach($productos as $producto)
							<div class="col s12 z-depth-3 contenedor_productos white">
								<h3>{{$producto->nombre}}</h3>
								<div class="row">
									<div class="col s12">
										<p>Descripción : {{$producto->descripcion}}</p>
									</div>
								</div>
								<div class="row">
									<dir class="col s4" style="margin: 0; margin-top: -20px;">
										<p>Precio : ${{$producto->precio}}</p>
									</dir>
									<dir class="col s2" style="margin-bottom: 0; margin-top: 0">
										<a href="{{route('categorias/productos/consignar',[$categoria->id,$producto->id])}}" class="waves-effect waves-light btn purple darken-4 center">Consignar</a>
									</dir>
									<div class="col s2">
										<a href="{{route('categorias/productos/editar',[$categoria->id,$producto->id])}}" class="waves-effect waves-light btn blue darken-4 center">Editar</a>
									</div>
									<div class="col s2">
										<a href="{{route('categorias/productos/eliminar',[$categoria->id,$producto->id])}}" class="waves-effect waves-light btn  red darken-4 center">Eliminar</a>
									</div>
									<div class="col s2" >
										<a href="#" class="waves-effect waves-light btn pink darken-4 center">Comprar</a>
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