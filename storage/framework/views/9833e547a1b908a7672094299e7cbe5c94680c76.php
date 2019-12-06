<!DOCTYPE html>

<?php $__env->startSection('content'); ?>
<style>
    .center-cropped {
        padding-top: 20px;
        width: 200px;
        height: 200px;

        display: block;
        margin: auto;
        
    }
    .center-embed {
        display: block;
        margin: auto;
    }
</style>
<div class="container">
    <title> Evidencias </title>
    <h1 class="my-4" style="text-align: center; padding-top: 10px">Lista de evidencias</h1>
    
    <?php if($evidencias->count() > 0): ?>
        <div class="row" >
        <?php $__currentLoopData = $evidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100" style="background-color: transparent">
                    
                    <?php if($evidencia->tipo_archivo == "pdf"): ?>
                        <embed class="center-embed" src="archivos/pdf_preview.png" width="80px" height="80px" />
                    <?php else: ?>
                        <embed class="center-embed" src="<?php echo e($evidencia->archivo_bin); ?>" width="80px" height="80px" />
                    <?php endif; ?>
                    
                    
                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="evidencias/<?php echo e($evidencia->id); ?>"><p style="text-align: center; color:black;"><?php echo e($evidencia->nombre_archivo); ?></p></a>
                        </h6>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <form action="<?php echo e(route('evidencias.destroy', $evidencia->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" style="background: linear-gradient(to bottom right, #800000 1%, #cc0000 100%);" class="btn btn-danger btn-sm btn-block" 
                                        onclick="return confirm('¿Está seguro de borrar la evidencia?')" >
                                        <span class="fa fa-trash"></span>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <a style="float:right; color:white !important; border-color: black" class="btn btn-info btn-sm btn-block" href="/evidencias/<?php echo e($evidencia->id); ?>/edit">
                                    <span class="fa fa-edit"></span>
                                    Editar
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="evidencias/create" class="btn" style="float:right; color:white !important; border-color: black; background: linear-gradient(to bottom right, #000000 1%, #999966 101%);">Crear nueva evidencia</a>
    <?php else: ?>
        <br>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h4>No hay evidencias registradas.</h4>
            </div>
            <div class="col-lg-6 col-md-6">
                <a href="evidencias/create" class="btn" style="float:right; color:white !important; background-color: grey; border-color: black">Crear nueva evidencia</a>
            </div>
        </div>
    
    <?php endif; ?>
    
    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>
</div>    
    
    <?php $__env->stopSection(); ?>
    
    



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>