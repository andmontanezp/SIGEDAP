<div class="page-header">
	<h1>Menu <small>Actualizacion de Registros</small></h1>
</div>

<?= form_open('menu_perfil/search', array('class' => 'form-inline')); ?>
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
<?= form_close(); ?>
</div>
<div class="col-lg-12">&nbsp;</div>
<div class="table-responsive">
<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Menu</th>
			<th>Perfil</th>
			<th>Creado</th>
			<th>Actualizado</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $registro): ?>
			<tr>
				<td><?= anchor('menu_perfil/edit/'.$registro->id, $registro->id); ?></td>
				<td><?= $registro->nombre_menu ?></td>
				<td><?= $registro->nombre_perfil ?></td>
				<td><?= date("d/m/Y - H:i", strtotime($registro->fecha_creacion)); ?></td>
				<td><?= date("d/m/Y - H:i", strtotime($registro->fecha_actualizacion)); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>