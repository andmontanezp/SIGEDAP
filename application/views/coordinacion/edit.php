<div class="page-header">
    <h1><?= $titulo ?> <small>Mantenimiento de <?=$registro->coo_descripcion ?></small></h1>
</div>
   <?= form_open(base_url('coordinacion/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <?= form_hidden('gen_id', $registro->coo_id); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Gerencia : ', 'coo_gerencia_id'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_dropdown('coo_gerencia_id', $gerencias, $registro->coo_gerencia_id, "class='form-control'") ?>
      </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Descripcion : ', 'coo_descripcion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'coo_descripcion',
            'id' => 'coo_descripcion',
            'class' => 'form-control',
            'value' => $registro->coo_descripcion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Registro: ', 'coo_fecha_creacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'coo_fecha_creacion',
            'id' => 'coo_fecha_creacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->coo_fecha_creacion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Actualizacion: ', 'coo_actualizacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'coo_actualizacion',
            'id' => 'coo_actualizacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->coo_actualizacion
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
         <?= anchor('coordinacion/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         <?= anchor('coordinacion/delete/'.$registro->coo_id, 'Eliminar', array('class' => 'btn btn-warning', 'onClick'=>"return confirm('Esta seguro ?');"))?>
         </div>
      </div>
   <?= form_close(); ?>