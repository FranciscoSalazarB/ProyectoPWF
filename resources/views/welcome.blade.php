@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Bienvenido</h3>
                <p>{{Auth::user()}}</p>
            </div>
            <div class="col s12">
                @if(session('error'))
                    <h3>{{session('error')}}</h3>
                @endif
            </div>
        </div>
        <form class="row" action="{{route('validar')}}" method="post">
            @csrf
            <div class="col s12">
                <div class="input-field">
                    <input type="email" name="email" required>
                    <label for="user">Email</label>
                </div>
            </div>
            <div class="col s12">
                <div class="input-field">
                    <input type="password" name="pass" required>
                    <label for="pass">Contraseña</label>
                </div>
            </div>
            <div class="col s4">
                <button class="waves-effect waves-light btn pink darken-4" type="submit">Entrar</button>
            </div>
            <div class="col s4">
                <a href="{{route('registro')}}" class="waves-effect waves-light btn pink darken-4">Registrase</a>
            </div>
            <div class="col s4">
                <a href="{{route('categorias')}}" class="waves-effect waves-light btn pink darken-4">Entrar como anónimo</a>
            </div>
        </form>
    </div>
@endsection