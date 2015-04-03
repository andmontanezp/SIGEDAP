<?= form_open(base_url('trabajador/update'), array('class' => 'form-horizontal', 'role' => 'form')); ?>
         <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">Datos</h3>
         </div>
           <div class="panel-body">
         <?= form_input(array('name' => 'idtrabajador', 'type'=>'hidden', 'id' =>'idtrabajador', 'value' => $registro->idtrabajador)); ?>
         <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Personal : ', 'clasificacion'); ?>
               </div>
               <div class="col-xs-3">
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
                  <?= form_dropdown('tra_genero_id', $sexo, $registro->tra_genero_id, "class='form-control'"); ?>
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
                  <?= form_label('Nombres : ', 'nombres'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'nombres',
                  'id' => 'nombres',
                  'class' => 'form-control',
                  'value' => $registro->nombres
                  )); 
               ?>
               </div>
               <div class="col-xs-1">
                  &nbsp;
               </div>
               <div class="col-xs-2">
                  <?= form_label('Apellidos : ', 'apellidos'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'apellidos',
                  'id' => 'apellidos',
                  'class' => 'form-control',
                  'placeholder' => 'Apellidos...',
                  'value' => $registro->apellidos
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Cedula : ', 'cedula'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'cedula',
                  'id' => 'cedula',
                  'class' => 'form-control',
                  'placeholder' => 'cedula...',
                  'value' => $registro->cedula
                  )); 
               ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Fecha Nacimiento: ', 'fechanac'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'fechanac',
                  'id' => 'fechanac',
                  'class' => 'form-control',
                  'value' => $registro->fechanac
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Telefono Mov.: ', 'telfcelular'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'telfcelular',
                  'id' => 'telfcelular',
                  'class' => 'form-control',
                  'placeholder' => 'Telefono Movil...',
                  'value' => $registro->telfcelular
                  )); 
               ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Telefono Hab.: ', 'telfhabitacion'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'telfhabitacion',
                  'id' => 'telfhabitacion',
                  'class' => 'form-control',
                  'placeholder' => 'Telefono Local...',
                  'value' => $registro->telfhabitacion
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Direccion: ', 'direccion'); ?>
               </div>
               <div class="col-xs-9">
               <?= form_textarea(array(
                  'name' => 'direccion',
                  'id' => 'direccion',
                  'rows' => '2',
                  'cols' => '2',
                  'class' => 'form-control',
                  'value' => $registro->direccion
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Sitio de Trabajo: ', 'contactoopcional'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('contactoopcional', $sedes, $registro->contactoopcional, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Cargo: ', 'cargo'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('cargo', $cargos, $registro->cargo, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Hijos Menores de 13 años: ', 'nohijos'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('nohijos', $nohijos, $registro->nohijos, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Correo: ', 'correo'); ?>
               </div>
               <div class="col-xs-3">
               <?= form_input(array(
                  'type' => 'text',
                  'name' => 'correo',
                  'id' => 'correo',
                  'class' => 'form-control',
                  'placeholder' => 'Correo...',
                  'value' => $registro->correo
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Talla Pantalon', 'tallapantalon'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tallapantalon', $tallapantalon, $registro->tallapantalon, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Talla Camisa: ', 'tallacamisa'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tallacamisa', $tallacamisa, $registro->tallacamisa, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Tipo de Bota: ', 'tipo_bota'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tipo_bota', $tiposbota, 0, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  &nbsp;
               </div>
               <div class="col-xs-3">
                  &nbsp;
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Talla Zapatos', 'tallazapato'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('tallazapato', $tallazapato, $registro->tallazapato, "class='form-control'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Grupo Sanguineo: ', 'gruposanguineo'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('gruposanguineo', $gruposanguineo, $registro->gruposanguineo, "class='form-control'"); ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Alergico', 'alergico'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_dropdown('alergico', $confirm, $registro->alergico, "class='form-control', id='alergico'"); ?>
               </div>
               <div class="col-xs-1">
               </div>
               <div class="col-xs-2">
                  <?= form_label('Tipo Alergia: ', 'tipoalergia'); ?>
               </div>
               <div class="col-xs-3">
                  <?= form_input(array(
                  'type' => 'text',
                  'name' => 'tipoalergia',
                  'id' => 'tipoalergia',
                  'class' => 'form-control',
                  'placeholder' => 'Tipo de Alergia...',
                  'readonly' => 'readonly',
                  'value' => $registro->tipoalergia
                  )); 
               ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <?= form_label('Habilidades de Trabajo: ', 'habilidades'); ?>
               </div>
               <div class="col-xs-9">
               <?= form_textarea(array(
                  'name' => 'habilidades',
                  'id' => 'habilidades',
                  'rows' => '2',
                  'cols' => '2',
                  'class' => 'form-control',
                  'value' => $registro->habilidades
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


        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Datos Socioeconómicos</h3>
              </div>
               <div class="panel-body">
                  <?= form_input(array('name' => 'idtrabajador', 'type'=>'hidden', 'id' =>'idtrabajador', 'value' => $registro->idtrabajador)); ?>
                  <?= form_input(array('name' => 'usuario_id', 'type'=>'hidden', 'id' =>'usuario_id', 'value' => $this->session->userdata('usuario_id'))); ?>
               <div class="form-group">
                  <div class="col-xs-2">
                     <?= form_label('Posee vivienda? : ', 'vivienda'); ?>
                  </div>
                  <div class="col-xs-3">
                     <?= form_dropdown('vivienda', $confirm, 0, "class='form-control'"); ?>
                  </div>
                  <div class="col-xs-1">
                     &nbsp;
                  </div>
                  <div class="col-xs-2">
                     <?= form_label('Tipo de vivienda : ', 'tipo_vivienda'); ?>
                  </div>
                  <div class="col-xs-3">
                     <?= form_dropdown('tipo_vivienda', $tiposvivienda, 0, "class='form-control'"); ?>
                    </div>
               </div>
               <div class="form-group">
                  <div class="col-xs-2">
                     <?= form_label('Condición : ', 'condicion_vivienda'); ?>
                  </div>
                  <div class="col-xs-3">
                     <?= form_dropdown('condicion_vivienda', $condicionesvivienda, 0, "class='form-control'"); ?>
                     <?= form_close(); ?>
                  </div>
                  <div class="col-xs-1">
                     &nbsp;
                  </div>
                  <div class="col-xs-2">
                     <?= form_label('Estado vivienda : ', 'estado_vivienda'); ?>
                  </div>
                  <div class="col-xs-3">
                     <?= form_dropdown('estado_vivienda', $estadosvivienda, 0, "class='form-control'"); ?>
                    </div>
               </div>
               </div>
            </div>


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
                  <th>Tiempo</th>
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
                     <td><?= $movimiento->idsedeactual." - ".$movimiento->idcargoactual ?></td>
                     <td><?= $movimiento->funciones ?></td>
                     <td><?= $movimiento->idsede."-".$movimiento->idcargo ?></td>
                     <td><?= $movimiento->funcionesnuevas ?></td>
                     <td><?= $movimiento->tiempo." dias" ?></td>
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