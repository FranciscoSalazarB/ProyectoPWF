@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h4>Editar usuario : {{Auth::user()->email}}</h4>
			</div>	
		</div>
		<form class="row" action="{{route('editar_usuario',Auth::user()->id)}}" method="post">
			@csrf
				<div class="col s12">
                	<div class="input-field">
                    	<input type="text" name="user"  required value="{{Auth::user()->name}}">
                    	<label for="user">Nuevo nombre</label>
                	</div>
            	</div>
            	<div class="col s12">
	            	<div class="input-field">
	                    <input type="password" name="pass">
	                    <label for="pass">Nueva contraseña</label>
	                </div>
	            </div>
	            <div class="col s12">
	            	<button type="submit" class="waves-effect waves-light btn pink darken-4">Guardar Cambios</button>
	            </div>
		</form>
	</div>
@endsection