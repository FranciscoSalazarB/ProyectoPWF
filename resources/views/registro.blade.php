@extends('layout')

@section('content')}
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h3>Registro</h3>
				</div>
            	<div class="col s12">
                @if(session('error'))
                    <h3>{{session('error')}}</h3>
                @endif
            </div>
			<form class="row" action="{{route('nuevo_usuario')}}" method="post" >
				@csrf
				<div class="col s12">
                	<div class="input-field">
                    	<input type="text" name="user"  required>
                    	<label for="user">Usuario</label>
                	</div>
            	</div>
            	<div class="col s12">
            		<div class="input-field">
            			<input type="email" name="email" required>
            			<label for="email">email</label>
            		</div>
            	</div>
            	<div class="col s12">
	            	<div class="input-field">
	                    <input type="password" name="pass" required>
	                    <label for="pass">Contraseña</label>
	                </div>
	            </div>
	            <div class="col s12">
	                <div class="input-field">
	                    <input type="password" name="pass_repeat" required>
	                    <label for="pass_repeat">Repetir ontraseña</label>
	                </div>
	            </div>
	            <div class="col s12">
	            	<div class="row">
	            		<br>
	            		<div class="col s12">
	            			<button class="waves-effect waves-light btn pink darken-4" type="submit">Registrarme</button>
	            		</div>
	            	</div>
	            </div>
			</form>
		</div>
@endsection