<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('autentificar')){
	function autentificar(){
		$CI =& get_instance();

		$controlador = $CI->uri->segment(1);	
		$accion = $CI->uri->segment(2);
		$url = $controlador.'/'.$accion;

		$libres = array(
			'/',
			'home/index',
			'home/acceso_denegado',
			'home/sendMailGmail',
			'home/acerca_de',
			'home/ingreso',
			'home/ingresar',
			'home/cambio_clave',
			'home/cambiar_clave',
			'home/salir',
			'nacionalidad/index',
			'jobs/init',
            'jobs/ChangePicturesName'
		);

		if (in_array($url, $libres)) {
			echo $CI->output->get_output();
		} else {
			if ($CI->session->userdata('usuario')) {
				if (autorizar()) {
					echo $CI->output->get_output();	
				} else {
					redirect('home/acceso_denegado');	
				}	
			} else {
				redirect('home/acceso_denegado');
			}
		}
		
	}
}

function autorizar(){
	$CI =& get_instance();

	$perfil_id = $CI->session->userdata('perfil_id');

	$CI->load->library('menuLib');
	$controlador = $CI->uri->segment(1);
	
	$menu_id = null;
	$opcion_id = null;
	$CI->load->library('menu_PerfilLib');
	if (isset($CI->menulib->findByControlador($controlador)->id)){
		$menu_id = $CI->menulib->findByControlador($controlador)->id;
	}
	$acceso = false;
	$acceso2 = false;

	if (!$menu_id) {
		if (isset($CI->menulib->findByControlador2($controlador)->oca_id)){
			$menu_id = $CI->menulib->findByControlador2($controlador)->oca_id;
		}
		$opcion_id = $CI->menulib->findByControlador2($controlador)->oca_id;
		if (!$opcion_id) {
			return FALSE;
		} else {		
			$acceso2 = $CI->menu_perfillib->findByMenuAndPerfil2($opcion_id, $perfil_id);
		}
	} else {
		$acceso = $CI->menu_perfillib->findByMenuAndPerfil($menu_id, $perfil_id);
	}

	if (!$acceso && !$acceso2) {
		return FALSE;
	}

	return TRUE;
}