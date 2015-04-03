<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------
// Validaciones para el modelo de perfl(CRUD Perfil)
// ------------------------------------------------------------------------
class MenuLib{
	
	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('Model_Menu');
		//$this->CI->output->enable_profiler(TRUE);
	}

	public function my_validation($registro){
		$ctr = ($registro['controlador'] != '');
		$acc = ($registro['accion'] != '');
		$url = ($registro['url'] != '');

		if (!$ctr AND !$acc AND !$url) {
			$this->CI->form_validation->set_message('my_validation', 'Debe ingresar un Controlador y Accion o una url');
			return FALSE;
		}

		if ($ctr AND !$acc) {
			$this->CI->form_validation->set_message('my_validation', 'Ingreso un controlador, pero falta la acción');
			return FALSE;
		}

		if (!$ctr AND $acc) {
			$this->CI->form_validation->set_message('my_validation', 'Ingreso una accion, pero falta el controlador');
			return FALSE;
		}

		if ($url AND ($ctr OR $acc)) {
			$this->CI->form_validation->set_message('my_validation', 'Si ingresó una url, no debe ingresar un controlador o una acción');
			return FALSE;
		}

		return TRUE;
	}

	public function get_perfiles_asig_noasig($menu_id){
		$lista_asig = array();
		$lista_noasig = array();

		$this->CI->load->model('Model_Perfil');

		$perfiles = $this->CI->Model_Perfil->all();

		foreach ($perfiles as $perfil) {
			$this->CI->db->where('menu_id', $menu_id);
			$this->CI->db->where('perfil_id', $perfil->id);
			$query = $this->CI->db->get('menu_perfil');

			$existe = ($query->num_rows() > 0);

			if ($existe) {
				$lista_asig[] = array($perfil->id, $perfil->nombre, $menu_id);
			} else {
				$lista_noasig[] = array($perfil->id, $perfil->nombre, $menu_id);
			}
			
		}
		return array($lista_noasig, $lista_asig);
	}

	public function findByControlador($controlador){
		$this->CI->db->where('controlador', $controlador);
		return $this->CI->db->get('menu')->row();
	}

	public function findByControlador2($controlador){
		$this->CI->db->where('oca_controlador', $controlador);
		return $this->CI->db->get('opciones_catalogo')->row();
	}
}