
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title> {{ $titulo }} </title>
</head>
<body>
    <div class="registro-container">
        <div class="imagen-container">
            <img src="{{ asset('storage'.'/img/'. 'registro.png')}}" alt="Imagen de ejemplo">
        </div>
        <div class="formulario-container">
            <form method="POST" action="{{ route('create.user') }}" class="formulario_registro" enctype="multipart/form-data">
                @csrf            
                <fieldset class="formulario__fieldset">    
                    <div class="formulario__grupo">
                        <div class="formulario__campo_registro">
                            <label for="nombre" class="formulario__label">Nombre:</label>
                            <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Tu Nombre" value="{{ old('nombre', $usuario->nombre) }}">
                            @error('nombre')
                            <p class="h2 alerta alerta__error">{{ $message}}</p>
                            @enderror
                        </div>

                        <div class="formulario__campo_registro">
                            <label for="apellido" class="formulario__label">Apellido:</label>
                            <input type="text" class="formulario__input" id="apellido" name="apellido" placeholder="Tu apellido" value="{{old('apellido', $usuario->apellido)}}">
                            @error('apellido')
                            <p class="h2 alerta alerta__error">{{ $message}}</p>
                        @enderror
                        </div>
                    </div>
            
                    <div class="formulario__grupo">
                        <div class="formulario__campo_registro">
                            <label for="email" class="formulario__label">email:</label>
                            <input type="email" class="formulario__input" id="email" name="email" placeholder="Tu email" value="{{old('email', $usuario->email)}}">
                            @error('email')
                            <p class="h2 alerta alerta__error">{{ $message}}</p>
                        @enderror
                        </div>
                        <div class="formulario__campo_registro">
                            <label for="telefono" class="formulario__label">telefono:</label>
                            <input type="tel" class="formulario__input" id="telefono" name="telefono" placeholder="Tu telefono" value="{{old('telefono', $usuario->telefono)}}">
                            @error('telefono')
                            <p class="h2 alerta alerta__error">{{ $message}}</p>
                        @enderror
                        </div>
                    </div>
            
            
                    <div class="formulario__grupo">
                        <div class="formulario__campo_registro">
                            <label for="password" class="formulario__label">password</label>
                            <input type="password" class="formulario__input" placeholder="Tu password" id="password" name="password">
                            @error('password')
                            <p class="h2 alerta alerta__error">{{ $message}}</p>
                        @enderror
                        </div>
                        <div class="formulario__campo_registro">
                            <label for="password2" class="formulario__label">Repetir Password</label>
                            <input type="password" class="formulario__input" placeholder="Repetir Password" id="password2" name="password2">
                            @error('password2')
                            <p class="h2 alerta alerta__error">{{ $message}}</p>
                        @enderror
                        </div>
                    </div>
    
                    <div class="formulario__grupo">
                        <div class="formulario__campo_registro">
                            <label for="pais" class="formulario__label">pais:</label>
                            <input type="text" class="formulario__input" id="pais" name="pais" placeholder="Tu pais" value="{{old('pais', $usuario->pais)}}">
                            @error('pais')
                            <p class="h2 alerta alerta__error">{{ $message}}</p>
                        @enderror
                        </div>
                    </div>
                </fieldset>
    
                <fieldset class="formulario__fieldset">
                    @php $contador = 0; @endphp
                    @foreach ($preguntas as $pregunta)
                        @if ($contador % 2 == 0)
                            <div class="formulario__grupo">
                        @endif
                        <div class="formulario__campo_registro">
                            <label for="respuesta_{{ $pregunta->id }}" class="formulario__label">{{ $pregunta->pregunta }}</label>
                            <input type="text" class="formulario__input" placeholder="Tu respuesta" id="respuesta_{{ $pregunta->id }}" name="respuesta_{{ $pregunta->id }}" value="{{ old('respuesta_' . $pregunta->id) }}">
                            @error('respuesta_' . $pregunta->id)
                            <p class="h2 alerta alerta__error">{{ $message }}</p>
                            @enderror
                        </div>
                        @if ($contador % 2 != 0 || $loop->last)
                            </div>
                        @endif
                        @php $contador++; @endphp
                    @endforeach
                </fieldset>

                <div class="formulario__campo_registro">
                    <label for="imagen" class="formulario__label">Imagen:</label>
                    <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen" accept=".jpg, .jpeg, .png">
                    @error('imagen')
                    <p class="h2 alerta alerta__error">{{ $message}}</p>
                @enderror
                </div>
        
                @if(isset($usuario->imagen))
                <p class="formulario__texto">Imagen Actual</p>
                <div class="formulario__imagen">
                    <img id="imagen-previa" src="{{ asset('storage'.'/img/'. $usuario->imagen)}}" alt="Imagen de Usuario">
                </div>
                @endif

                <div class="g-recaptcha" data-sitekey="TU_CLAVE_DE_SITIO_RECAPTCHA"></div>
            
                <input type="submit" class="formulario__submit formulario__submit--registrar" value="Registrarse">

                <div class="acciones">
                    <a href="{{Route('create.index')}} " class="acciones__enlace">Registrarse</a>
                    <a href="{{Route('lost.index')}}" class="acciones__enlace">Olvidé mi Contraseña</a>
                </div>
            </form>
            
        </div>

        
    </div>
    

</body>
</html>

