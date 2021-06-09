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
			@if(!is_null($categoria))
				<h3>{{$categoria->nombre}}</h3>
			@else
				<h3>Esta categoría no existe</h3>
			@endif
			</div>	
		</div>
	</div>
	<div class="container">
		<div class="row z-depth-3 grey lighten-5" id="vista_productos">
			@auth
				@if(!is_null($categoria) and Auth::user()->cargo == 'Cliente')
					<a href="{{route('categorias/productos/crear',$categoria->id)}}" class="waves-effect waves-light btn pink darken-4 center" id="agregar_producto">Agregar nuevo producto</a>
				@endif
			@endauth
			<div class="col s12">
				<div class="container">
				@if(!is_null($categoria))
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
<<<<<<< HEAD
=======
									@auth
									@if(Auth::user()->cargo == 'Encargado')
									<div class="col s2" style="margin-bottom: 0; margin-top: 0">
										<a href="{{route('categorias/productos/consignar',[$categoria->id,$producto->id])}}" class="waves-effect waves-light btn purple darken-4 center">Consignar</a>
									</div>
									@else
									<div class="col s2">
										
									</div>
									@endif
									@if(Auth::user()->id == $producto->user_id)
									<div class="col s2">
										<a href="{{route('categorias/productos/editar',[$categoria->id,$producto->id])}}" class="waves-effect waves-light btn blue darken-4 center">Editar</a>
									</div>
									<div class="col s2">
										<a href="{{route('categorias/productos/eliminar',[$categoria->id,$producto->id])}}" class="waves-effect waves-light btn  red darken-4 center">Eliminar</a>
									</div>
									@else
									<div class="col s4"></div>
									@endif
									@endauth
									@guest
>>>>>>> 327f9b6a3d5fa52847dd0d6bc0ace5bf29b9742d
									<div class="col s6"></div>
									<div class="col s2" >
										<a href="{{route('producto',$producto->id)}}" class="waves-effect waves-light btn pink darken-4 center">Producto</a>
									</div>
								</div>
							</div>
						@endforeach
					@endif
				@else
					<h5>Favor de regresar</h5 >
				@endif
				</div>
			</div>
		</div>
	</div>
@endsection