@extends('layaouts.adminlayaout')
  
@section('content')

<h2 class="dashboard__heading"> {{$titulo}} </h2>

<div class="dashboard__contenedor">
    
    @if(!$usuarios->isEmpty())
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Nombre</th>
                <th scope="col" class="table__th">Ubicacion</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>

        <tbody class="table__tbody">
            @foreach($usuarios as $usuario)
                <tr class="table__tr">
                    <td class="table__td">
                        {{ $usuario->nombre }} {{ $usuario->apellido }}
                    </td>

                    <td class="table__td">
                        {{ $usuario->pais }}
                    </td>

                    <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="{{ route('admin-usuarios-id', ['id' => $usuario->id]) }}">
                            <i class="fa-solid fa-user-pen"></i>
                            Ver
                        </a>

                        <form class="table__formulario">
                            <button class="table__accion table__accion--eliminar" type="submit">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-center">No hay Usuarios Aun</p>
@endif


</div>


@endsection