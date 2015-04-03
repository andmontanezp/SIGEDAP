<div class="page-header">
    <h1><?= $titulo ?> <small>Inserción de Registros</small></h1>
</div>
   <?= form_open('cargo/insert', array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Gerencia : ', 'car_gerencia_id'); ?>
         </div>
         <div class="col-lg-4">
            <?= form_dropdown('car_gerencia_id', $gerencias, 0, "class='form-control' id='car_gerencia_id'") ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Coordinación : ', 'car_coordinacion_id'); ?>
         </div>
         <div class="col-lg-4">
            <?= form_dropdown('car_coordinacion_id', $gerencias, 0, "class='form-control' id='car_coordinacion_id' disabled") ?>
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
            'placeholder' => 'Descripcion...'
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Salario Base : ', 'car_salario_base'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'car_salario_base',
            'id' => 'car_salario_base',
            'class' => 'form-control',
            'placeholder' => 'Salario Base...'
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
         <?= anchor('cargo/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         </div>
      </div>
   <?= form_close(); ?>