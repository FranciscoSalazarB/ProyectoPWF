@extends('layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s8"><h3>Transacción</h3></div>
			<div class="col s4"><p>Fecha : {{$transaction->created_at}}</p></div>
		</div>
		<div class="row">
			<div class="col s6"><h4>Vendedor : {{$transaction->producto->usuario->name}}</h4></div>
			<div class="col s6"><h4>Comprador : {{$transaction->comprador->name}}</h4></div>
		</div>
		<div class="row">
			<div class="col s4"><p>Producto : {{$transaction->producto->nombre}}</p></div>
			<div class="col s4"><p>Monto total : ${{$transaction->producto->precio}}</p></div>
			<div class="col s4"><p>Sin aceptar la transacción</p></div>
		</div>
		<form class="row" action="#" method="post">
			@csrf
			<div class="col s9">
				<div class="input-field">
					<input type="file" name="comprobante">
				</div>
			</div>
			<div class="col s3">
				<button type="submit">Enviar comprobante de pago</button>
			</div>
		</form>
		<div class="row">
			<div class="col s12"><a href="#">Confirmar Entrega</a></div>
		</div>
		<div class="row">
			<div class="col s12"><a href="#">Confirmar compra</a></div>
		</div>
	</div>
@endsection