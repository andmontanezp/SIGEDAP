<div class="page-header">
    <h1><?= $titulo ?> <small>Búsqueda avanzada</small></h1>
</div>
      <?= form_open('reporte/buscar', array('class' => 'form-horizontal', 'role' => 'form')); ?>
     <div class="form-group">
       <div class="col-xs-1">
       </div>
       <div class="col-xs-3">
       </div>
        <div class="col-xs-2">
          <?= form_label('Actualizados: ', '',array('class' => 'label label-info')) ?>
        </div>
        <div class="col-xs-2">
          <?php
          if (isset($num_rows)) {
            $total = $num_rows;
          } else {
            $total=0;
          } 
          ?>
          <?= form_label($total, '',array('class' => 'label label-success')) ?>
        </div>
    </div>
    <div class="form-group">
       <div class="col-xs-1">
       </div>
       <div class="col-xs-3">
       </div>
        <div class="col-xs-2">
          <?= form_label('Bienestar Social: ', '',array('class' => 'label label-info')) ?>
        </div>
        <?php
          if (isset($bienestar)) {
            $total = $bienestar;
          } else {
            $total=0;
          } 
          ?>
        <div class="col-xs-2">
          <?= form_label($total, '',array('class' => 'label label-success')) ?>
        </div>
        <div class="col-xs-2">
          <?= form_label('Registro y Control: ', '',array('class' => 'label label-info')) ?>
        </div>
        <?php
          if (isset($registro)) {
            $total = $registro;
          } else {
            $total=0;
          } 
          ?>
        <div class="col-xs-2">
          <?= form_label($total, '',array('class' => 'label label-success')) ?>
        </div>
    </div>
    <?php
          if (isset($bienestar) && isset($registro) && $bienestar !=0 && $registro!=0) {
            $sum = $bienestar + $registro;
            $pct_bienestar = ($bienestar * 100) / $sum;
            $pct_registro = ($registro * 100) / $sum;
          } else {
            $pct_bienestar = 0;
            $pct_registro = 0;
          } 
          ?>
    <div class="form-group">
       <div class="col-xs-1">
       </div>
       <div class="col-xs-3">
       </div>
        <div class="col-xs-2">
          <?= form_label('% Bienestar Social: ', '',array('class' => 'label label-info')) ?>
        </div>
        <div class="col-xs-2">
          <?= form_label(number_format($pct_bienestar, 2, ",", ".")." %", '',array('class' => 'label label-success')) ?>
        </div>
        <div class="col-xs-2">
          <?= form_label('% Registro y Control: ', '',array('class' => 'label label-info')) ?>
        </div>
        <div class="col-xs-2">
          <?= form_label(number_format($pct_registro, 2, ",", ".")." %", '',array('class' => 'label label-success')) ?>
        </div>
    </div>
     <div class="form-group">
       <div class="col-xs-1">
          Desde : 
       </div>
       <div class="col-xs-3">
          <div class="input-group date form_date" data-date="" data-date-format="yyyy/mm/dd " data-link-field="fecha_desde" data-link-format="yyyy-mm-dd">
             <?= form_input(array(
                'type' => 'text',
                'name' => 'fecha_desde',
                'id' => 'fecha_desde',
                'class' => 'form-control',
                'readonly' => 'readonly',
                'placeholder' => 'Fecha...',
                'value' => set_value('fechadesde')
                )); 
             ?>
             <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
             <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
       <input type="hidden" id="fecha_desde" value="" /><br/>
       </div>
    </div>
    <div class="form-group">
       <div class="col-xs-1">
          Hasta : 
       </div>
       <div class="col-xs-3">
          <div class="input-group date form_date" data-date="" data-date-format="yyyy/mm/dd " data-link-field="fecha_hasta" data-link-format="yyyy-mm-dd">
             <?= form_input(array(
                'type' => 'text',
                'name' => 'fecha_hasta',
                'id' => 'fecha_hasta',
                'class' => 'form-control',
                'readonly' => 'readonly',
                'placeholder' => 'Fecha...',
                'value' => set_value('fechadesde')
                )); 
             ?>
             <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
             <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
       <input type="hidden" id="fecha_hasta" value="" /><br/>
       </div>
    </div>
    <div class="form-group">
       <div class="col-xs-2">
       </div>
       <div class="col-xs-4">
       <?= form_button(array(
       'type' => 'submit',
       'content' => '<i class="glyphicon glyphicon-search"> Buscar</i>',
       'class' => 'btn btn-primary'
       )); ?>
       <?= anchor('home/index', 'Salir', array('class' => 'btn btn-default'))?>
       </div>
    </div>
    <?= form_close();?>

    <div class="table-responsive">
      <table class="table table-condensed">
        <tr>
          <th>#</th>
          <th>Nombre Trabajador</th>
          <th>Cédula Trabajador</th>
          <th>Nombre Usuario</th>
          <th>Perfil</th>
          <th>Máquina</th>
          <th>Fecha y Hora</th>
        </tr>
        <?php
if(isset($query) && count($query) > 0){
          $i = 1;
          foreach ($query as $row) {
          ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= $row->tra_nombres." ".$row->tra_apellidos ?></td>
            <td><?= number_format($row->tra_cedula, 0, ",", ".") ?></td>
            <td><?= $row->nombre ?></td>
            <td><?= $row->perfil ?></td>
            <td><?= $row->usuario_ip ?></td>
            <td><?= date("d/m/Y - h:i", strtotime($row->fecha)) ?></td>
          </tr>
          <?php
          $i++;
          }
}else{
?>
<tr><th colspan="7">Suministre fechas para realizar su búsqueda...</th></tr>
<?php
}
        ?> 
      </table>
    </div>
