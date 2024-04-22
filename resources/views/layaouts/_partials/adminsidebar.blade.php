<aside class="dashboard__sidebar">
    <nav class="dashboard__menu"> 
        <a href="{{ Route('admin-index')}}" class="dashboard__enlace">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>

        <a href=" {{ Route('admin-usuarios')}} " class="dashboard__enlace">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Usuarios
            </span>
        </a>

        <a href="{{ Route('preguntas.index')}} " class="dashboard__enlace">
            <i class="fa-regular fa-calendar dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Preguntas
            </span>
        </a>

    </nav>
</aside>