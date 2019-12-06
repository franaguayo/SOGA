<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="row text-center">
        <title> <?php echo e($categoria->nombre); ?> </title>
        <div class="col-lg-12 col-md-12">
            <h1>Area: <?php echo e($categoria->nombre); ?></h1>
            <?php if(isset($categoria->academico)): ?>
                <h6>Profesor encargado de esta área: <?php echo e($categoria->academico->nombre); ?></h6>
            <?php else: ?>
                <h6><i>No hay ningún profesor asignado a esta área.</i></h6>
            <?php endif; ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h3>Descripción</h3>
            <p class="descripcion-texto"><?php echo e($categoria->descripcion); ?></p>
        </div>
    </div>

    <br><br><br>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="recomendaciones-tab" data-toggle="tab" href="#recomendaciones" role="tab" aria-controls="recomendaciones" aria-selected="true">Recomendaciones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="planes-tab" data-toggle="tab" href="#planes" role="tab" aria-controls="planes" aria-selected="false">Planes de acción</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="recomendaciones" role="tabpanel" aria-labelledby="recomendaciones-tab">
            <?php if(count($categoria->recomendaciones) > 0): ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Recomendación</th>
                        <th>Descripción</th>
                        <?php if(auth()->user()->id == $categoria->academico_id): ?>
                            <th>Acciones</th>
                        <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categoria->recomendaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomendacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="<?php echo e(route('recomendacion.show',$recomendacion->id)); ?>"><?php echo e($recomendacion->nombre); ?></a></td>
                                <td><?php echo e($recomendacion->descripcion); ?></td>
                                <?php if(auth()->user()->id == $categoria->academico_id): ?>
                                    <td>
                                        <center>
                                        <form action="<?php echo e(route('plan.create')); ?>">
                                            <input type='hidden' value='<?php echo e($recomendacion->id); ?>' name='rec_id'/><br>
                                            <input type='submit' class="btn btn-secondary" value='Agregar plan de acción'/>
                                        </form>
                                        </center>
                                    </td>
                                <?php endif; ?>
                            <tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <br>
                <p>No hay recomendaciones para esta categoría (sólo el coordinador puede agregar recomendaciones).</p>
            <?php endif; ?>
        </div>
        <div class="tab-pane fade" id="planes" role="tabpanel" aria-labelledby="planes-tab">
            <?php if(count($planes) > 0): ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Plan de acción</th>
                        <th>Pertenece a la recomendación</th>
                        <th>Completado</th>
                        <th>Fecha de término</th>
                        <?php if(auth()->user()->id == $categoria->academico_id): ?>
                            <th>Acciones</th>
                        <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><a href="<?php echo e(route('plan.show',$plan->id)); ?>"><?php echo e($plan->nombre); ?></a></td>
                                <td><?php echo e($plan->recomendacion->nombre); ?></td>
                                <?php if($plan->completado == 0): ?>
                                    <td>No</td>
                                <?php else: ?>
                                    <td>Sí</td>
                                <?php endif; ?>
                                <td><?php echo e($plan->fecha_termino); ?></td>
                                <?php if(auth()->user()->id == $categoria->academico_id): ?>
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
                <br>
                <p>No hay planes para esta categoría.</p>
            <?php endif; ?>
        </div>
    </div>

    <hr>

    <?php if(auth()->user()->privilegio == 1): ?>
        <div class="row">
            <div class="col-lg-4 col-md-3">
            </div>
            <div style="text-align:center" class="col-lg-4 col-md-3">
                <form action="/recomendacion/create/<?php echo e($categoria->id); ?>" style="position:relative; top:50%;">
                    <input type="submit" class="btn btn-primary" value="Agregar recomendación" />
                </form>
            </div>
        </div>
    <?php endif; ?>

    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>