<div class="page-header">
	<h1><?= $titulo ?> <small>Actualizacion de Registros</small></h1>
</div>

<?= form_open(base_url('coordinacion/search'), array('class' => 'form-inline')); ?>
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
    <?= anchor(base_url('coordinacion/create'), 'Agregar', array('class' => 'btn btn-primary'))?>
<?= form_close(); ?>
</div>
<div class="col-lg-12">&nbsp;</div>
<div class="table-responsive">
<table class="table table-condensed table-bordered col-xs-12">
	<thead>
		<tr>
			<th>#</th>
			<th>Descripcion</th>
			<th>Gerencia</th>
			<th>Fecha de Creacion</th>
			<th>Usuario creación</th>	
			<th>Fecha de Actualizacion</th>
			<th>Usuario actualización</th>	
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $registro): ?>
			<tr>
				<td><?= anchor('coordinacion/edit/'.$registro->coo_id, $registro->coo_id); ?></td>
				<td><?= $registro->coo_descripcion ?></td>
				<td><?= $registro->gerencia ?></td>
				<td><?= date('d/m/Y - h:i', strtotime($registro->coo_fecha_creacion)) ?></td>
				<td><?= $registro->coo_usuario_creacion ?></td>
				<td><?= date('d/m/Y - h:i', strtotime($registro->coo_actualizacion)) ?></td>
				<td><?= $registro->coo_usuario_actualizacion ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>