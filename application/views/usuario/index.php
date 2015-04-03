<div class="page-header">
	<h1>Usuarios <small>Actualizacion de Registros</small></h1>
</div>

<?= form_open(base_url('usuario/search'), array('class' => 'form-inline')); ?>
	<div class="col-lg-6">
	<?= form_input(array(
        'type' => 'text',
        'name' => 'buscar',
        'id' => 'buscar',
        'placeholder' => 'Buscar por nombre...',
        'class' => 'form-control',
        'value' => set_value('buscar')
        )); 
     ?>
    <?= form_button(array(
         'type' => 'submit',
         'content' => '<span class="glyphicon glyphicon-search"></span>',
         'class' => 'btn btn-default'
	)); ?>
    <?= anchor(base_url('usuario/create'), 'Agregar', array('class' => 'btn btn-primary'))?>
<?= form_close(); ?>
</div>
<div class="col-lg-12">&nbsp;</div>
<div class="table-responsive">
<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Login</th>
			<th>e-mail</th>
			<th>Perfil</th>
			<th>Fecha de Creacion</th>	
			<th>Fecha de Actualizacion</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $registro): ?>
			<tr>
				<td><?= anchor('usuario/edit/'.$registro->id, $registro->id); ?></td>
				<td><?= $registro->nombre ?></td>
				<td><?= $registro->login ?></td>
				<td><?= $registro->email ?></td>
				<td><?= $registro->nombre_perfil ?></td>
				<td><?= date("d/m/Y - H:i", strtotime($registro->fecha_creacion)); ?></td>
				<td><?= date("d/m/Y - H:i", strtotime($registro->fecha_actualizacion)); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>