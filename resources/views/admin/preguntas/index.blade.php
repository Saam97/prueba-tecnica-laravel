@extends('layaouts.adminlayaout')
  
@section('content')

<h2 class="dashboard__heading"> {{$titulo}} </h2>

<div class="dashboard__contenedor">
    
    @if(!$preguntas->isEmpty())
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Nombre</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>

        <tbody class="table__tbody">
            @foreach($preguntas as $pregunta)
                <tr class="table__tr">
                    <td class="table__td">
                        {{ $pregunta->pregunta }}
                    </td>

                    <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="{{ route('pregunta.view', ['id' => $pregunta->id]) }}">
                            <i class="fa-solid fa-user-pen"></i>
                            Modificar
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-center">No hay Preguntas</p>
@endif


</div>


@endsection