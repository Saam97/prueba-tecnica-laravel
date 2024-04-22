@extends('layaouts.layaout')

@section('header')
    
@section('content')

<main class="auth">
    <h2 class="auth__heading"> {{$titulo}} </h2>
    
    
    @if($token_valido)

    <p class="auth__texto">Coloca tu Nuevo Password</p>
    <form method="POST" action="{{ route('recovery.newpassword', $token)}}" class="formulario">
        @method('PUT')
        @csrf 

        @error('password')
            <p class="h2 alerta alerta__error">{{ $message }}</p>
        @enderror

        <div class="formulario__campo">
            <label for="password" class="formulario__label">password</label>
            <input 
                type="password"
                class="formulario__input"
                placeholder="Tu password"
                id="password"
                name="password"
            >
        </div>

        <div class="formulario__campo">
            <label for="password_confirmation" class="formulario__label">Confirmar Contraseña</label>
            <input 
                type="password"
                class="formulario__input"
                placeholder="Confirma tu contraseña"
                id="password_confirmation"
                name="password_confirmation"
                required
            >
        </div>

        <input type="submit" class="formulario__submit" value="Guardar Password">
    </form>

   

    <div class="acciones">
        <a href="{{Route('create.index')}}" class="acciones__enlace">Crear Una Cuenta</a>
        <a href=" {{ Route('login.index')}}" class="acciones__enlace">Iniciar Sesion</a>
    </div>
    @endif
</main>

@endsection