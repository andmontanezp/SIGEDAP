<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Grado extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('grado');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('grado');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('grado')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('grado');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('grado');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('grado');
	}
}