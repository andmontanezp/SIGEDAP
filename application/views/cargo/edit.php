<div class="page-header">
    <h1><?= $titulo ?> <small>Mantenimiento de <?=$registro->car_descripcion ?></small></h1>
</div>
   <?= form_open(base_url('cargo/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
         <?= my_validation_errors(validation_errors()); ?>
      <?= form_input(array('type' => 'hidden', 'name' => 'car_id', 'value' => $registro->car_id, "id" => "car_id")); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Gerencia : ', 'car_gerencia_id'); ?>
         </div>
         <div class="col-lg-4">
            <?= form_dropdown('car_gerencia_id', $gerencias, $registro->gerencia_id, "class='form-control' id='car_gerencia_id'") ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Coordinación : ', 'car_coordinacion_id'); ?>
         </div>
         <div class="col-lg-4">
            <?= form_dropdown('car_coordinacion_id', array(), $registro->coordinacion_id, "class='form-control' id='car_coordinacion_id' disabled") ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Descripcion : ', 'car_descripcion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'car_descripcion',
            'id' => 'car_descripcion',
            'class' => 'form-control',
            'value' => $registro->car_descripcion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Registro: ', 'car_fecha_creacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'car_fecha_creacion',
            'id' => 'car_fecha_creacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->car_fecha_creacion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Actualizacion: ', 'car_actualizacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'car_actualizacion',
            'id' => 'car_actualizacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->car_actualizacion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
         </div>
         <div class="col-lg-4">
         <?= form_button(array(
         'type' => 'submit',
         'content' => 'Actualizar',
         'class' => 'btn btn-primary'
         )); ?>
         <?= anchor('cargo/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         <?= anchor('cargo/delete/'.$registro->car_id, 'Eliminar', array('class' => 'btn btn-warning', 'onClick'=>"return confirm('Esta seguro ?');"))?>
         </div>
      </div>
   <?= form_close(); ?>