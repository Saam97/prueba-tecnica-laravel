@extends('layaouts.adminlayaout')
  
@section('content')
<form class="formulario" enctype="multipart/form-data">
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


        @if(isset($usuario->imagen))
        <p class="formulario__texto">Imagen Actual</p>
        <div class="formulario__imagen">
            <img id="imagen-previa" src="{{ asset('storage'.'/img/'. $usuario->imagen)}}" alt="Imagen de Usuario">
        </div>
        @endif
    
    </fieldset>
    
    <fieldset class="formulario__fieldset">
        <legend class="formulario_legend">Preguntas</legend>
    
        @foreach ($usuario->respuestas as $respuesta)
            <div class="formulario__campo">
                <label for="respuesta_{{ $respuesta->pregunta->id }}" class="formulario__label">{{ $respuesta->pregunta->pregunta }}</label>
                <input 
                    type="text"
                    class="formulario__input"
                    placeholder="Tu respuesta"
                    id="respuesta_{{ $respuesta->pregunta->id }}"
                    name="respuesta_{{ $respuesta->pregunta->id }}"
                    value="{{ $respuesta->respuesta }}"
                >
                <!-- Manejo de errores -->
                @error('respuesta_' . $respuesta->pregunta->id)
                    <p class="h2 alerta alerta__error">{{ $message }}</p>
                @enderror
            </div>
        @endforeach    
    </fieldset>
    
</form>

@endsection

