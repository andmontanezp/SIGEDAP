<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_PerfilLib{
	public function __construct(){
        $this->CI =& get_instance();
		$this->CI->load->model('Model_Menu_Perfil');
	}

	public function dar_acceso($perfil_id, $menu_id){
		$registro = array();
		$registro['menu_id'] = $menu_id;
		$registro['perfil_id'] = $perfil_id;
		$registro['fecha_creacion'] = date('Y/m/d H:i:s');
		$registro['fecha_actualizacion'] = date('Y/m/d H:i:s');
		
		$this->CI->Model_Menu_Perfil->insert($registro);
	}
	
	public function quitar_acceso($perfil_id, $menu_id){
		$this->CI->db->where('perfil_id', $perfil_id);
		$this->CI->db->where('menu_id', $menu_id);
		$this->CI->db->delete('menu_perfil');
		$this->CI->Model_Menu_Perfil->delete($registro);
	}

	public function findByMenuAndPerfil($menu_id, $perfil_id){
		$this->CI->db->where('menu_id', $menu_id);
		$this->CI->db->where('perfil_id', $perfil_id);
		return $this->CI->db->get('menu_perfil')->row();
	}

	public function findByMenuAndPerfil2($menu_id, $perfil_id){
		$this->CI->db->where('opcion_id', $menu_id);
		$this->CI->db->where('perfil_id', $perfil_id);
		return $this->CI->db->get('opciones_catalogo_perfil')->row();
	}

}