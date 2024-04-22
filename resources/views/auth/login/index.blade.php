@extends('layaouts.layaout');
  
@section('content');

<main class="auth">
    <p class="auth__texto">Iniciar Sesion</p>
    
    <form action=" {{ route('login.user') }} " method="POST" class="formulario">

        @csrf
        @error('email')
            <p class="h2 alerta alerta__error">{{ $message }}</p>
        @enderror

        @error('password')
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

        <input type="submit" class="formulario__submit" value="Iniciar Sesion">
    </form>

    <div class="acciones">
        <a href="{{Route('create.index')}} " class="acciones__enlace">Registrarse</a>
        <a href="{{Route('lost.index')}}" class="acciones__enlace">Olvidé mi Contraseña</a>
    </div>

</main>

@endsection