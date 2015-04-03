<div class="page-header">
    <h1><?= $titulo ?> <small>Inserción de Registros</small></h1>
</div>
   <?= form_open('coordinacion/insert', array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Gerencia : ', 'coo_gerencia_id'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_dropdown('coo_gerencia_id', $gerencias, 0, "class='form-control'") ?>
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
            'placeholder' => 'Descripcion...'
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
         <?= anchor('coordinacion/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         </div>
      </div>
   <?= form_close(); ?>