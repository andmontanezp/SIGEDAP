<div class="page-header">
    <h1>Menu <small>Mantenimiento de Registros</small></h1>
</div>
   <?= form_open('menu/insert', array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
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
            'placeholder' => 'Descripcion...'
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
            'placeholder' => 'Controlador...'
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
            'placeholder' => 'Accion...'
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
            'placeholder' => 'URL...'
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
            'placeholder' => 'Orden...'
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
         'content' => 'Guardar',
         'class' => 'btn btn-primary'
         )); ?>
         <?= anchor('menu/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         </div>
      </div>
   <?= form_close(); ?>