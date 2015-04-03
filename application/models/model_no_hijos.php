<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_No_Hijos extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('nohijos');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('nohijos');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('nohijos')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('nohijos');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('nohijos');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('nohijos');
	}
}
	
?>