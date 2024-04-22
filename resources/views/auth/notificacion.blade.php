@if ($tipo === 'registro')
<html>
    <body>
        <p>Hola, {{$nombre}},</p>
        <p>Para poder continuar, debes confirmar tu cuenta.</p>
        <p>Correo electrónico: {{$email}}</p>
        <p>Para hacer eso, debes hacer clic en el siguiente enlace:</p>
        <p><a href="{{ route('user-confirmar', $token ) }}"> ->CONFIRMAR CUENTA <- </a></p>
        <p>Si no solicitaste una cuenta, por favor ignora este mensaje.</p>
    </body>
</html>
   
@else
<html>
    <body>
        <p>Hola, {{$nombre}},</p>
        <p>REESTABLECE TU PASSWORD.</p>
        <p>Para hacer eso, debes hacer clic en el siguiente enlace:</p>
        <p><a href="{{ route('recovery.index', ['token' => $token]) }}"> -> REESTABLECER CUENTA <-</a></p>
        <p>Si no solicitaste una cuenta, por favor ignora este mensaje.</p>
    </body>
</html>
@endif




