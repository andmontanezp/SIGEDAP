<div class="page-header">
    <h1>Perfiles <small>Mantenimiento de <?=$registro->nombre ?></small></h1>
</div>
   <?= form_open(base_url('perfil/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <?= form_hidden('id', $registro->id); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Descripcion : ', 'nombre'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'nombre',
            'id' => 'nombre',
            'class' => 'form-control',
            'value' => $registro->nombre
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Registro: ', 'fecha_creacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'fecha_creacion',
            'id' => 'fecha_creacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->fecha_creacion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Fecha Actualizacion: ', 'fecha_actualizacion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'fecha_actualizacion',
            'id' => 'fecha_actualizacion',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'value' => $registro->fecha_actualizacion
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
         <?= anchor('perfil/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         <?= anchor('perfil/delete/'.$registro->id, 'Eliminar', array('class' => 'btn btn-warning', 'onClick'=>"return confirm('Esta seguro ?');"))?>
         </div>
      </div>
   <?= form_close(); ?>