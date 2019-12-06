    <!-- Navigation -->
    

<?php $__env->startSection('content'); ?>

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Control de planes de acción</h1>
                </div>
            </div>
            <?php if($planes->count() > 0): ?>
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Recomendación</th>
                            <th>Plan de acción</th>
                            <th>Fecha de término</th>
                            <th>Completado</th>
                            <th>Generar reporte del plan</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $collection = $planesAgrupados;
                    ?>
                    
                    <tbody>

                        <tr>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($categoria->planes()->count()>0): ?>
                            
                                <td rowspan="<?php echo e($categoria->planes()->count()); ?>">
                                        <a href="<?php echo e(route('categorias.show',$categoria->id)); ?>"><?php echo e($categoria->nombre); ?></a>
                                </td>
                                <?php $__currentLoopData = $categoria->recomendaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomendacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <?php if(!$recomendacion->planes->isEmpty()): ?>
                                        <td rowspan="<?php echo e(count($recomendacion->planes)); ?>">
                                            <a href="<?php echo e(route('recomendacion.show',$recomendacion->id)); ?>"><i><?php echo e($recomendacion->nombre); ?></i></a>
                                        </td>
                                        <?php $__currentLoopData = $recomendacion->planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td ><a href="<?php echo e(route('plan.show',$plan->id)); ?>"><?php echo e($plan->nombre); ?></a></td>
                                        <td><?php echo e($plan->fecha_termino); ?></td>
                                        <?php if($plan->completado== 1): ?>
                                            <td>Si</td>
                                        <?php else: ?>
                                            <td>No</td>
                                        <?php endif; ?>
                                        
                                        <td>
                                            <div class="col-lg-3 center-block" style="position: relative;text-align:center;left: 30%;">
                                                <a style="color:white !important;" class="btn btn-success btn-sm" href="<?php echo e(route('plan.reporte', $plan->id)); ?>">
                                                    <span class="fa fa-download"></span> 
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                        

                </table>
            <?php else: ?>
                <h3>No hay planes de acción</h3>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('panelAdministrador.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>