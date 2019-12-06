<!DOCTYPE html>

<?php $__env->startSection('content'); ?>
      <!-- Page Content -->
    <title> Crear categoría </title>
  <div class="container ">
      <div class="card border-0 shadow my-5 background-style">
        <div class="card-body p-5">
            <h1>Crear categoría</h1>
          <form method="POST" action='<?php echo e(route('categorias.store')); ?>'>
              <?php echo csrf_field(); ?>
              <div class="form-group" <?php echo e($errors->has('nombreCategoria') ? 'has-error' : ''); ?>>
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control"  name='nombreCategoria' placeholder="Escriba el nombre de la categoría">
                <?php echo $errors->first('nombreCategoria','<span class="help-block" style="color:red;">:message</span>'); ?>

              </div>
              <div class="form-group " <?php echo e($errors->has('descripcionCategoria') ? 'has-error' : ''); ?>>
                <label for="exampleInputPassword1">Descripción</label>
                <textarea rows="4" class='form-control' cols="50" name='descripcionCategoria'></textarea>
                <?php echo $errors->first('descripcionCategoria','<span class="help-block" style="color:red;">:message</span>'); ?>

              </div>
              
              <?php if($academicoSinCategoria->count() > 0): ?>
                  <div class="panel panel-primary" id="result_panel">
                      <div class="panel-heading"><h3 class="panel-title">Lista de académicos</h3>
                      </div>
                      <div class="panel-body">
                          <select class="form-control" name="academicoID" id="card_type">
                              <option id="card_id"  value="NULL">Sin asignar</option>
                              <?php $__currentLoopData = $academicoSinCategoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option id="card_id"  value="<?php echo e($academico->id); ?>"><?php echo e($academico->nombre); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                  </div>
                  <?php else: ?> 
                  <?php
                      
                  ?>
                      <p><i>No hay académicos registrados para asignar a esta categoría </i>.</p>
                      <input type='hidden' name='academicoID' value='NULL'>
                  <?php endif; ?>
              <button type="submit" class="btn pretty-btn" style="float: right; background-color:grey; color:white">Crear categoría</button>
            </form>                      
        </div>
    </div>
<?php $__env->stopSection(); ?>
  


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>