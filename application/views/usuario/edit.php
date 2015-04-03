<div class="page-header">
    <h1>Usuarios <small>Mantenimiento de <?=$registro->nombre ?></small></h1>
</div>
   <?= form_open(base_url('usuario/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      
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
            <?= form_label('Login : ', 'login'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_input(array(
            'type' => 'text',
            'name' => 'login',
            'id' => 'login',
            'class' => 'form-control',
            'readonly' => 'readonly',
            'placeholder' => 'Login...',
            'value' => $registro->login
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
            'value' => $registro->email
            )); 
         ?>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-2">
            <?= form_label('Perfil : ', 'perfil'); ?>
         </div>
         <div class="col-lg-4">
         <?= form_dropdown('perfil_id', $perfiles, $registro->perfil_id, "class='form-control'"); ?>
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
         <?= anchor('usuario/index', 'Cancelar', array('class' => 'btn btn-default'))?>
         <?= anchor('usuario/delete/'.$registro->id, 'Eliminar', array('class' => 'btn btn-warning', 'onClick'=>"return confirm('Esta seguro ?');"))?>
         </div>
      </div>
   <?= form_close(); ?>