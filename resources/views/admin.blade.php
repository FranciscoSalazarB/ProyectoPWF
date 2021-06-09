@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3>Tablero</h3>
			</div>	
		</div>
		<div class="row">
			<div class="col s6"><h5>Cantidad de usuarios : {{count($usuarios)}}</h5></div>
			<div class="col s6"><h5>Cantidad de productos : {{count($productos)}}</h5></div>
		</div>
	</div>
	<div class="container">
		<a class="waves-effect waves-light btn pink darken-4 center" > Agregar usuario</a>
		<h4>Usuarios</h4>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Cargo</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $user)
					@if($user->name == Auth::user()->name)
					<tr class="pink darken-4 white-text">
						<th>YO</th>
						<th>{{$user->email}}</th>
						<th>{{$user->cargo}}</th>
						<th><a href="{{route('dashboard/editar_usuario',$user->id)}}" class="waves-effect waves-light btn white black-text ">Editar</a></th>
						<th><a href="{{route('dashboard/ver_user',$user->id)}}" class="waves-effect waves-light btn white black-text ">Ver</a></th>
					</tr>
					@else
					<tr>
						<th>{{$user->name}}</th>
						<th>{{$user->email}}</th>
						<th>{{$user->cargo}}</th>
						<th><a href="{{route('dashboard/editar_usuario',$user->id)}}" class="waves-effect waves-light btn pink darken-4 ">Editar</a></th>
						<th><a href="{{route('dashboard/ver_user',$user->id)}}" class="waves-effect waves-light btn pink darken-4 ">Ver</a></th>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	</div>
	<br><br><br><br>
	<div class="container">
		<h4>Productos</h4>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Categoría</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($productos as $producto)
				<tr>
					<th>{{$producto->nombre}}</th>
					<th>{{$producto->categoria->nombre}}</th>
					<th><a href="{{route('cardex',$producto->id)}}">Cardex</a></th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection