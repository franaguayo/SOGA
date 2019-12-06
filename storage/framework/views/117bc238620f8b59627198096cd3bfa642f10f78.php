<!DOCTYPE html>

<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <title> Inicio </title>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body" >
                <div class="container">

                    <!-- Page Heading -->
                    <h1 class="my-4" style="text-align: center">Lista de categorías </small></h1>
                    <!-- Page Heading -->
                    <hr style="border-top: 3px solid rgba(0, 0, 0, 0.3);">
                    <div class="row">
                        <?php if($academico->categoria): ?>
                                          <a class="btn btn-default button" href="categorias/<?php echo e($academico->categoria->id); ?>"><?php echo e($academico->categoria->nombre); ?></a>
                        <?php endif; ?>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($academico->categoria != $categoria): ?>
                                                <a class="btn btn-default button" href="categorias/<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.container -->
            </div>
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>