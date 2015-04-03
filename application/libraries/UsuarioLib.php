<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------
// Validaciones para el modelo de usuarios(login, cambioclave, CRUD Usuario)
// ------------------------------------------------------------------------
class UsuarioLib{
	
	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('Model_Usuario');
		$this->CI->load->model('Model_Perfil');
	}

	public function login($login, $pass){
		$query = $this->CI->Model_Usuario->get_login($login, $pass);
		if ($query->num_rows() > 0) {
			$usuario = $query->row();
			$perfil = $this->CI->Model_Perfil->find($usuario->perfil_id);
			$datos_sesion = array(
									'usuario' 		=> $usuario->login,
									'usuario_id' 	=> $usuario->id,
									'perfil_id' 	=> $usuario->perfil_id,
									'perfil_nombre' => $perfil->nombre);
			$this->CI->session->set_userdata($datos_sesion);
			return TRUE;
		} else {
			$this->CI->session->sess_destroy();
			return FALSE;
		}
	}

	public function cambiarpwd($clave_actual, $clave_nueva){
		if ($this->CI->session->userdata('usuario_id') == null) {
			return FALSE;
		}

		$id = $this->CI->session->userdata('usuario_id');
		$clave_nueva = sha1($clave_nueva);
		$clave_actual = sha1($clave_actual);
		$usuario = $this->CI->Model_Usuario->find($id);
		if ($usuario->password == $clave_actual) {
			$data = array(
				'id' 		=> $id,
				'password' 	=> $clave_nueva
			);

		$this->CI->Model_Usuario->update($data);
		
		} else {
			return FALSE;
		}
	}

	public function my_validation($registro){

		$this->CI->db->where('login', $registro['login']);
		$query = $this->CI->db->get('usuario');

		if ($query->num_rows() > 0 AND (!isset($registro['id']) OR ($registro['id'] != $query->row('id')))) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}