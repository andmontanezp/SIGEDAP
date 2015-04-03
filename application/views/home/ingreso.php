<div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">Ingreso al Sistema</h3>
   </div>
   <div class="panel-body">
   <?= form_open(base_url('home/ingresar'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <div class="form-group">
         <div class="col-lg-1">
            <?= form_label('Usuario: ', 'login'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'login',
            'id' => 'login',
            'placeholder' => 'Usuario...',
            'class' => 'form-control',
            'value' => set_value('login')
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-1">
            <?= form_label('Clave: ', 'password'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'password',
            'name' => 'password',
            'id' => 'password',
            'class' => 'form-control',
            'value' => set_value('password')
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-1">
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