<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Sede extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->select('s.*, u.nombre as sed_usuario_creacion, u2.nombre as sed_usuario_actualizacion')
		->from('sede s')
		->join('usuario u', 's.sed_usuario_creacion = u.id', 'left')
		->join('usuario u2', 's.sed_usuario_actualizacion = u2.id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('sede');
		return $query->result();
	}

	function find($nac_id){
		$this->db->where('sed_id', $nac_id);
		return $this->db->get('sede')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('sede');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('sed_id', $registro['sed_id']);
		$this->db->update('sede');
	}

	function delete($sed_id){
		$this->db->where('sed_id', $sed_id);
		$this->db->delete('sede');
	}
}