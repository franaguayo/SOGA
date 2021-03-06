<?php $__env->startSection('content'); ?>
<title>Editar Perfil</title>
    <div  class="container background-style shadow border-0 my-5">
        <h2 class="text-center">Edita tu Perfil</h2>
        <br>
        <form method= "POST" action="<?php echo e(route('academico.updatePerfil', $academico->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombre')); ?></label>
                <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control" name="nombre" value="<?php echo e($academico->nombre); ?>" required>
                    <?php echo $errors->first('nombre', '<span style="color:red;">:message</span>'); ?>

                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Correo electronico')); ?></label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($academico->email); ?>">
                    <?php echo $errors->first('email', '<span style="color:red;">:message</span>'); ?>

                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Contraseña')); ?></label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" value="knhdl +w-" placeholder="Contraseña" required>
                    <?php echo $errors->first('password', '<span style="color:red;">:message</span>'); ?>

                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirmar Contraseña')); ?></label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="knhdl +w-" placeholder="Contraseña">
                </div>
            </div>

            <div class="form-group row mb-4">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-info" style="float:right">
                            <span class="fa fa-edit"></span>
                        <?php echo e(__('Editar')); ?>

                    </button>
                </div>
            </div>
        </form>
        <br>
        <br>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>