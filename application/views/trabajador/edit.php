<div class="page-header">
   <?php  
      if ($registro->foto != "") {
      ?>
      <img src="<?= base_url('js/webcamjs/'.$registro->foto); ?>" width="150" height="120" class="pull-right">
      <?php
      } else {
         echo "<td>".anchor("trabajador/tomar_foto/".$registro->idtrabajador, "<i class='glyphicon glyphicon-camera center-block'></i>")."</td>";
      }
   ?>
   <h1>Trabajadores <small>Mantenimiento de <?=$registro->tra_nombres." ".$registro->tra_apellidos ?></small></h1>
</div>
   <?= form_open(base_url('trabajador/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#datos_personales" data-toggle="tab">Datos Personales</a></li>
        <li><a href="#patologias" data-toggle="tab">Patologías</a></li>
        <li><a href="#familia" data-toggle="tab">Datos familiares</a></li>
        <li><a href="#socioeconomicos" data-toggle="tab">Datos Socioeconómicos</a></li>
        <li><a href="#historial" data-toggle="tab">Historial Laboral</a></li>
        <li><a href="#grado" data-toggle="tab">Estudios Realizados</a></li>
        <li><a href="#experiencia" data-toggle="tab">Experiencia Laboral</a></li>
        <li><a href="#analisis" data-toggle="tab">Análisis del cargo</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="datos_personales">
         <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">Datos</h3>
         </div>
           <div class="panel-body">
         <?= form_input(array('name' => 'idtrabajador', 'type'=>'hidden', 'id' =>'idtrabajador', 'value' => $registro->idtrabajador)); ?>
         <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Tipo de Trabajador : ', 'tra_tipotrabajador_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_tipotrabajador_id', $tipotrabajador, $registro->tra_tipotrabajador_id, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
                  &nbsp;
               </div>
               <div class="col-xs-2">
                  <?= form_label('Codigo : ', 'codigotrabajador'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'codigotrabajador',
                  'id' => 'codigotrabajador',
                  'class' => 'form-control',
                  'placeholder' => 'Codigo...',
                  'readonly'=>'readonly',
                  'value' => $registro->codigotrabajador
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Genero : ', 'tra_genero_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_genero_id', $genero, $registro->tra_genero_id, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
                  &nbsp;
               </div>
               <div class="col-xs-2">
                  <?= form_label('Estado Civil : ', 'tra_estadocivil_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_estadocivil_id', $estadocivil, $registro->tra_estadocivil_id, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Nombres : ', 'tra_nombres'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'tra_nombres',
                  'id' => 'tra_nombres',
                  'class' => 'form-control',
                  'value' => $registro->tra_nombres
                  )); 
               ?>
               </div>
               <div class="col-xs-1">
                  &nbsp;
               </div>
               <div class="col-xs-2">
                  <?= form_label('Apellidos : ', 'tra_apellidos'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'tra_apellidos',
                  'id' => 'tra_apellidos',
                  'class' => 'form-control',
                  'placeholder' => 'Apellidos...',
                  'value' => $registro->tra_apellidos
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Nacionalidad : ', 'tra_nacionalidad_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_nacionalidad_id', $nacionalidades,$registro->tra_nacionalidad_id, "class='form-control' id='tra_nacionalidad_id'");?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Cedula : ', 'tra_cedula'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_input(array(
                  'type' => 'text',
                  'name' => 'tra_cedula',
                  'id' => 'tra_cedula',
                  'class' => 'form-control',
                  'placeholder' => 'cedula...',
                  'readonly'=>'readonly',
                  'value' => number_format($registro->tra_cedula, 0, ",", ".")
                  )); 
                  ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Telefono Mov.: ', 'tra_telf_celular'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'tra_telf_celular',
                  'id' => 'tra_telf_celular',
                  'class' => 'form-control',
                  'placeholder' => 'Telefono Movil...',
                  'value' => $registro->tra_telf_celular
                  )); 
               ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Telefono Hab.: ', 'tra_telf_local'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'tra_telf_local',
                  'id' => 'tra_telf_local',
                  'class' => 'form-control',
                  'placeholder' => 'Telefono Local...',
                  'value' => $registro->tra_telf_local
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Estado : ', 'id_estado'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('id_estado', $estados, $registro->id_estado, "class='form-control' id='id_estado'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
               </div>
               <div class="col-xs-3">
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Municipio : ', 'id_municipio'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('id_municipio', $municipios, $registro->id_municipio, "class='form-control' id='id_municipio'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Parroquia : ', 'tra_parroquia_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_parroquia_id', $parroquias, $registro->tra_parroquia_id, "class='form-control' id='id_parroquia'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Direccion: ', 'tra_direccion'); ?>
               </div>
               <div class="col-xs-9">
               <?= form_textarea(array(
                  'name' => 'tra_direccion',
                  'id' => 'tra_direccion',
                  'rows' => '2',
                  'cols' => '2',
                  'class' => 'form-control',
                  'value' => $registro->tra_direccion
                  )); 
               ?>
               </div>
            </div>
            
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Sede: ', 'tra_sede_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_sede_id', $sedes, $registro->tra_sede_id, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Gerencia: ', 'tra_gerencia_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_gerencia_id', $gerencias, $registro->tra_gerencia_id, "class='form-control' disabled"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Coordinación: ', 'tra_coordinacion_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_coordinacion_id', $coordinaciones, $registro->tra_coordinacion_id, "class='form-control' disabled"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Cargo: ', 'tra_cargo_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_cargo_id', $cargos, $registro->tra_cargo_id, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Turno(de trabajo): ', 'tra_turno_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_turno_id', $turnos, $registro->tra_turno_id, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Parroquia(de trabajo): ', 'tra_parroquiatrabajo_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_parroquiatrabajo_id', $parroquiaslibertador, $registro->tra_parroquiatrabajo_id, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Fecha Nacimiento: ', 'tra_fechanac'); ?>
               </div>
               <div class="col-xs-3">
                <?= form_input(array(
                  'type' => 'text',
                  'name' => 'tra_fechanac',
                  'id' => 'tra_fechanac',
                  'class' => 'form-control',
                  'value' => $registro->tra_fechanac
                  )); 
               ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Correo: ', 'tra_correo'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'tra_correo',
                  'id' => 'tra_correo',
                  'class' => 'form-control',
                  'placeholder' => 'Correo...',
                  'value' => $registro->tra_correo
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Fecha de Ingreso', 'tra_fechaingreso'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'tra_fechaingreso',
                     'id' => 'tra_fechaingreso',
                     'class' => 'form-control',
                     'placeholder' => 'Correo...',
                     'value' => $registro->tra_fechaingreso,
                     'readonly'=>'readonly'
                     )); 
                  ?>               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Talla Camisa: ', 'tra_talla_camisa'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_talla_camisa', $tallacamisa, $registro->tra_talla_camisa, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Tipo de Bota: ', 'tra_tipobota_id'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_tipobota_id', $tiposbota, $registro->tra_tipobota_id, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Talla Pantalon', 'tra_talla_pantalon'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_talla_pantalon', $tallapantalon, $registro->tra_talla_pantalon, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Talla Zapatos', 'tra_talla_zapato'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_talla_zapato', $tallazapato, $registro->tra_talla_zapato, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Grupo Sanguineo: ', 'tra_grupo_sanguineo'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tra_grupo_sanguineo', $gruposanguineo, $registro->tra_grupo_sanguineo, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Habilidades de Trabajo: ', 'tra_habilidades'); ?>
               </div>
               <div class="col-xs-9">
               <?= form_textarea(array(
                  'name' => 'tra_habilidades',
                  'id' => 'tra_habilidades',
                  'rows' => '2',
                  'cols' => '2',
                  'class' => 'form-control',
                  'value' => $registro->tra_habilidades
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Funciones: ', 'tra_funciones'); ?>
               </div>
               <div class="col-xs-9">
               <?= form_textarea(array(
                  'name' => 'tra_funciones',
                  'id' => 'tra_funciones',
                  'rows' => '2',
                  'cols' => '2',
                  'class' => 'form-control',
                  'value' => $registro->tra_funciones
                  )); 
               ?>
               </div>
            </div>
            
            <div class="form-group">
               <div class="col-xs-8">
               &nbsp;
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-8">
               &nbsp;
               </div>
               <div class="col-xs-2">
                  <?= form_button(array(
                  'type' => 'submit',
                  'content' => 'Actualizar',
                  'class' => 'btn btn-primary'
                  )); 
                  ?>
               </div>
               <div class="col-xs-2">
                  <a class="btn btn-default" onclick="location.href='<?php echo base_url();?>trabajador/index'">Cancelar</a>
               </div>
            </div>
        </div>
        </div>
        <?= form_close(); ?>
         </div>
         <div class="tab-pane" id="patologias">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Patologías</h3>
           </div>
           <div class="panel-body">
         <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Alergias: ', 'tra_alergias'); ?>
               </div>
               <div class="col-xs-9 table-responsive">
                  <div class="row" style="padding-bottom : 10px;"><a class="btn btn-primary pull-right col-xs-2" data-toggle="modal" data-target="#myModal6"><i class="glyphicon glyphicon-plus"></i>Alergia</a></div>
                  <table class="table table-condensed table-bordered" style="margin-top:10px;">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Tipo de Alergia</th>
                           <th>Descripción</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php                  
                           if(count($alergias) > 0){
                           $i = 1; 
                           foreach ($alergias as $alergia) { 
                        ?>
                           <tr>
                              <th><?= $i ?></th>
                              <th><?= $alergia->tal_descripcion ?></th>
                              <th><?= $alergia->txa_observaciones ?></th>
                           </tr>
                        <?php 
                           $i++;
                           }
                           } else {
                              ?>
                              <tr><th colspan="8" style="text-align:center">Este trabajador no posee alergias registradas...</th></tr>
                              <?php
                           }
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Discapacidades: ', 'tra_discapacidades'); ?>
               </div>
               <div class="col-xs-9 table-responsive" style="border-top : 10px;">
                  <div class="row" style="padding-bottom : 10px;"><a class="btn btn-primary pull-right col-xs-2" data-toggle="modal" data-target="#myModal7"><i class="glyphicon glyphicon-plus"></i>Discapacidad</a></div>
                  <table class="table table-condensed table-bordered" style="margin-top:10px;">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Tipo de Discapacidad</th>
                           <th>Descripción</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php                  
                           if(count($discapacidades) > 0){
                           $i = 1; 
                           foreach ($discapacidades as $discapacidad) { 
                        ?>
                           <tr>
                              <th><?= $i ?></th>
                              <th><?= $discapacidad->tdi_descripcion ?></th>
                              <th><?= $discapacidad->txd_observaciones ?></th>
                           </tr>
                        <?php 
                           $i++;
                           }
                           } else {
                              ?>
                              <tr><th colspan="8" style="text-align:center">Este trabajador no posee discapacidades registradas...</th></tr>
                              <?php
                           }
                        ?>
                     </tbody>
                  </table>

               </div>
            </div>
        </div>
        </div>
         </div>
         <div class="tab-pane" id="familia">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Datos Familiares</h3>
           </div>
           <div class="panel-body">
        <div class="row"><a class="btn btn-primary pull-right col-xs-4 col-sm-3" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-plus"></i>Familiar</a></div>
         <div class="table-responsive">
         <table class="table table-condensed table-bordered" style="margin-top:10px;">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Nombres y Apellidos</th>
                  <th>Cédula</th>
                  <th>Relación</th>
                  <th>Edad</th>
                  <th>Usuario</th>
               </tr>
            </thead>
            <tbody>
               <?php                  
                  if(count($familiares) > 0){
                  $i = 1; 
                  foreach ($familiares as $familiar) { 
               ?>
                  <tr>
                     <td><?= $i ?></th>
                     <td><?= $familiar->fam_nombres." ".$familiar->fam_apellidos ?></td>
                     <td><?= $familiar->nac_descripcion." ".$familiar->fam_cedula ?></td>
                     <td><?= $familiar->tfa_descripcion ?></td>
                     <td><?= $familiar->edad ?></td>
                     <td><?= $familiar->nombre ?></td>
                  </tr>
               <?php 
                  $i++;
                  }
                  } else {
                     ?>
                     <tr><th colspan="8" style="text-align:center">Este trabajador no posee familiares registrados...</th></tr>
                     <?php
                  }
               ?>
            </tbody>
         </table>
         </div>
        </div>
        </div>
         </div>
         <div class="tab-pane" id="socioeconomicos">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Datos Socioeconómicos</h3>
              </div>
               <div class="panel-body">
                  <?= form_open(base_url('trabajador/update3'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
                  <?= form_input(array('name' => 'idtrabajador', 'type'=>'hidden', 'id' =>'idtrabajador', 'value' => $registro->idtrabajador)); ?>
                  <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>
               <div class="form-group">
                  <div class="col-xs-2">
                     <?= form_label('Tipo de Vivienda : ', 'tra_tipovivienda_id'); ?>
                  </div>
                  <div class="col-xs-3">
                     <?= form_dropdown('tra_tipovivienda_id', $tiposvivienda, $registro->tra_tipovivienda_id, "class='form-control'"); ?>
                  </div>
                  <div class="col-xs-1">
                     &nbsp;
                  </div>
                  <div class="col-xs-2">
                     <?= form_label('Condicion : ', 'tra_condicionvivienda_id'); ?>
                  </div>
                  <div class="col-xs-3">
                     <?= form_dropdown('tra_condicionvivienda_id', $condicionvivienda, $registro->tra_condicionvivienda_id, "class='form-control'"); ?>
                    </div>
               </div>
               <div class="form-group">
                  <div class="col-xs-2">
                     <?= form_label('Estado vivienda : ', 'tra_estadovivienda_id'); ?>
                  </div>
                  <div class="col-xs-3">
                     <?= form_dropdown('tra_estadovivienda_id', $estadosvivienda, $registro->tra_estadovivienda_id, "class='form-control'"); ?>
                  </div>
               </div>
               <div class="form-group">
               <div class="col-xs-8">
               &nbsp;
               </div>
               <div class="col-xs-2">
                  <?= form_button(array(
                  'type' => 'submit',
                  'content' => 'Actualizar',
                  'class' => 'btn btn-primary'
                  )); 
                  ?>
               </div>
               <div class="col-xs-2">
                  <a class="btn btn-default" onclick="location.href='<?php echo base_url();?>trabajador/index'">Cancelar</a>
               </div>
            </div>
               </div>
            </div>
            <?= form_close(); ?>
         </div>
        <div class="tab-pane" id="historial">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Movimientos</h3>
           </div>
           <div class="panel-body">
        <div class="row"><a class="btn btn-primary pull-right col-xs-4 col-sm-3" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>Movimiento</a></div>
         <div class="table-responsive">
         <table class="table table-condensed table-bordered" style="margin-top:10px;">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Fecha del Movimiento</th>
                  <th>Ubicación-Cargo Anterior</th>
                  <th>Funciones</th>
                  <th>Ubicación-Cargo Nuevo</th>
                  <th>Funciones</th>
                  <th>Usuario</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  if(count($movimientos) > 0){
                  foreach ($movimientos as $movimiento) { 
                  $i = 1; 
               ?>
                  <tr>
                     <td><?= $i ?></th>
                     <td><?= $movimiento->fechadesde ?></td>
                     <td><?= $movimiento->sede_anterior." - ".$movimiento->cargo_anterior ?></td>
                     <td><?= $movimiento->funciones_anteriores ?></td>
                     <td><?= $movimiento->sede_nueva."-".$movimiento->cargo_nuevo ?></td>
                     <td><?= $movimiento->funciones_nuevas ?></td>
                     <td><?= $movimiento->nombre ?></td>
                  </tr>
               <?php 
                  $i++;
                  }
                  } else {
                     ?>
                     <tr><th colspan="8" style="text-align:center">Este trabajador no posee movimientos...</th></tr>
                     <?php
                  }
               ?>
            </tbody>
         </table>
         </div>

         <div class="row"><a class="btn btn-primary pull-right col-xs-4 col-sm-3" data-toggle="modal" data-target="#myModal4"><i class="glyphicon glyphicon-plus"></i>Actividades</a></div>
         <div class="table-responsive">
         <table class="table table-condensed table-bordered" style="margin-top:10px;">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Tipo de Actividad</th>
                  <th>Descripcion</th>
                  <th>Fecha inicio</th>
                  <th>Fecha Fin</th>
                  <th>Ubicación-Cargo</th>
               </tr>
            </thead>
            <tbody>
               <?php
                 if(count($actividades) > 0){
                  foreach ($actividades as $actividad) { 
                  $i = 1; 
               ?>
                  <tr>
                     <td><?= $i ?></th>
                     <td><?= $actividad->ta_descripcion ?></td>
                     <td><?= $actividad->txa_descripcion ?></td>
                     <td><?= $actividad->txa_fecha_inicio ?></td>
                     <td><?= $actividad->txa_fecha_fin ?></td>
                     <td><?= $actividad->txa_ubicacion ?></td>
                  </tr>
               <?php 
                  $i++;
                  }
                  } else {
                     ?>
                     <tr><th colspan="8" style="text-align:center">Este trabajador no participa en actividades...</th></tr>
                     <?php
                  }
               ?>
            </tbody>
         </table>
         </div>
        </div>
        </div>
         </div>
        <div class="tab-pane" id="grado">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Estudios Realizados</h3>
           </div>
           <div class="panel-body">
               <div class="row"><a class="btn btn-primary pull-right col-xs-4 col-sm-3" data-toggle="modal" data-target="#myModal5"><i class="glyphicon glyphicon-plus"></i>Estudios</a></div>
         <div class="table-responsive">
         <table class="table table-condensed table-bordered" style="margin-top:10px;">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Tipo de Estudios</th>
                  <th>Institución</th>
                  <th>Área de Estudios</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  if(count($estudiosrealizados) > 0){
                  $i = 1; 
                  foreach ($estudiosrealizados as $estudio) { 
                  
               ?>
                  <tr>
                     <td><?= $i ?></th>
                     <td><?= $estudio->tes_descripcion ?></td>
                     <td><?= $estudio->txe_institucion ?></td>
                     <td><?= $estudio->aes_descripcion ?></td>
                  </tr>
               <?php 
                  $i++;
                  }
                  } else {
                     ?>
                     <tr><th colspan="8" style="text-align:center">Este trabajador no posee estudios registrados...</th></tr>
                     <?php
                  }
               ?>
            </tbody>
         </table>
         </div>
           </div>
         </div>
        </div>
        <div class="tab-pane" id="experiencia">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Experiencia Laboral</h3>
           </div>
           <div class="panel-body">
               <div class="row"><a class="btn btn-primary pull-right col-xs-4 col-sm-3" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-plus"></i>Experiencia Laboral</a></div>
         <div class="table-responsive">
         <table class="table table-condensed table-bordered" style="margin-top:10px;">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Empresa</th>
                  <th>Cargo</th>
                  <th>Jefe Inmediato</th>
                  <th>Teléfonos</th>
                  <th>Usuario</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  if(count($experiencias) > 0){
                  $i = 1; 
                  foreach ($experiencias as $experiencia) { 
                  
               ?>
                  <tr>
                     <td><?= $i ?></th>
                     <td><?= $experiencia->empresa ?></td>
                     <td><?= $experiencia->cargoexp ?></td>
                     <td><?= $experiencia->jefeinmediato ?></td>
                     <td><?= $experiencia->telefonosexp ?></td>
                     <td><?= $experiencia->nombreusuario ?></td>
                  </tr>
               <?php 
                  $i++;
                  }
                  } else {
                     ?>
                     <tr><th colspan="8" style="text-align:center">Este trabajador no posee experiencia laboral...</th></tr>
                     <?php
                  }
               ?>
            </tbody>
         </table>
         </div>
           </div>
         </div>
        </div>

      <div class="tab-pane" id="analisis">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Analisis del cargo</h3>
           </div>
           <div class="panel-body">
                  <?php
                  if (count($respuestas) > 0) {
                     ?>
                     <?= form_open('trabajador/updateEncuesta', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                     <?php
                     $i = 1;
                     foreach($respuestas as $respuesta){
                        ?>
                        <div class="form-group">
                        <div class="col-xs-5">
                           <?= form_label($i.") ".$respuesta->pre_descripcion, 'respuesta_'.$respuesta->pre_id); ?>
                        </div>
                        <div class="col-xs-7">
                        <?= form_input(array('type'=>'hidden', 'name'=>'rxt_id[]','value'=>$respuesta->rxt_id)); ?>
                        <?= form_textarea(array(
                              'name' => 'rxt_respuesta[]',
                              'id' => 'rxt_respuesta[]',
                              'rows' => '2',
                              'cols' => '2',
                              'class' => 'form-control',
                              'value' => $respuesta->rxt_respuesta
                           )); 
                        ?>
                       </div>
                     </div>
                        <?php
                        $i++;
                     }
                  }else {
                     ?>
                     <?= form_open('trabajador/insertEncuesta', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                     <?php
                     $i = 1;
                     foreach($preguntas as $pregunta){
                        ?>
                        <div class="form-group">
                        <div class="col-xs-5">
                           <?= form_label($i.") ".$pregunta->pre_descripcion, 'respuesta_'.$pregunta->pre_id); ?>
                        </div>
                        <div class="col-xs-7">
                        <?= form_input(array('type'=>'hidden', 'name'=>'rxt_pregunta_encuesta_id[]','value'=>$pregunta->pxe_id)); ?>
                        <?= form_textarea(array(
                              'name' => 'rxt_respuesta[]',
                              'id' => 'rxt_respuesta[]',
                              'rows' => '2',
                              'cols' => '2',
                              'class' => 'form-control'
                           )); 
                        ?>
                       </div>
                     </div>
                        <?php
                        $i++;
                     }  
                  }
                  ?>
                  <?= form_input(array('name' => 'idtrabajador', 'type'=>'hidden', 'id' =>'idtrabajador', 'value' => $registro->idtrabajador)); ?>
            </div>
            <div class="form-group">
               <div class="col-xs-6">
               &nbsp;
               </div>
               <div class="col-xs-2">
                  <?= form_button(array(
                  'type' => 'submit',
                  'content' => 'Actualizar',
                  'class' => 'btn btn-primary'
                  )); 
                  ?>
               </div>
               <div class="col-xs-2">
                  <a class="btn btn-default" onclick="location.href='<?php echo base_url();?>trabajador/index'">Cancelar</a>
               </div>
               <div class="col-xs-2">
               <?php
                  if ($analizado->analizado > 0) {
                  ?>
                     <a target="_blank" href="<?php echo base_url('trabajador/PdfDescripcionCargo/'.$registro->idtrabajador);?>"><img src="<?=base_url('img/pdf.png')?>" title="Imprimir"></a>
                  <?php
                  } else {
                  ?>
                     <span>Actualice su análisis de cargo para imprimirlo...</span>
                  <?php
                  }
               ?>
                  
               </div>
            </div>
            <?= form_close(); ?>
            </div>
         </div>
      
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Registro de Movimientos</h4>
            </div>
            <div class="modal-body">
            <?= form_open('trabajador/movimiento', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <div class="form-group">
               <div class="col-xs-3">
                  Sede Actual: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('idsede_anterior', $sedes, $registro->tra_sede_id, "class='form-control' id='idsede_anterior' disabled"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Cargo Actual: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('idcargo_anterior', $cargos, $registro->tra_cargo_id, "class='form-control' id='idcargo_anterior' disabled"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Funciones Desempeñadas: 
               </div>
               <div class="col-xs-9">
               <?= form_textarea(array(
                  'name' => 'funciones_anteriores',
                  'id' => 'funciones_anteriores',
                  'rows' => '2',
                  'cols' => '2',
                  'class' => 'form-control',
                  'value' => $registro->tra_funciones,
                  'readonly' => 'readonly'
                  )); 
               ?>
               </div>
            </div>
            <hr />
            <div class="form-group">
               <div class="col-xs-3">
                  Sede Destino: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('idsede', $sedes, 0, "class='form-control' id='idsede'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Cargo a Ocupar: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('idcargo', $cargos, 0, "class='form-control' id='idcargo'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Funciones a Desempeñar: 
               </div>
               <div class="col-xs-9">
               <?= form_textarea(array(
                  'name' => 'funciones_nuevas',
                  'id' => 'funciones_nuevas',
                  'rows' => '2',
                  'cols' => '2',
                  'class' => 'form-control',
                  'value' => set_value('funciones_nuevas')
                  )); 
               ?>
               </div>
            </div>
            <hr />
            <div class="form-group">
               <div class="col-xs-3">
                  Desde el: 
               </div>
               <div class="col-xs-9">
                  <div class="input-group date form_date" data-date="" data-date-format="yyyy/mm/dd " data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                     <?= form_input(array(
                        'type' => 'text',
                        'name' => 'fechadesde',
                        'id' => 'fechadesde',
                        'class' => 'form-control',
                        'readonly' => 'readonly',
                        'placeholder' => 'Fecha...',
                        'value' => set_value('fechadesde')
                        )); 
                     ?>
                     <?= form_close();?>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
               <input type="hidden" id="dtp_input2" value="" /><br/>
               </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardarmovimiento">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal-->

      <!-- Modal 2 -->
      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Experiencia Laboral</h4>
            </div>
            <div class="modal-body">
            <?= form_open('trabajador/experiencia', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <div class="form-group">
               <div class="col-xs-3">
                  Empresa: 
               </div>
               <div class="col-xs-9">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'empresa',
                     'id' => 'empresa',
                     'class' => 'form-control',
                     'placeholder' => 'Empresa...',
                     'value' => set_value('empresa')
                     )); 
                  ?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Cargo: 
               </div>
               <div class="col-xs-9">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'cargoexp',
                     'id' => 'cargoexp',
                     'class' => 'form-control',
                     'placeholder' => 'Cargo...',
                     'value' => set_value('cargoexp')
                     )); 
                  ?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Jefe Inmediato: 
               </div>
               <div class="col-xs-9">
               <?= form_input(array(
                     'type' => 'text',
                     'name' => 'jefeinmediato',
                     'id' => 'jefeinmediato',
                     'class' => 'form-control',
                     'placeholder' => 'Jefe Inmediato...',
                     'value' => set_value('jefeinmediato')
                     )); 
                  ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Teléfonos: 
               </div>
               <div class="col-xs-9">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'telefonosexp',
                     'id' => 'telefonosexp',
                     'class' => 'form-control',
                     'placeholder' => 'Teléfonos...',
                     'value' => set_value('telefonosexp')
                     )); 
                  ?>
                  <?= form_close();?>               
               </div>
            </div>
            <hr />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardarexperiencia">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal 2-->

      <!-- Modal 3 -->
      <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Datos Familiares</h4>
            </div>
            <div class="modal-body">
            <?= form_open('trabajador/familiares', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <?= form_input(array('name' => 'idtrabajador', 'type'=>'hidden', 'id' =>'idtrabajador', 'value' => $registro->idtrabajador)); ?>
            <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>
            <div class="form-group">
               <div class="col-xs-12">
                  <span class="advertisement">Nota: Todos los campos referenciados con un asterisco(*) son obligatorios...</span>
               </div>
               <div class="col-xs-12">
                  <span>&nbsp;</span>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Tipo de familiar: 
               </div>
               <div class="col-xs-8">
                  <?= form_dropdown('tipo_familiar_id', $tiposfamiliar,0, "class='form-control' id='tipo_familiar_id'");?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>   
                  Nombres: 
               </div>
               <div class="col-xs-8">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'fam_nombres',
                     'id' => 'fam_nombres',
                     'class' => 'form-control',
                     'placeholder' => 'Nombres...',
                     'value' => set_value('fam_nombres')
                     )); 
                  ?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Apellidos: 
               </div>
               <div class="col-xs-8">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'fam_apellidos',
                     'id' => 'fam_apellidos',
                     'class' => 'form-control',
                     'placeholder' => 'Apellidos...',
                     'value' => set_value('fam_apellidos')
                     )); 
                  ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Cédula: 
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('fam_nacionalidad_id', $nacionalidades,0, "class='form-control' id='fam_nacionalidad_id'");?>                             
               </div>
               <div class="col-xs-5">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'fam_cedula',
                     'id' => 'fam_cedula',
                     'class' => 'form-control',
                     'placeholder' => 'Cédula...',
                     'value' => set_value('fam_cedula')
                     )); 
                  ?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Género: 
               </div>
               <div class="col-xs-8">
                  <?= form_dropdown('fam_genero_id', $genero,0, "class='form-control' id='fam_genero_id'");?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Fecha Nac.:
               </div>
               <div class="col-xs-8">
                  <div class="input-group date form_date2" data-date="" data-date-format="yyyy/mm/dd " data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
                     <?= form_input(array(
                        'type' => 'text',
                        'name' => 'fam_fechanac',
                        'id' => 'fam_fechanac',
                        'class' => 'form-control',
                        'readonly' => 'readonly',
                        'placeholder' => 'Fecha de nacimiento...',
                        'value' => set_value('fam_fechanac')
                        )); 
                     ?>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
               <input type="hidden" id="dtp_input3" value="" />
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Teléfonos: 
               </div>
               <div class="col-xs-8">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'fam_telefono',
                     'id' => 'fam_telefono',
                     'class' => 'form-control',
                     'placeholder' => 'Teléfonos...',
                     'value' => set_value('fam_telefono')
                     )); 
                  ?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Incluido en HCM: 
               </div>
               <div class="col-xs-8">
                  <?= form_dropdown('fam_hcm_id', $genero,0, "class='form-control' id='fam_hcm_id'");?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Dirección: 
               </div>
               <div class="col-xs-8">
                  <?= form_textarea(array(
                     'name' => 'fam_direccion',
                     'id' => 'fam_direccion',
                     'class' => 'form-control',
                     'placeholder' => 'Dirección...',
                     'rows' => '4',
                     'cols' => '2',
                     'value' => set_value('fam_direccion')
                     )); 
                  ?>
                  <?= form_close();?>               
               </div>
            </div>
            <hr />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardarfamiliar">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal 3-->

<!-- Modal 4 -->
      <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Actividades</h4>
            </div>
            <div class="modal-body">
            <?= form_open('trabajador/actividades', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <?= form_input(array('name' => 'idtrabajador', 'type'=>'hidden', 'id' =>'idtrabajador', 'value' => $registro->idtrabajador)); ?>
            <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>
            <div class="form-group">
               <div class="col-xs-12">
                  <span class="advertisement">Nota: Todos los campos referenciados con un asterisco(*) son obligatorios...</span>
               </div>
               <div class="col-xs-12">
                  <span>&nbsp;</span>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Tipo de Actividad: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('txa_tipoactividad_id', $tipoactividades, 0, "class='form-control' id='txa_tipoactividad_id'");?>              
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Descripcion: 
               </div>
               <div class="col-xs-9">
                  <?= form_textarea(array(
                     'name' => 'txa_descripcion',
                     'id' => 'txa_descripcion',
                     'class' => 'form-control',
                     'rows' => '4',
                     'cols' => '2',
                     'placeholder' => 'Descripcion...',
                     'value' => set_value('txa_descripcion')
                     )); 
                  ?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
               <span class="advertisement">*</span>
                  Fecha Inicio.:
               </div>
               <div class="col-xs-9">
                  <div class="input-group date form_date" data-date="" data-date-format="yyyy/mm/dd " data-link-field="dtp_input5" data-link-format="yyyy-mm-dd">
                     <?= form_input(array(
                        'type' => 'text',
                        'name' => 'txa_fecha_inicio',
                        'id' => 'txa_fecha_inicio',
                        'class' => 'form-control',
                        'readonly' => 'readonly',
                        'placeholder' => 'Fecha de comienzo...',
                        'value' => set_value('txa_fecha_inicio')
                        )); 
                     ?>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
               <input type="hidden" id="dtp_input5" value="" />
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Fecha Fin.:
               </div>
               <div class="col-xs-9">
                  <div class="input-group date form_date" data-date="" data-date-format="yyyy/mm/dd " data-link-field="dtp_input6" data-link-format="yyyy-mm-dd">
                     <?= form_input(array(
                        'type' => 'text',
                        'name' => 'txa_fecha_fin',
                        'id' => 'txa_fecha_fin',
                        'class' => 'form-control',
                        'readonly' => 'readonly',
                        'placeholder' => 'Fecha de fin...',
                        'value' => set_value('txa_fecha_fin')
                        )); 
                     ?>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
               <input type="hidden" id="dtp_input6" value="" />
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Ubicación: 
               </div>
               <div class="col-xs-9">
                  <?= form_textarea(array(
                     'name' => 'txa_ubicacion',
                     'id' => 'txa_ubicacion',
                     'class' => 'form-control',
                     'rows' => '4',
                     'cols' => '2',
                     'placeholder' => 'Ubicación...',
                     'value' => set_value('txa_ubicacion')
                     )); 
                  ?>
                  <?= form_close();?>               
               </div>
            </div>
            <hr />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardaractividad">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal 4-->

      <!-- Modal 5 -->
      <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Estudios Realizados</h4>
            </div>
            <div class="modal-body">
            <?= form_open('trabajador/estudios', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <?= form_input(array('name' => 'txe_trabajador_id', 'type'=>'hidden', 'id' =>'txe_trabajador_id', 'value' => $registro->idtrabajador)); ?>
            <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>

            <div class="form-group">
               <div class="col-xs-3">
                  Tipo de estudios: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('txe_tipoestudio_id', $estudios, 0, "class='form-control' id='txe_tipoestudio_id'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Institución: 
               </div>
               <div class="col-xs-9">
                  <?= form_input(array(
                     'type' => 'text',
                     'name' => 'txe_institucion',
                     'id' => 'txe_institucion',
                     'class' => 'form-control',
                     'placeholder' => 'Institucion...',
                     'value' => set_value('txe_institucion')
                     )); 
                  ?>               
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Área de estudio: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('txe_areaestudio_id', $areaestudios, 0, "class='form-control' id='txe_areaestudio_id'"); ?>
                  <?= form_close();?>               
               </div>
            </div>
            <hr />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardarestudios">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal 5-->


      <!-- Modal 6 -->
      <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Registrar Alergia</h4>
            </div>
            <div class="modal-body">
            <?= form_open('trabajador/alergias', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <?= form_input(array('name' => 'txa_trab_id', 'type'=>'hidden', 'id' =>'txa_trab_id', 'value' => $registro->idtrabajador)); ?>
            <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>

            <div class="form-group">
               <div class="col-xs-3">
                  Tipo de alergia: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('txa_tal_id', $tipoalergia, 0, "class='form-control' id='txa_tal_id'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Observaciones: 
               </div>
               <div class="col-xs-9">
                  <?= form_textarea(array(
                     'type' => 'text',
                     'name' => 'txa_observaciones',
                     'id' => 'txa_observaciones',
                     'class' => 'form-control',
                     'placeholder' => 'Observaciones...',
                     'value' => set_value('txa_observaciones')
                     )); 
                  ?>               
               </div>
            </div>
               <?= form_close();?>               
            <hr />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardaralergia">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal 6-->

      <!-- Modal 7 -->
      <div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Registrar Discapacidad</h4>
            </div>
            <div class="modal-body">
            <?= form_open('trabajador/discapacidades', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <?= form_input(array('name' => 'txd_trab_id', 'type'=>'hidden', 'id' =>'txd_trab_id', 'value' => $registro->idtrabajador)); ?>
            <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>

            <div class="form-group">
               <div class="col-xs-3">
                  Tipo de discapacidad: 
               </div>
               <div class="col-xs-9">
                  <?= form_dropdown('txd_dis_id', $tipodiscapacidad, 0, "class='form-control' id='txd_dis_id'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-3">
                  Observaciones: 
               </div>
               <div class="col-xs-9">
                  <?= form_textarea(array(
                     'type' => 'text',
                     'name' => 'txd_observaciones',
                     'id' => 'txd_observaciones',
                     'class' => 'form-control',
                     'placeholder' => 'Observaciones...',
                     'value' => set_value('txd_observaciones')
                     )); 
                  ?>               
               </div>
            </div>
               <?= form_close();?>               
            <hr />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardardiscapacidad">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal 7-->
