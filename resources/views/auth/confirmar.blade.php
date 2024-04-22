@extends('layaouts.layaout')

@section('header')
    
@section('content')

<main class="auth">

    <h2 class="auth__heading"> {{$titulo}} </h2>

    <div class="acciones--centrar">
        <a href="{{ Route('login.index') }}" class="acciones__enlace">Iniciar Sesión</a>
    </div>


</main>

@endsection


