@extends('layaouts.adminlayaout')
  
@section('content')
<div class="dashboard__formulario">

    <form method="POST" action="{{ route('preguntas.update', ['id' => $pregunta->id]) }}" class="formulario">
        {{-- @method('PUT') --}}
        @csrf
        @error('pregunta')
            <p class="h2 alerta alerta__error">{{$message}}</p>
        @enderror

        <fieldset class="formulario__fieldset">                  
            <div class="formulario__campo">
                <label for="pregunta" class="formulario__label">pregunta:</label>
                <input type="text"
                    class="formulario__input"
                    id="pregunta"
                    name="pregunta"
                    placeholder="Tu pregunta"
                    value="{{ old('pregunta', $pregunta->pregunta) }}"
                >
            </div>
        
        <input type="submit" class="formulario__submit formulario__submit--registrar" value="Guardar Cambios">
    </form>
    

</div>
@endsection