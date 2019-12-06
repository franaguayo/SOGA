<div class="container">
    <a style="color:white !important;" class="navbar-brand" href="/">SOGA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a style="color:white !important;" class="nav-link" href="/">Inicio</a>
            </li>
            <?php if(auth()->user()->categoria): ?>
                <li class="nav-item">
                    <a style="color:white !important;" class="nav-link" id="home" href="<?php echo e(route('categorias.show', auth()->user()->categoria->id)); ?>" disabled="">Mi categoría</a>
                </li>
                <li class="nav-item">
                    <a style="color:white !important;" class="nav-link" id="evidencias" href="/evidencias" disabled="">Subir Evidencias</a>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a style="color:white !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo e(auth()->user()->nombre); ?>

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" style = "color:black !important;" href="<?php echo e(route('academico.editPerfil', auth()->user()->id)); ?>">Editar Perfil</a>
                    <?php if(auth()->user()->privilegio == 1): ?>
                            <a style="color:black !important;" class="dropdown-item" id="categorias" href="/categorias" disabled="">Manejo de Categorías</a>
                            <a style="color:black !important;" class="dropdown-item" id="categorias" href="/panelAdministrador" disabled="">Panel de Administrador</a>
                            <a style="color:black !important;" class="dropdown-item" href="/academicos">Manejo de Académicos</a>

                    <?php endif; ?>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button class="dropdown-item">Cerrar sesión</button>
                    </form>
                </div>
            </li>
        </ul>

    </div>
</div>
