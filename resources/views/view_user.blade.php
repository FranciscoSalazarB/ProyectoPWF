@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3>Usuario : {{$user->name}}</h3>
			</div>	
		</div>
		<div class="row">
			<div class="col s12">
				<h5>Dado de alta : {{$user->created_at}}</h5>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h4>Productos</h4>
			</div>
		</div>
		<table>
			<thead>
				<tr>
					<th>nombre</th>
					<th>categoria</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				@foreach($user->productos as $producto)
				<tr>
					<th>{{$producto->nombre}}</th>
					<th>{{$producto->categoria->nombre}}</th>
					<th>{{$producto->consignado? "Consigando" : "Sin Consignar"}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection