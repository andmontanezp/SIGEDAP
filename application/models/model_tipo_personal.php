<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Personal extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('tipo_personal');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_personal');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('tipo_personal')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_personal');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('tipo_personal');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('tipo_personal');
	}
}