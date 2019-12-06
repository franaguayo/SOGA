<div class="container">
    <a style="color:white;" class="navbar-brand" href="/">KIM CONAICdashian</a>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
    </button>

    <!-- Top Navigation: Left Menu -->
    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li class="nav-item">
            <a style="color:white;" class="nav-link" href="/"> Inicio</a>
        </li>
        <?php if(auth()->user()->categoria): ?>
            <li class="nav-item">
                <a style="color:white;" class="nav-link" id="home" href="<?php echo e(route('categorias.show', auth()->user()->categoria->id)); ?>" >Mi categoría</a>
            </li>
            <li class="nav-item">
                <a style="color:white;" class="nav-link" id="evidencias" href="/evidencias" >Subir Evidencias</a>
            </li>
        <?php endif; ?>
    </ul>

    <!-- Top Navigation: Right Menu -->
    <ul class="nav navbar-right navbar-top-links">



        <li class="dropdown">
            <a style="color:white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo e(auth()->user()->nombre); ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <a class="dropdown-item" style = "color:black !important;" href="<?php echo e(route('academico.editPerfil', auth()->user()->id)); ?>">Editar Perfil</a>
                <?php if(auth()->user()->privilegio == 1): ?>
                    <a style="color:black !important;" class="dropdown-item" id="categorias" href="/categorias" disabled="">Manejo de Categorías</a>
                    <a style="color:black !important;" class="dropdown-item" id="categorias" href="/panelAdministrador" disabled="">Panel de Administrador</a>
                    <a style="color:black !important;" class="dropdown-item" href="/academicos">Manejo de Académicos</a>
                <?php endif; ?>
                <li class="divider"></li>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button class="dropdown-item">Cerrar sesión</button>
                </form>
            </ul>
        </li>
    </ul>
</div>


    <!-- Sidebar -->
    <div style="margin-top: 1px;" class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                                <span class="input-group-btn">
                                    <a href="/recomendacionesAdministrador" style="background-color:#286090 !important;" class="btn btn-primary btn-xs btn-block" type="button">
                                        Recomendaciones
                                    </a>
                                </span>
                            
                        </div> 
                        <br>
                        <div class="input-group custom-search-form">
    
                                <span class="input-group-btn">
                                    <a href="panelAdministrador" style="background-color:#286090 !important;" class="btn btn-primary btn-xs btn-block" type="button">
                                        Planes de acción
                                    </a>
                                </span>
                        </div>
                </li>
                
                <?php if($categorias->count() > 0): ?>
                <br>
                    <li>
                        <p style="text-align: center;"> Categorías: </p>
                    </li>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('categorias.show',$categoria->id)); ?>" class="active"><i class="fa fa fa-book fa-fw"></i> <?php echo e($categoria->nombre); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <br>
                    <li>
                        <p style="text-align: center;">No hay categorías disponibles</p>
                    </li>
                <?php endif; ?>
                
            </ul>

        </div>
    </div>

