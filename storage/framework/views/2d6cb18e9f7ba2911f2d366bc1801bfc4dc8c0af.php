<!DOCTYPE html>

<?php $__env->startSection('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/calendarJS/source/jsCalendar.css">
<script type="text/javascript" src="/calendarJS/source/jsCalendar.js"></script>
<script type="text/javascript" src="/calendarJS/source/jsCalendar.lang.es.js"></script>

<div class="container background-style">
    <title> Editar plan de acción </title>
    <h2 style="text-align:center;margin-top:20px;"> <?php echo e($plan->nombre); ?> </h2>
    <hr>
    <form method="POST" action="<?php echo e(route('plan.update',$plan->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field("put"); ?>
        <div class="form-group" <?php echo e($errors->has('nombrePlan') ? 'has-error' : ''); ?>>
        <label for="exampleInputEmail1" style="font-size: 24px;">Nombre</label>
            <input type="text" class="form-control"  name='nombrePlan' value="<?php echo e($plan->nombre); ?>" placeholder="Escriba el nombre para el plan de acción">
            <?php echo $errors->first('nombrePlan','<span class="help-block" style="color:red;">:message</span>'); ?>

        </div>
        <div class="form-group" <?php echo e($errors->has('descripcionPlan') ? 'has-error' : ''); ?>>
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción</label>
            <br>
            <textarea rows="4" cols="50" name='descripcionPlan'><?php echo e($plan->descripcion); ?></textarea>
            <?php echo $errors->first('descripcionPlan','<span class="help-block" style="color:red;">:message</span>'); ?>

        </div>
        <div class="form-group" <?php echo e($errors->has('fecha_termino') ? 'has-error' : ''); ?>>
            <!-- My calendar element -->
            <h2>Fecha de término</h2>
            <div id="my-calendar" class="jsCalendar" data-month-format="month YYYY" data-language="es"></div>

            <!-- Outputs -->
            <h4>Fecha escogida</h4>
            <input id="my-input-a" name="fecha_termino" value="<?php echo e($plan->fecha_termino); ?>" required><br>
            <?php echo $errors->first('fecha_termino','<span class="help-block" style="color:red;">:message</span>'); ?>

          <div class="form-group">
            <label for="criterioHecho" style="font-size: 24px;" name="criterioHecho">Criterio de hecho (opcional)</label>
            <p></p>
            <textarea rows="4" cols="50" name='criterioHecho'><?php echo e($plan->criterio); ?></textarea>
          </div>
        </div>

        <label for="exampleInputPassword1" style="font-size: 24px;">Plan completado</label>
            <select name="completado">
                
                <?php if($plan->completado == 0): ?>
                    <option value="0" selected>No</option>
                    <option value="1">Sí</option>
                <?php else: ?>
                    <option value="0">No</option>
                    <option value="1" selected>Sí</option>
                <?php endif; ?>
            </select>

        <hr>
        <button type="submit" class="btn btn-info">
            <span class="fa fa-edit"></span>
          Editar plan de acción
        </button>
    </form> <br><br><br><br>

     <!-- Create the calendar -->
     <script type="text/javascript">
        // Create the calendar
        var calendar = jsCalendar.new("#my-calendar");


        // Get the inputs
        var print_date = document.getElementById("my-input-a");
        var print_month = document.getElementById("my-input-b");

        // When the user clicks on a date
        calendar.onDateClick(function(event, date){
          print_date.value = jsCalendar.tools.dateToString(date, 'DD MONTH YYYY', 'es');
          console.log(calendar._elements);
        });


        $("td").click(function() {
          //$(".jsCalendar-current").removeClass(".jsCalendar-current");
          $(".jsCalendar-current").attr('class', 'lol');
          console.log($(".jsCalendar-current"));
          $(this).addClass("jsCalendar-current");
          console.log(this);
        });


        // When a user change the month
        calendar.onMonthChange(function(event, date){
          print_month.value = jsCalendar.tools.dateToString(date, 'MONTH YYYY', 'es');
        });
      </script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>