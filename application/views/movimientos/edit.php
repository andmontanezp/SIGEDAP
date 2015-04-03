<div class="page-header">
    <h1><?= $titulo ?> <small>Mantenimiento de <?=$registro->nac_descripcion ?></small></h1>
</div>
   <?= form_open(base_url('nacionalidad/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <?= form_hidden('nac_id', $registro->nac_id); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Descripcion : ', 'nac_descripcion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'nac_descripcion',
            'id' => 'nac_descripcion',
            'class' => 'form-control',
            'value' => $registro->nac_descripcion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Registro: ', 'nac_fecha_creacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'nac_fecha_creacion',
            'id' => 'nac_fecha_creacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->nac_fecha_creacion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Actualizacion: ', 'nac_actualizacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'nac_actualizacion',
            'id' => 'nac_actualizacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->nac_actualizacion
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
         <?= anchor('nacionalidad/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         <?= anchor('nacionalidad/delete/'.$registro->nac_id, 'Eliminar', array('class' => 'btn btn-warning', 'onClick'=>"return confirm('Esta seguro ?');"))?>
         </div>
      </div>
   <?= form_close(); ?>