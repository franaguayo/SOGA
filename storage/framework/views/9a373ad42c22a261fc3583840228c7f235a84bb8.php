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
    <title> <?php echo e($plan->nombre); ?> </title>
    <div class="row text-center">
        <div class="col-lg-12 col-md-12">
            <h1>Plan de acción: <?php echo e($plan->nombre); ?></h1>
            <h6><i> Como parte de la recomendación <?php echo e($plan->categoria->nombre); ?> </i><h6>
        </div>
    </div>
    <?php if(auth()->user()->privilegio == 1): ?> 
        <a style="float:right; color:white !important;" class="btn btn-success btn-md" href="<?php echo e(route('plan.reporte', $plan->id)); ?>">
            <span class="fa fa-download"></span> 
            Generar reporte
        </a>
        <br><br>
    <?php endif; ?> 
    <hr>
    <br><br>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h3>Descripción</h3>
            <p class="descripcion-texto"><?php echo e($plan->descripcion); ?></p>
        </div>
    </div>
    <?php if($plan->criterio != null): ?>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h3>Criterio de hecho</h3>
                <p class="descripcion-texto"><?php echo e($plan->criterio); ?></p>
            </div>
        </div>
    <?php else: ?> 
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h3>Este plan de acción no tiene criterio de hecho</h3>
                
            </div>
        </div>
    <?php endif; ?>
    
    
    <br>
    <hr>
    <div class="row text-center">
        <div class="col-lg-12 col-md-12">
            <h4>Evidencias registradas:</h4>
        </div>
    </div>

    
        
    <?php if($plan->evidencias->count() > 0): ?>
        <div class="row" >
            
            <?php $__currentLoopData = $plan->evidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100" style="background-color: transparent">
                        
                        <?php if($evidencia->tipo_archivo == "pdf"): ?>
                            <embed class="center-embed" src="/archivos/pdf_preview.png" width="80px" height="80px" />
                        <?php else: ?>
                            <embed class="center-embed" src="<?php echo e($evidencia->archivo_bin); ?>" width="80px" height="80px" />
                        <?php endif; ?>                        
                        
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="/evidencias/<?php echo e($evidencia->id); ?>"><p style="text-align: center; color:black;"><?php echo e($evidencia->nombre_archivo); ?></p></a>
                            </h6>
                            <?php if(auth()->user()->id == $plan->recomendacion->categoria->academico_id): ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <form action="<?php echo e(route('evidencias.destroy', $evidencia->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm btn-block" 
                                                onclick="return confirm('¿Está seguro de borrar la evidencia?')" >
                                                <span class="fa fa-trash"></span>
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <a style="float:right; color:white !important;" class="btn btn-primary btn-sm btn-block" href="<?php echo e(route('evidencias.edit', $evidencia->id)); ?>">
                                            <span class="fa fa-edit"></span>
                                            Editar
                                        </a>
                                        
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <br>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h4>No hay evidencias registradas.</h4>
            </div>
            
            
        </div>
    
    <?php endif; ?>

    <?php if(auth()->user()->id == $plan->recomendacion->categoria->academico_id): ?>        
        <a href="<?php echo e(route('evidencias.create', ['id' => $plan->id])); ?>" class="btn" style="float:right; color:white !important; background-color: grey; border-color: black">Crear nueva evidencia</a>
    <?php endif; ?>
    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>