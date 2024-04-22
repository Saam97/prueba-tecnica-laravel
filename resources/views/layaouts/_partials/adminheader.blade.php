<header class="dashboard__header">

    <div class="dashboard__header-grid">
        <a href=" {{ Route('admin-index') }} ">
            <h2 class="dashboard__logo">
                &#60;{{ Auth::user()->nombre }}  {{ Auth::user()->apellido }} />
            </h2>
        </a>

        <nav class="dashboard__nav">
            <form action=" {{ Route('logout')}} " method="POST" class="dashboard__form">
                @csrf
                <input type="submit" value="cerrar sesion" class="dashboard__submit--logout">
            </form>
        </nav>
    </div>
</header>