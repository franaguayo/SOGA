<!DOCTYPE html>

<?php $__env->startSection('content'); ?>
    <div class="container">
    <br><br>
        <h2 style="text-align:center"> Reporte del plan de acción: <?php echo e($plan->nombre); ?> </h2>
        <br>
        <table style="height: 30%;">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Perteneciente a la recomendación</th>
                    <th> Categoría </th>
                    <th> Estado </th>
                    <th> Fecha de término </th>
                </tr>
            </thead>
            <tr>
                <td> <?php echo e($plan->descripcion); ?></td>
                <td> <?php echo e($plan->recomendacion->nombre); ?> </td>
                <td> <?php echo e($plan->categoria->nombre); ?> </td>
                <?php if($plan->completado == 0): ?>
                    <td> En progreso </td>
                <?php else: ?> 
                    <td> Completado </td>
                <?php endif; ?>
                <td> <?php echo e($plan->fecha_termino); ?></td>
            </tr>
        </table>
    </div>
    <div class="container">
        <h3 style="text-align:center"> Evidencias </h3>
        <table style="width:100%; height:30%">
            <thead>
                <tr>
                    <th>Nombre de la evidencia </th>
                    <th>Tipo de archivo</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $plan->evidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td> <?php echo e($evidencia->nombre_archivo); ?></td>
                <td> <?php echo e($evidencia->tipo_archivo); ?> </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <?php $__currentLoopData = $plan->evidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($evidencia->tipo_archivo == "pdf"): ?>
        <?php else: ?>
            <h3> Nombre de la evidencia: <?php echo e($evidencia->nombre_archivo); ?></h3> 
            <img src="<?php echo e(ltrim($evidencia->archivo_bin, $evidencia->archivo_bin[0])); ?>" width="60%" height="90%" style="padding-bottom: 20px;">
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.reporte', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>