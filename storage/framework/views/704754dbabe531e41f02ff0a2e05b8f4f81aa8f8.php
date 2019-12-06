<!DOCTYPE html>

<?php $__env->startSection('content'); ?>
        
<div class="container" >
    <h1 style="text-align:center">
        Subir una nueva evidencia 
    </h1>
    <title> Subir evidencia </title>
    <hr><br><br>
    <form method="POST" action="<?php echo e(route('evidencias.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <h4>Nombre de la evidencia</h4>
            <input type="text" class="form-control"  name='nombreEvidencia' placeholder="Escriba el nombre de la evidencia">
            <?php echo $errors->first('nombreEvidencia','<span class="help-block" style="color:red;">:message</span>'); ?>

        </div>
        <br><br>
        <div class="form-group">
            <h4>Archivo de la evidencia</h4>
            <input class="btn" type="file" name="archivo">
            <?php echo $errors->first('archivo','<span class="help-block" style="color:red;">:message</span>'); ?>

        </div>

        <br><br>

        <h4>Asignar a un plan de acción</h4>
        <?php if($planActual): ?> <p>Accesado desde el plan: <i><?php echo e($planActual->nombre); ?></i> </p> <?php endif; ?>
        <?php if(count($planes) > 0): ?>
            <div class="panel panel-primary" id="result_panel">
                <div class="panel-heading"></div>
                
                <div class="panel-body">
                    <select class="form-control"  name="plan" id="card_type">
                        <option id="card_id" value="<?php echo e($planActual->id); ?>"><?php echo e($planActual->nombre); ?></option>
                        <?php $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($plan->id != $planActual->id): ?>
                                <option id="card_id" value="<?php echo e($plan->id); ?>"><?php echo e($plan->nombre); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        <?php else: ?> 
            <p>No hay planes registrados.</p>
        <?php endif; ?>
        <?php echo $errors->first('plan','<span class="help-block" style="color:red;">:message</span>'); ?>

        <br>
        <button style="float: right;" type="submit" class="btn btn-primary">Crear evidencia</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>