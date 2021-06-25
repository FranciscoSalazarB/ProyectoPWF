@extends('layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h3>Compras</h3>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<table>
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Estado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach(Auth::user()->compras as $compra)
						<tr>
							<th>{{$compra->producto->nombre}}</th>
							<th>{{$compra->confirmado}}</th>
							<th><a href="{{route('transaction',$compra->id)}}" class="waves-effect waves-light btn pink darken-4 center">Ver transacción</a></th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h3>Mis productos</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<table>
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Categoria</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach(Auth::user()->productos as $producto)
						<tr>
							<th>{{$producto->nombre}}</th>
							<th>{{$producto->categoria->nombre}}</th>
							<th><a href="{{route('producto',$producto->id)}}" class="waves-effect waves-light btn pink darken-4 center">Ver Producto</a></th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection