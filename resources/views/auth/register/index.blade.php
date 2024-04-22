@extends('layaouts.layaout')

@section('header')
    
@section('content')

<div class="dashboard__formulario">

    <form method="POST" action="{{ route('create.user') }}" class="formulario" enctype="multipart/form-data">
        @csrf
        @error('nombre')
            <p class="h2 alerta alerta__error">{{ $message}}</p>
        @enderror

        <fieldset class="formulario__fieldset">
            <legend class="formulario_legend">Informacion Personal</legend>
        
            <div class="formulario__campo">
                <label for="nombre" class="formulario__label">Nombre:</label>
                <input type="text"
                    class="formulario__input"
                    id="nombre"
                    name="nombre"
                    placeholder="Tu Nombre"
                    value="{{ old('nombre', $usuario->nombre) }}"
                    
                >
            </div>
        
            @error('apellido')
            <p class="h2 alerta alerta__error">{{ $message}}</p>
            @enderror
            <div class="formulario__campo">
                <label for="apellido" class="formulario__label">apellido:</label>
                <input type="text"
                    class="formulario__input"
                    id="apellido"
                    name="apellido"
                    placeholder="Tu apellido"
                    value="{{old('apellido', $usuario->apellido)}}"
                    
                >
            </div>
            
            @error('email')
            <p class="h2 alerta alerta__error">{{ $message}}</p>
            @enderror
            <div class="formulario__campo">
                <label for="email" class="formulario__label">email:</label>
                <input type="email"
                    class="formulario__input"
                    id="email"
                    name="email"
                    placeholder="Tu email"
                    value="{{old('email', $usuario->email)}}"
                    
                >
            </div>

            @error('telefono')
            <p class="h2 alerta alerta__error">{{ $message}}</p>
            @enderror
            <div class="formulario__campo">
                <label for="telefono" class="formulario__label">telefono:</label>
                <input type="tel"
                    class="formulario__input"
                    id="telefono"
                    name="telefono"
                    placeholder="Tu telefono"
                    value="{{old('telefono', $usuario->telefono)}}"
                    
                    >
            </div>
            
            @error('pais')
            <p class="h2 alerta alerta__error">{{ $message}}</p>
            @enderror
            <div class="formulario__campo">
                <label for="pais" class="formulario__label">pais:</label>
                <input type="text"
                    class="formulario__input"
                    id="pais"
                    name="pais"
                    placeholder="Tu pais"
                    value="{{old('pais', $usuario->pais)}}"
                    
                >
            </div>

            @error('password')
            <p class="h2 alerta alerta__error">{{ $message}}</p>
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

            @error('password2')
            <p class="h2 alerta alerta__error">{{ $message}}</p>
            @enderror
            <div class="formulario__campo">
                <label for="password2" class="formulario__label">Repetir Password</label>
                <input 
                    type="password"
                    class="formulario__input"
                    placeholder="Repetir Password"
                    id="password2"
                    name="password2"
                    
                >
            </div>
        
            <div class="formulario__campo">
                <label for="imagen" class="formulario__label">Imagen:</label>
                <input type="file"
                    class="formulario__input formulario__input--file"
                    id="imagen"
                    name="imagen"
                    accept=".jpg, .jpeg, .png"
                >
            </div>

            @if(isset($usuario->imagen))
            <p class="formulario__texto">Imagen Actual</p>
            <div class="formulario__imagen">
                <img id="imagen-previa" src="{{ asset('storage'.'/img/'. $usuario->imagen)}}" alt="Imagen de Usuario">
            </div>
            @endif
        
        </fieldset>

        <fieldset class="formulario__fieldset">
            <legend class="formulario_legend">Preguntas</legend>

            @foreach ($preguntas as $pregunta)
                <div class="formulario__campo">
                    <label for="respuesta_{{ $pregunta->id }}" class="formulario__label">{{ $pregunta->pregunta }}</label>
                    <input 
                        type="text"
                        class="formulario__input"
                        placeholder="Tu respuesta"
                        id="respuesta_{{ $pregunta->id }}"
                        name="respuesta_{{ $pregunta->id }}"
                        value="{{ old('respuesta_' . $pregunta->id) }}"
                    >

                    @error('respuesta_' . $pregunta->id)
                        <p class="h2 alerta alerta__error">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </fieldset>
        
        <input type="submit" class="formulario__submit formulario__submit--registrar" value="Registrarse">
    </form>
    

</div>

@endsection


