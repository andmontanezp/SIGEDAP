<div class="page-header">
	<h1>Menu <small>Actualizacion de Registros</small></h1>
</div>

<?= form_open('menu/search', array('class' => 'form-inline')); ?>
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
    <?= anchor(base_url('menu/create'), 'Agregar', array('class' => 'btn btn-primary'))?>
<?= form_close(); ?>
</div>
<div class="col-lg-12 col-sm-9 col-xs-12">&nbsp;</div>
<div class="table-responsive">
<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Descripcion</th>
			<th>Controlador</th>
			<th>Acción</th>
			<th>URL</th>
			<th>Orden</th>
			<th>Accesos</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $registro): ?>
			<tr>
				<td><?= anchor('menu/edit/'.$registro->id, $registro->id); ?></td>
				<td><?= $registro->descripcion ?></td>
				<td><?= $registro->controlador ?></td>
				<td><?= $registro->accion ?></td>
				<td><?= $registro->url ?></td>
				<td><?= $registro->orden ?></td>
				<td style="text-align:center"><?= anchor('menu/menu_perfiles/'.$registro->id, '<span class="glyphicon glyphicon-lock"></span>'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>