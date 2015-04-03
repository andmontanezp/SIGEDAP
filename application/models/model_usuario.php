<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Usuario extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$this->db->select('usuario.*, perfil.nombre AS nombre_perfil');
		$this->db->from('usuario');
		$this->db->join('perfil', 'usuario.perfil_id = perfil.id', 'left');
		
		$query = $this->db->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->select('usuario.*, perfil.nombre AS nombre_perfil');
		$this->db->from('usuario');
		$this->db->join('perfil', 'usuario.perfil_id = perfil.id', 'left');
		$this->db->like($field, $value);
		$query = $this->db->get();
		return $query->result();
	}

	function find($id){
		$this->db->select('usuario.*, perfil.nombre AS nombre_perfil');
		$this->db->from('usuario');
		$this->db->join('perfil', 'usuario.perfil_id = perfil.id', 'left');

		$query = $this->db->where('usuario.id', $id);
		return $this->db->get()->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('usuario');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('usuario');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('usuario');
	}

	function getPerfiles(){
		$lista = array();
		$this->load->model('Model_Perfil');
		$registros = $this->Model_Perfil->all();
		foreach ($registros as $registro) {
			$lista[$registro->id] = $registro->nombre;
		}
		return $lista;
	}

	function get_login($user, $pass){
		$this->db->where('login', $user);
		$this->db->where('password', $pass);
		return $this->db->get('usuario');
	}
}
?>