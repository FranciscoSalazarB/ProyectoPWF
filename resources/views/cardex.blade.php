@extends('layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s6">
				<h3>{{$producto->nombre}}</h3>
			</div>
			<div class="col s6">
				<h4>Categoria : {{$producto->categoria->nombre}}</h4>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<h4>Propietario : {{$producto->usuario->name}}</h4>
			</div>
			<div class="col s2">
				<h5>{{$producto->consignado? "Consignado" : "Sin Consignar"}}</h5>
			</div>
			<div class="col s4">
				<h5>Fecha de creación : {{$producto->created_at}}</h5>
			</div>
		</div>
		<div class="row">
			<div class="col s12"><h5>precio ${{$producto->precio}}</h5></div>
			<div class="col s12s"><h5>Descipción : {{$producto->descripcion}}</h5></div>
		</div>
	</div>
@endsection