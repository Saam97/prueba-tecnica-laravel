@if (Session::has('exito'))
    <div class="alerta alerta__exito">
        <p class="formulario__label">{{ Session::get('exito') }}</p>
    </div>
@endif

@if (Session::has('error'))
    <div class="alerta alerta__error">
        <p class="formulario__label">{{ Session::get('error') }}</p>
    </div>
@endif
