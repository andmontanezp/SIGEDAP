<div class="page-header">
    <h1><?= $titulo ?> <small>Mantenimiento de <?=$registro->ec_descripcion ?></small></h1>
</div>
   <?= form_open(base_url('estado_civil/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <?= form_hidden('ec_id', $registro->ec_id); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Descripcion : ', 'ec_descripcion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'ec_descripcion',
            'id' => 'ec_descripcion',
            'class' => 'form-control',
            'value' => $registro->ec_descripcion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Registro: ', 'ec_fecha_creacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'ec_fecha_creacion',
            'id' => 'ec_fecha_creacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->ec_fecha_creacion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Actualizacion: ', 'ec_actualizacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'ec_actualizacion',
            'id' => 'ec_actualizacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->ec_actualizacion
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
         <?= anchor('estado_civil/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         <?= anchor('estado_civil/delete/'.$registro->ec_id, 'Eliminar', array('class' => 'btn btn-warning', 'onClick'=>"return confirm('Esta seguro ?');"))?>
         </div>
      </div>
   <?= form_close(); ?>