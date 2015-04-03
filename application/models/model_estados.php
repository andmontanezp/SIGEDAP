<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Estados extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->order_by('estado')
		->get('estados');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('estados');
		return $query->result();
	}

	function find($id){
		$this->db->where('id_estado', $id);
		return $this->db->get('estados')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('estados');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id_estado', $registro['id_estado']);
		$this->db->update('estados');
	}

	function delete($id){
		$this->db->where('id_estado', $id);
		$this->db->delete('estados');
	}
}