<div class="page-header">
    <h1><?= $titulo ?> <small>Mantenimiento de Registros</small></h1>
</div>
   <?= form_open('nacionalidad/insert', array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
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
         <?= anchor('nacionalidad/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         </div>
      </div>
   <?= form_close(); ?>