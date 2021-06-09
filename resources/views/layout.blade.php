<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<title>PWF</title>
</head>
<body>
	<nav>
		<div class="nav-wrapper  pink darken-4">
			<a href="#" class="brand-logo">ProgramaciónWebConFrameworks</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				@auth
					<li><a href="#">{{Auth::user()->name}}</a></li>
					<li><a href="{{route('salir')}}">Salir</a></li>
					@if(Auth::user()->cargo == 'Supervisor' and Route::currentRouteName() != 'dashboard')
						<li><a href="{{route('dashboard')}}">Dashboard</a></li>
					@endif
					@if(Route::currentRouteName() != 'mis_productos' and Auth::user()->cargo == 'Cliente')
						<li><a href="{{route('mis_productos')}}">Mis productos</a></li>
					@endif
					@if(Route::currentRouteName() != 'no_consignados' and Auth::user()->cargo == 'Encargado')
						<li><a href="{{route('no_consignados')}}">Consignar</a></li>
					@endif
					@if(Route::currentRouteName() != 'categorias')
						<li><a href="{{route('categorias')}}">Categorías</a></li>
					@endif
				@else
					<li><a href="#">Anónimo</a></li>
					@if(Route::currentRouteName() != '/')
						<li><a href="{{route('/')}}">Login</a></li>
					@endif
					@if(Route::currentRouteName() != 'categorias')
						<li><a href="{{route('categorias')}}">Categorías</a></li>
					@endif
				@endauth
			</ul>
		</div>
	</nav>
	<div>
		@yield('content')
	</div>
</body>
</html>