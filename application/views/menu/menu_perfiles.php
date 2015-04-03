<div class="row">
	<div class="col-sm-6 col-md-6 col-xs-6">
		<table class="table table-condensed table-bordered">
			<caption><h1>No Asignados</h1></caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php  
					foreach ($query_izq as $registro) {
						?>
						<tr>
							<td><?= $registro[0] ?></td>
							<td><?= $registro[1] ?></td>
							<td><?= anchor('menu/mp_asig/'.$registro[0].'/'.$registro[2], '<span class="glyphicon glyphicon-arrow-right"></span>'); ?></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-sm-6 col-md-6 col-xs-6">
		<table class="table table-condensed table-bordered">
			<caption><h1>Asignados</h1></caption>
			<thead>
				<tr>
					<th></th>
					<th>ID</th>
					<th>Nombre</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					foreach ($query_der as $registro) {
						?>
						<tr>
							<td><?= anchor('menu/mp_noasig/'.$registro[0].'/'.$registro[2], '<span class="glyphicon glyphicon-arrow-left"></span>'); ?></td>
							<td><?= $registro[0] ?></td>
							<td><?= $registro[1] ?></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?= anchor('menu/index', 'Volver', array('class="btn btn-primary"'));?>