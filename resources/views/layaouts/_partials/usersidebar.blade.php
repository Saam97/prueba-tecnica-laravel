<aside class="dashboard__sidebar">
    <nav class="dashboard__menu"> 
        <a href="{{ Route('user.index')}}" class="dashboard__enlace">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>

        <a href=" {{ Route('perfil.index')}} " class="dashboard__enlace">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Perfil
            </span>
        </a>

    </nav>
</aside>