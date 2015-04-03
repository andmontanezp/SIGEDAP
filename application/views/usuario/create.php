<div class="page-header">
    <h1>Usuarios <small>Mantenimiento de Registros</small></h1>
</div>
   <?= form_open('usuario/insert', array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
         <?= my_validation_errors(validation_errors()); ?>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Nombre : ', 'nombre'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'nombre',
            'id' => 'nombre',
            'class' => 'form-control',
            'placeholder' => 'Descripcion...',
            'value' => set_value('nombre')
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Login : ', 'login'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'login',
            'id' => 'login',
            'class' => 'form-control',
            'placeholder' => 'Login...',
            'value' => set_value('login')
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('E-mail : ', 'email'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'email',
            'name' => 'email',
            'id' => 'email',
            'class' => 'form-control',
            'placeholder' => 'email...',
            'value' => set_value('email')
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Perfil : ', 'perfil'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_dropdown('perfil_id', $perfiles, 0, "class='form-control'"); ?>
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
         <?= anchor('usuario/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         </div>
      </div>
   <?= form_close(); ?>