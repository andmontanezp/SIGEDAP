<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------
// Validaciones para el modelo de perfl(CRUD Perfil)
// ------------------------------------------------------------------------
class PerfilLib{
	
	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('Model_Perfil');
	}

	public function norep($registro){

		$this->CI->db->where('nombre', $registro['nombre']);
		$query = $this->CI->db->get('perfil');

		if ($query->num_rows() > 0 AND (!isset($registro['id']) OR ($registro['id'] != $query->row('id')))) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}