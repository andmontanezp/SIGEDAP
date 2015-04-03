<div class="page-header">
    <h1><?= $titulo ?> <small>Mantenimiento de <?=$registro->ger_descripcion ?></small></h1>
</div>
   <?= form_open(base_url('gerencia/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <?= form_hidden('ger_id', $registro->ger_id); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Descripcion : ', 'ger_descripcion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'ger_descripcion',
            'id' => 'ger_descripcion',
            'class' => 'form-control',
            'value' => $registro->ger_descripcion
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
            'name' => 'gen_fecha_creacion',
            'id' => 'gen_fecha_creacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->ger_fecha_creacion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Actualizacion: ', 'gen_actualizacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'gen_actualizacion',
            'id' => 'gen_actualizacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->ger_actualizacion
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
         <?= anchor('gerencia/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         <?= anchor('gerencia/delete/'.$registro->ger_id, 'Eliminar', array('class' => 'btn btn-warning', 'onClick'=>"return confirm('Esta seguro ?');"))?>
         </div>
      </div>
   <?= form_close(); ?>