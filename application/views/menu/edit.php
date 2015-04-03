<div class="page-header">
    <h1>Menu <small>Mantenimiento de <?=$registro->nombre ?></small></h1>
</div>
   <?= form_open(base_url('menu/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
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
            <?= form_label('Controlador : ', 'controlador'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'controlador',
            'id' => 'controlador',
            'class' => 'form-control',
            'value' => $registro->controlador
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Accion : ', 'accion'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'accion',
            'id' => 'accion',
            'class' => 'form-control',
            'value' => $registro->accion
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('URL : ', 'url'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'url',
            'id' => 'url',
            'class' => 'form-control',
            'value' => $registro->url
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Orden : ', 'orden'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'number',
            'name' => 'orden',
            'id' => 'orden',
            'class' => 'form-control',
            'value' => $registro->orden
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
         <?= anchor('menu/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         <?= anchor('menu/delete/'.$registro->id, 'Eliminar', array('class' => 'btn btn-warning', 'onClick'=>"return confirm('Esta seguro ?');"))?>
         </div>
      </div>
   <?= form_close(); ?>