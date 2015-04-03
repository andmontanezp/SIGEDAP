<div class="page-header">
    <h1><?= $titulo ?> <small>Búsqueda avanzada</small></h1>
</div>
      <?= form_open('movimientos/insert', array('class' => 'form-horizontal', 'role' => 'form')); ?>
      <?= form_input(array('type' => 'hidden', 'name' => 'idtrabajador', 'id' => 'idtrabajador'))?>
      <div class="form-group">
         <div class="col-xs-3">
            Buscar por: 
         </div>
         <div class="col-xs-3">
            <?= form_dropdown('tipo_busqueda', array('0' => 'Seleccione...','1' => 'Cédula', '2' => 'Código'), /*$registro->tra_sede_id*/0, "class='form-control' id='tipo_busqueda'"); ?>
         </div>
         <div class="input-group col-xs-3">
            <?= form_input(array(
               'type'=>'text',
               'name' => 'buscar',
               'id' => 'buscar',
               'rows' => '2',
               'cols' => '2',
               'class' => 'form-control',
               'placeholder' => 'Buscar...'
               ));
            ?>
            <div class="input-group-btn">
                <button id = "buscar_trabajador" class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
            </div>
         </div>
      </div>
      <hr />
      <div class="form-group">
         <div class="col-xs-1">
            Nombres: 
         </div>
         <div class="col-xs-3">
            <?= form_input(array(
               'type'=>'text',
               'name' => 'nombres',
               'id' => 'nombres',
               'rows' => '2',
               'cols' => '2',
               'class' => 'form-control',
               'placeholder' => 'Buscar...',
               'disabled' => 'disabled'
               ));
            ?>
         </div>
		<div class="col-xs-2"> 
        </div>
	     <div class="col-xs-1">
	        Apellidos: 
	     </div>
	     <div class="col-xs-3">
	        <?= form_input(array(
	           'type'=>'text',
	           'name' => 'apellidos',
	           'id' => 'apellidos',
	           'rows' => '2',
	           'cols' => '2',
	           'class' => 'form-control',
	           'placeholder' => 'Apellidos...',
	           'disabled' => 'disabled'
	           ));
	        ?>
	     </div>
      </div>
      <div class="form-group">
         <div class="col-xs-1">
            Cédula: 
         </div>
         <div class="col-xs-3">
            <?= form_input(array(
               'type'=>'text',
               'name' => 'cedula',
               'id' => 'cedula',
               'rows' => '2',
               'cols' => '2',
               'class' => 'form-control',
               'placeholder' => 'Cedula...',
               'disabled' => 'disabled'
               ));
            ?>
         </div>
		<div class="col-xs-2"> 
        </div>
	     <div class="col-xs-1">
	        Sede: 
	     </div>
	     <div class="col-xs-3">
	        <?= form_input(array(
	           'type'=>'text',
	           'name' => 'sede',
	           'id' => 'sede',
	           'rows' => '2',
	           'cols' => '2',
	           'class' => 'form-control',
	           'placeholder' => 'Sede...',
	           'disabled' => 'disabled'
	           ));
	        ?>
	     </div>
      </div>
      <div class="form-group">
         <div class="col-xs-1">
            Gerencia: 
         </div>
         <div class="col-xs-3">
            <?= form_input(array(
               'type'=>'text',
               'name' => 'gerencia',
               'id' => 'gerencia',
               'rows' => '2',
               'cols' => '2',
               'class' => 'form-control',
               'placeholder' => 'Gerencia...',
               'disabled' => 'disabled'
               ));
            ?>
         </div>
		<div class="col-xs-2"> 
        </div>
	     <div class="col-xs-1">
	        Coord.: 
	     </div>
	     <div class="col-xs-3">
	        <?= form_input(array(
	           'type'=>'text',
	           'name' => 'coordinacion',
	           'id' => 'coordinacion',
	           'rows' => '2',
	           'cols' => '2',
	           'class' => 'form-control',
	           'placeholder' => 'Coordinacion...',
	           'disabled' => 'disabled'
	           ));
	        ?>
	     </div>
      </div>
      <div class="form-group">
         <div class="col-xs-1">
            Cargo: 
         </div>
         <div class="col-xs-3">
            <?= form_input(array(
               'type'=>'text',
               'name' => 'cargo',
               'id' => 'cargo',
               'rows' => '2',
               'cols' => '2',
               'class' => 'form-control',
               'placeholder' => 'Cargo...',
               'disabled' => 'disabled'
               ));
            ?>
         </div>
      <div class="col-xs-2"> 
        </div>
        <div class="col-xs-1">
          Teléfono Móvil: 
        </div>
        <div class="col-xs-3">
           <?= form_input(array(
              'type'=>'text',
              'name' => 'movil',
              'id' => 'movil',
              'rows' => '2',
              'cols' => '2',
              'class' => 'form-control',
              'placeholder' => 'Móvil...',
              'disabled' => 'disabled'
              ));
           ?>
        </div>
      </div>

  	<div class="table-responsive">
	    <table class="table table-condensed table-bordered" style="margin-top:10px;">
		    <thead>
		    	<tr>
		    		<th colspan="8" style="text-align:center;">Beneficiarios</th>
		    	</tr>
		    	<tr>
		    		<th>#</th>
		    		<th>Nombres y Apellidos</th>
		    		<th>Cédula</th>
               <th>Parentesco</th>
               <th>Edad</th>
		    		<th>Es beneficiario ?</th>
               <th colspan="2">Acciones</th>
		    	</tr>
		    </thead>
		    <tbody id = "body">
            <!--Beneficiarios-->
		    </tbody>
	    </table>
   	</div>