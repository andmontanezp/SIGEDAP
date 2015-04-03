<div class="page-header">
	<h1><?= $titulo ?> <small>Actualizacion de Registros</small></h1>
</div>

<?= form_open(base_url('cargo/search'), array('class' => 'form-inline')); ?>
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
    <?= anchor(base_url('cargo/create'), 'Agregar', array('class' => 'btn btn-primary'))?>
<?= form_close(); ?>
</div>
<div class="col-lg-12">&nbsp;</div>
<div class="table-responsive">
<table class="table table-condensed table-bordered col-xs-12">
	<thead>
		<tr>
			<th>#</th>
			<th>Descripcion</th>
			<th>Coordinación</th>
			<th>Fecha de Creacion</th>
			<th>Usuario creación</th>	
			<th>Fecha de Actualizacion</th>
			<th>Usuario actualización</th>	
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $registro): ?>
			<tr>
				<td><?= anchor('cargo/edit/'.$registro->car_id, $registro->car_id); ?></td>
				<td><?= $registro->car_descripcion ?></td>
				<td><?= $registro->coordinacion ?></td>
				<td><?= date('d/m/Y - h:i', strtotime($registro->car_fecha_creacion)) ?></td>
				<td><?= $registro->car_usuario_creacion ?></td>
				<td><?= date('d/m/Y - h:i', strtotime($registro->car_actualizacion)) ?></td>
				<td><?= $registro->car_usuario_actualizacion ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>