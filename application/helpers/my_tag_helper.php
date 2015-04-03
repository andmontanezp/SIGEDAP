<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_validation_errors')){
	function my_validation_errors($errors){
		$salida = '';
		if($errors){
			$salida = "<div class='alert alert-danger'>";
			$salida .= "<button type='button' class='close' data-dismiss='alert'> x </button>";
			$salida .= "<h4>Ha ocurrido un error</h4>";
			$salida .= "<small>".$errors."</small>";
			$salida .= "</div>";
		}
		return $salida;
	}
}

if ( ! function_exists('my_menu_ppal')){
	function my_menu_ppal(){
		$opciones = "";
		$opciones .= "<li>".anchor('home/index', 'Inicio')."</li>";
		if (get_instance()->session->userdata('usuario')) {
		$opciones .= "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Catálogo <span class='caret'></span></a><ul class='dropdown-menu' role='menu'>";
		get_instance()->load->model('Model_Catalogo');
		$query = get_instance()->Model_Catalogo->allForMenu();
		foreach ($query as $opcion) {
			if ($opcion->oca_controlador != '' && $opcion->oca_accion != '') {
				$irA = $opcion->oca_controlador.'/'.$opcion->oca_accion;
				$param  = array();
			}
			$opciones .= anchor($irA, $opcion->oca_descripcion, 'class="list-group-item"');
		}
		$opciones.="</ul>
				</li>";
			$opciones .= "<li>".anchor('home/cambio_clave', 'Cambiar Contrase&ntilde;a')."</li>";
			$opciones .= "<li>".anchor('home/salir', 'Cerrar Sesion')."</li>";
		} else {
			$opciones .= "<li>".anchor('home/ingreso', 'Ingresar')."</li>";
		}
		return $opciones;
	}
}

if ( ! function_exists('my_menu_app')){
	function my_menu_app(){
			$opciones = null;
			if (get_instance()->session->userdata('usuario')) {
				$opciones = '';
				get_instance()->load->model('Model_Menu');
				$query = get_instance()->Model_Menu->allForMenu();
				
				foreach ($query as $opcion) {
					if ($opcion->url != '') {
						$irA = $opcion->url;
						$param = array('target'=>'_blank');
					} else {
						$irA = $opcion->controlador.'/'.$opcion->accion;
						$param  = array();
					}
					$opciones .= anchor($irA, $opcion->nombre, 'class="list-group-item"');
				}
			}
			return $opciones;
		}
}

if ( ! function_exists('my_new_menu_app')){
	function my_new_menu_app(){
			$opciones = null;
			if (get_instance()->session->userdata('usuario')) {
				$opciones = '';
				get_instance()->load->model('Model_Menu');
				$query = get_instance()->Model_Menu->allForMenuPpal();
				
				foreach ($query as $opcion) {
					if ($opcion->url != '') {
						$irA = $opcion->url;
						$param = array('target'=>'_blank');
					} else {
						$irA = $opcion->controlador.'/'.$opcion->accion;
						$param  = array();
					}
					$opciones .= anchor($irA, $opcion->descripcion, 'class="list-group-item"');
				}
			}
			return $opciones;
		}
}

/*
	Developer : Anderson Montañez
	Changes : Modification of lateral menu
	Date : 22-03-2015
*/
if ( ! function_exists('construir_menu_aplicacion')){
	function construir_menu_aplicacion(){
			$opcion = '';
			$goTo = '';
			$perfil_id = null;
			$menu_id = null;
			$isEnabled = false;

			get_instance()->load->library('menu_PerfilLib');
			if (get_instance()->session->userdata('usuario')) {
				get_instance()->load->model('Model_Menu');
				$perfil_id = get_instance()->session->userdata('perfil_id');
				$principal_menu = get_instance()->Model_Menu->allForMenuPpal();
				//That function creates a dynamic menu, the options are on menu table
				foreach ($principal_menu as $principal) {
					$menu_id = $principal->id;
					if ($perfil_id != null &&  $menu_id != null) {
						$acceso = get_instance()->menu_perfillib->findByMenuAndPerfil($menu_id, $perfil_id);	
					}
					$opcion .= "<div class='panel panel-default'>";
					$opcion .= "	<div class='panel-heading'>";
					$opcion .= "		<h4 class='panel-title'>";
					$opcion .= "        	<a data-toggle='collapse' disabled data-parent='#accordion' href='#".$principal->dom_id."' ";
					$opcion .= !$acceso ? "class='not-active'" : "";
					$opcion .= "><span class='glyphicon glyphicon-folder-close'>&nbsp;".$principal->descripcion."</span></a>";
					$opcion .= "		</h4>";
					$opcion .= "	</div>";

						
					$opcion .= "	<div id='".$principal->dom_id."' class='panel-collapse collapse'>
                  						<div class='panel-body'>
                      						<table class='table'>";
                    $secondary_menu = get_instance()->Model_Menu->allSecondaryMenu($principal->id);
                    foreach ($secondary_menu as $secundario) {
                    	$goTo = $secundario->msec_controller.'/'.$secundario->msec_action;	
                    	$opcion .= "<tr>
		                              <td>
		                                  <span class='glyphicon glyphicon-leaf'></span>&nbsp;".anchor($goTo, $secundario->msec_description)."
		                              </td>
		                          	</tr>";
					}
					$opcion .= "			</table>";
					$opcion .= "</div></div></div>";
				}

			}
			return $opcion;
		}
}