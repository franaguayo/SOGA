<?php $__env->startSection('content'); ?>
    <title> <?php echo e($recomendacion->nombre); ?> </title>
    <div class="container">
        
        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h1>Recomendación: <?php echo e($recomendacion->nombre); ?></h1>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h6>Esta recomendación pertenece a la categoría: <?php echo e($recomendacion->categoria->nombre); ?></h6>
            </div>
        </div>
        <?php if(auth()->user()->privilegio == 1): ?> 
            <a style="float:right; color:white !important;" class="btn btn-success btn-md" href="<?php echo e(route('recomendacion.reporte', $recomendacion->id)); ?>">
                <span class="fa fa-download"></span> 
                Generar reporte
            </a>
        <?php endif; ?>
        <br>
        <hr>

        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h3>Descripción</h3>
                <p class="descripcion-texto"><?php echo e($recomendacion->descripcion); ?></p>
            </div>
        </div>
        <br>

        <?php if(count($planes)>0): ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Plan</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <?php if($recomendacion->categoria->academico_id == auth()->user()->id): ?>
                            <th scope="col">Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a  href="/plan/<?php echo e($plan->id); ?>" ><?php echo e($plan->nombre); ?></a></td>
                            <?php if( $plan->completado == 1): ?>
                                <td>Completado.</td>
                            <?php else: ?>
                                <td>En progreso.</td>
                            <?php endif; ?>                            
                            <td><?php echo e($plan->fecha_termino); ?></td>
                            <?php if($recomendacion->categoria->academico_id == auth()->user()->id): ?>
                            <td>
                                <div class="container">
                                    <br>
                                    <div class="row">                                                                
                                        <div class="col-sm-6 text-center">
                                            <form action="<?php echo e(route('plan.destroy',$plan->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Quiere borrar el plan de acción: <?php echo e($plan->nombre); ?>?')" >
                                                            Borrar <span class="fa fa-trash"></span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-sm-6 text-center">
                                            <a style="color:white !important;" class="btn btn-info btn-sm" href="/plan/<?php echo e($plan->id); ?>/edit">Editar <span class="fa fa-pencil"></span></a> 
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay planes para esta recommendación.</p>
        <?php endif; ?>

        <br>

        <?php if(auth()->user()->privilegio == 1): ?> 
            <div class="row">
                <div class="col-lg-12"> 
                    <center>
                        <form action="<?php echo e(route('recomendacion.destroy',$recomendacion->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Quiere borrar la recomendación: <?php echo e($recomendacion->nombre); ?>?')" >
                                Borrar recomendación <span class="fa fa-trash"></span>
                            </button>
                            <a style="color:white !important;" class="btn btn-info btn-sm" href="/recomendacion/<?php echo e($recomendacion->id); ?>/edit">Editar recomendación <span class="fa fa-pencil"></span></a>
                        </form>
                        
                    </center>  
                </div>
            </div>
        <?php endif; ?>
        <?php if(auth()->user()->categoria != null): ?>
            <?php if(auth()->user()->categoria->id == $recomendacion->categoria->id): ?>
                <center>
                    <form action="<?php echo e(route('plan.create')); ?>">
                            <input type='hidden' value='<?php echo e($recomendacion->id); ?>' name='rec_id'/><br>
                            <input type='submit' class="btn btn-secondary" value='Agregar plan de acción'/>
                    </form>
                </center>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>