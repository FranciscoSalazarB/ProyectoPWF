@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<h3>Resultado de la búsqueda</h3>
			</div>	
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Nomre</th>
						<th>Descripción</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($productos as $producto)
					<tr>
						<th>{{$producto->nombre}}</th>
						<th>{{$producto->descripcion}}</th>
						<th><a href="{{route('producto',$producto->id)}}" class="waves-effect waves-light btn pink darken-4">Ver producto</a></th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection