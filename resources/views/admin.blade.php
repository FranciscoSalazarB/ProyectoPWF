@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3>Tablero</h3>
			</div>	
		</div>
	</div>
	<div class="container">
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Cargo</th>
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
					</tr>
					@else
					<tr>
						<th>{{$user->name}}</th>
						<th>{{$user->email}}</th>
						<th>{{$user->cargo}}</th>
						<th><a href="{{route('dashboard/editar_usuario',$user->id)}}" class="waves-effect waves-light btn pink darken-4 ">Editar</a></th>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	</div>
@endsection