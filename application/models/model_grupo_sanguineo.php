<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Grupo_Sanguineo extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('grupo_sanguineo');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('grupo_sanguineo');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('grupo_sanguineo')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('grupo_sanguineo');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('grupo_sanguineo');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('grupo_sanguineo');
	}
}
	
?>