                            
                            
                            
<!DOCTYPE html>

<?php $__env->startSection('content'); ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .center-column {
        display: block;
        margin: auto;
    }
</style>
<title>Listado de categorías</title>
     <!-- Page Content -->

<div class="container">
    <h1 class="text-center">Listado de categorías</h1>
    <br>               
    <?php if($categorias->count() > 0): ?>
        <table class="table table-hover"  >
            <thead class="thead-dark">
                <tr>
                    <th style="min-width: 1%;">Nombre</th>
                    <th>Descripción</th>
                    <th style="width: 14%;">Acciones</th>
                </tr>
            </thead>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a style="color:black !important;" href="<?php echo e(route('categorias.show',$categoria->id)); ?>"><?php echo e($categoria->nombre); ?></a></td>
                <td style="height:10px;"><p class="descripcion-texto"><?php echo e($categoria->descripcion); ?></p></td>
                <td>
                    <div class="container">
                        <br>
                        <div class="row">                                
                        
                            <div class="col-lg-6 text-center">
                                <form action="<?php echo e(route('categorias.destroy',$categoria->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Quiere borrar la categoria: <?php echo e($categoria->nombre); ?>?')" >
                                                Borrar <span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            </div>

                            <div class="col-lg-6 text-center">
                                <a style="color:white !important;" class="btn btn-info btn-sm" href="/categorias/<?php echo e($categoria->id); ?>/edit">Editar <span class="fa fa-pencil"></span></a> 
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
            
    <?php else: ?> 
        <p>No hay categorías registradas.</p>
    <?php endif; ?>      
    
    <br>
    <form action="/categorias/create">
        
        <input style="float: right; background-color:grey; color:white" class="btn pretty-btn"  type="submit" value="Crear categoría" />
    </form><br>     
    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>
</div> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>