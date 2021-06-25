@extends('layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s10"><h3>Transacción</h3></div>
			<div class="col s2"><p>Fecha : {{$transaction->created_at}}</p></div>
		</div>
		<div class="row">
			<div class="col s6"><h4>Vendedor : {{$transaction->producto->usuario->name}}</h4></div>
			<div class="col s6"><h4>Comprador : {{$transaction->comprador->name}}</h4></div>
		</div>
		<div class="row z-depth-3">
			<div class="col s4"><p>Producto : <a href="{{route('producto',$transaction->producto->id)}}" class="waves-effect waves-light btn pink darken-4 center">{{$transaction->producto->nombre}}</a></p></div>
			<div class="col s4"><p>Monto total : ${{$transaction->producto->precio}}</p></div>
			<div class="col s4"><p>Sin aceptar la transacción</p></div>
		</div>
		@if(Auth::user()->id == $transaction->comprador->id)
		@if($transaction->comprobante == '')
		<form class="row" action="{{route('transaction/comprobante',$transaction->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="col s12">
				<div class="input-field">
					<input type="file" name="comprobante">
				</div>
			</div>
			<div class="col s12">
				<button type="submit" class="waves-effect waves-light btn pink darken-4">Enviar comprobante de pago</button>
			</div>
		</form>
		@else
		<div class="row">
			<div class="col s12"><a href="{{route('transaction/entregado',$transaction->id)}}" class="waves-effect waves-light btn pink darken-4">Confirmar Entrega</a></div>
		</div>
		@endif
		@endif
		@if(Auth::user()->cargo == 'Contador')
		<div class="row">
			<div class="col s12"><a href="#" class="waves-effect waves-light btn pink darken-4">Confirmar compra</a></div>
		</div>
		@endif
	</div>
@endsection