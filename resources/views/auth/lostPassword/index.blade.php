@extends('layaouts.layaout')

@section('header')
    
@section('content')


<main class="auth">
    <h2 class="auth__heading"> {{$titulo}}</h2>
    <p class="auth__texto">Recuperar Cuenta</p>
    

    <form method="POST" action="{{ Route('lost.recovery') }}" class="formulario">
        @csrf
        @error('email')
            <p class="h2 alerta alerta__error">{{ $message }}</p>
        @enderror

        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input 
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Enviar Instrucciones">
    </form>

    <div class="acciones">
        <a href="{{Route('login.index')}} " class="acciones__enlace">Registrarse</a>
        <a href="{{Route('create.index')}}" class="acciones__enlace">Crear Una Cuenta</a>
    </div>

</main>

@endsection