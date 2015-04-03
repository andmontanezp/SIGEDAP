<div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">Cambiar Clave de Usuario</h3>
   </div>
   <div class="panel-body">
<?= form_open(base_url('home/cambiar_clave'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      <?= my_validation_errors(validation_errors()); ?>
   <div class="form-group">
      <div class="col-lg-2">
         <?= form_label('Clave Actual: ', 'clave_actual'); ?>
      </div>
      <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'password',
            'name' => 'clave_actual',
            'id' => 'clave_actual',
            'class' => 'form-control',
            'value' => set_value('clave_actual')
            )); 
         ?>
      </div>
   </div>
   <div class="form-group">
      <div class="col-lg-2">
         <?= form_label('Clave Nueva: ', 'clave_nueva'); ?>
      </div>
      <div class="col-lg-4">
      <?= form_input(array(
         'type' => 'password',
         'name' => 'clave_nueva',
         'id' => 'clave_nueva',
         'class' => 'form-control',
         'value' => set_value('clave_nueva')
         )); 
      ?>
      </div>
   </div>
   <div class="form-group">
      <div class="col-lg-2">
         <?= form_label('Re-Clave Nueva: ', 're_clave_nueva'); ?>
      </div>
      <div class="col-lg-4">
      <?= form_input(array(
         'type' => 'password',
         'name' => 're_clave_nueva',
         'id' => 're_clave_nueva',
         'class' => 'form-control',
         'value' => set_value('re_clave_nueva')
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
      'content' => 'Ingresar',
      'class' => 'btn btn-primary'
      )); ?>
      <?= anchor(base_url('home/index'), 'Cancelar', array('class' => 'btn btn-default'))?>
      </div>
   </div>
<?= form_close(); ?>
</div>
</div>