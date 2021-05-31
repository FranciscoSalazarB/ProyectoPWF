@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h4>Editar usuario : {{$user->name}}</h4>
			</div>	
			<div class="col s12">	
				<h5>Fecha de creación : {{$user->created_at}}</h5>
			</div>	
		</div>
		<form class="row center" action="{{route('dashboard/editar_usuario',$user->id)}}" method="post">
			@csrf
			<div class="col s12">
				<div class="input-field">
					<input type="text" name="name" required value="{{$user->name}}">
					<label for="nombre">Nuevo Nombre</label>
				</div>
				<div class="input-field">
					<input type="text" name="email" required value="{{$user->email}}">
					<label for="email">Nuevo Correo</label>
				</div>
				<div class="input-field">
					<input type="password" name="pass">
					<label for="email">Nueva Contraseña</label>
				</div>
			</div>
			<div class="col s1">
				<p>
					<label>
						<input type="radio" name="grup1" value="Encargado"  class="radio">
						<span>Encargado</span>
					</label>
	           	</p>
	           	<p>
	           		<label>
	           			<input type="radio" name="grup1" value="Cliente" class="radio">
	           			<span>Cliente</span>
	           		</label>
	           	</p>
	           	<p>
	           		<label>
	           			<input type="radio" name="grup1" value="Contador" class="radio">
	           			<span>Contador</span>
	           		</label>
	           	</p>
	           	<p>
	           		<label>
	           			<input type="radio" name="grup1" value="Supervisor" class="radio">
	           			<span>Supervisor</span>
	           		</label>
	           	</p>
			</div>
			<div class="col s11">
				<button type="submit" class="waves-effect waves-light btn pink darken-4">Editar</button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		const usuario = @json($user);
		const grup1 = document.getElementsByName('grup1');
		grup1.forEach(function (elemento) {
			if (elemento.value == usuario.cargo) {
				elemento.checked = true;
			}
		});
		
		
	</script>
@endsection