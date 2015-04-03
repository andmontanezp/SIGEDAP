<div class="page-header">
	<h1>Trabajadores <small>Actualizacion de Registros</small></h1>
</div>
<?= form_open(base_url('trabajador/search'), array('class' => 'form-horizontal','id' => 'search_trabajador')); ?>
	<div class="container">
	<div class="form-group">
		<div class="col-xs-2">
			<?= form_label("Buscar por: "); ?>
		</div>
		<div class="col-xs-4">
			<?= form_dropdown("tipo_busqueda", array("0" => "Seleccione...", "1" => "Cédula","2" => "Nombres y Apellidos","3" => "Gerencia","4" => "Coordinación"
			,"5" => "Cargo"),0, "class='form-control' id='tipo_busqueda'");?>
	    </div>
	    <div class="col-xs-3">
	    	<?= anchor(base_url('trabajador/create'), '<span class="glyphicon glyphicon-plus"></span>Agregar', array('class' => 'btn btn-primary pull-right'))?>
		</div>
	</div>
	<div class="row">&nbsp;</div>
	<div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="form-group">
    	<div class="col-xs-1">
    		<?= form_label("Cédula: "); ?>
    	</div>
		<div class="col-xs-2">
			<?= form_input(array("type" => "text", "name" => "cedula", "id" => "cedula", "class" => "form-control", "disabled" => true, "value" => set_value('cedula'))); ?>
	    </div>
    	<div class="col-xs-1">
    		<?= form_label("Nombres: "); ?>
    	</div>
		<div class="col-xs-5">
			<?= form_input(array("type" => "text", "name" => "nombres", "id" => "nombres", "class" => "form-control", "disabled" => true)); ?>
	    </div>
    </div>
    <div class="row">&nbsp;</div>
    <div class="form-group">
	    <div class="col-xs-1">
	    	<?= form_label("Gerencia: "); ?>
	    </div>
		<div class="col-xs-2">
			<?= form_dropdown('gerencia', $gerencias, 0, "class='form-control' id='gerencia' disabled") ?>    
		</div>
		<div class="col-xs-1">
	    	<?= form_label("Coord : "); ?>
	    </div>
		<div class="col-xs-2">
			<?= form_dropdown('coordinacion', $coordinaciones, 0, "class='form-control' id='coordinacion' disabled") ?>    
		</div>
		<div class="col-xs-1">
	    	<?= form_label("Cargo: "); ?>
	    </div>
		<div class="col-xs-2">
			<?= form_dropdown('cargo', $cargos, 0, "class='form-control' id='cargo' disabled") ?>    
		</div>
	</div>
	    <div class="row">&nbsp;</div>
	    <div class="row">&nbsp;</div>
	    <div class="form-group">
	    	<div class="col-xs-4"></div>
	    	<div class="col-xs-4">
	    			<?= form_button(array(
	                  	'type' => 'submit',
	                  	'content' => '<i class="glyphicon glyphicon-search">Buscar</i>',
	                  	'class' => 'btn btn-primary'
	                  )); 
	                ?>
	    	</div>
	    	<div class="col-xs-4"></div>
	    </div>
	  </div>
		<?= form_close(); ?>
	<hr />
	<div class="row">
		<div class="col-xs-2"></div>
		<div class="col-xs-10"><?= $this->pagination->create_links(); ?></div>
	</div>
<div class="table-responsive">
<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Ver Ficha</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Cedula</th>
			<th>Cargo</th>
			<th>Foto</th>
			<th>Imprimir</th>
			<th>Pdf</th>
		</tr>
	</thead>
	<tbody>
		<?php if (isset($query) && count($query)>0){ ?>
		<?php $i = 1; ?>
		<?php foreach ($query as $registro): ?>
			<tr>
				<td><?= $i ?></td>
				<td><?= anchor('trabajador/edit/'.$registro->idtrabajador, "<i class='glyphicon glyphicon-edit center-block'></i>"); ?></td>
				<td><?= $registro->tra_nombres ?></td>
				<td><?= $registro->tra_apellidos ?></td>
				<td><?= number_format($registro->tra_cedula, 0, ",", ".") ?></td>
				<td><?= $registro->car_descripcion ?></td>
				<?php
					if ($registro->foto == "") {
					echo "<td>Aún no se ha tomado foto</td>";	
				}else{ ?>
				<td><?= anchor(base_url('js/webcamjs/'.$registro->foto), $registro->foto); ?></td>
				<?php } ?>
				<td><?= anchor('trabajador/PdfDescripcionCargo/'.$registro->idtrabajador, "<img src=".base_url('img/pdf.png')." class='center-block' />", "target='_blank'"); ?></td>
				<td><?= anchor('trabajador/PdfPrueba/'.$registro->idtrabajador, "<img src=".base_url('img/pdf.png')." class='center-block' />", "target='_blank'"); ?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
		<?php } else {?><tr><th colspan="9">No se han encontrado registros...</th></tr>
<?php } ?>
	</tbody>
</table>
</div>
<div class="row">
	<div class="col-xs-12"><?= $this->pagination->create_links(); ?></div>
</div>
