<!DOCTYPE html>

<?php $__env->startSection('content'); ?>

<div class="container background-style">
    <title> Agregar recomendación </title>
    <br>
    <p style="font-size:12px; text-align:center"><i>Recomendación para:</i></p>
    <h1 style="text-align:center;margin-top:20px;"> <?php echo e($categoria->nombre); ?> </h1>
    <div class="card-body p-5">
        <form method="POST" action='<?php echo e(route('recomendacion.store2',$categoria->id)); ?>'>
            <?php echo csrf_field(); ?>
                <label for="exampleInputEmail1" style="font-size: 24px;">Nombre:</label>
                <input type="text" class="form-control"  name='nombre' placeholder="Escriba el nombre de la recomendación..." style="margin-bottom:20px;">
                <?php echo $errors->first('nombre','<span class="help-block" style="color:red;">:message</span>'); ?>

                <br>
                <label for="exampleInputPassword1" style="font-size: 24px;">Descripción:</label>
                <hr>
                <textarea rows="4" cols="50" name='descripcion' style="margin-bottom:20px;"></textarea>
                <br>
                <?php echo $errors->first('descripcion','<span class="help-block" style="color:red;">:message</span>'); ?>

                <hr>    
                <button type="submit" style="background-color: grey; border-color: black; color:white; float:right" class="btn pretty-btn">Agregar recomendación</button>
        </form>
    </div>
</div>
<div style="height: 50px"></div>
<p class="lead mb-0"></p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>