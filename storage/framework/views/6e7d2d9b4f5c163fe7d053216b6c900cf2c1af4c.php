<!DOCTYPE html>

<?php $__env->startSection('content'); ?>

    <div class="container background-style">
        <title>Editar la recomendación <?php echo e($recomendacion->nombre); ?>  </title>
        <h1 style="text-align:center;margin-top:20px;"> Editar la recomendación: <?php echo e($recomendacion->nombre); ?> </h1>
        <hr>
        <form method="POST" action='<?php echo e(route('recomendacion.update',$recomendacion->id)); ?>'>
            <?php echo csrf_field(); ?>
            <?php echo method_field("put"); ?>
            <div class="form-group" <?php echo e($errors->has('nombreRec') ? 'has-error' : ''); ?>>
            <label for="exampleInputEmail1" style="font-size: 24px;">Nombre</label>
                <input type="text" class="form-control"  name='nombreRec' value="<?php echo e($recomendacion->nombre); ?>" placeholder="Escriba el nuevo nombre para la recomendación">
                <?php echo $errors->first('nombreRec','<span class="help-block" style="color:red;">:message</span>'); ?>

            </div>
            <div class="form-group" <?php echo e($errors->has('descripcionRec') ? 'has-error' : ''); ?>>
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción</label>
            </div>
            <textarea rows="4" cols="50" name='descripcionRec'><?php echo e($recomendacion->descripcion); ?></textarea>
            <?php echo $errors->first('descripcionRec','<span class="help-block" style="color:red;">:message</span>'); ?>

            <hr>
            <input type="hidden" name="rutaPrevia" value="<?php echo e($rutaPrevia); ?>">
            <button type="submit" class="btn btn-info " style="float:right">
                <span class="fa fa-edit"></span>
                Editar recomendación
            </button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>