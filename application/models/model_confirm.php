<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Confirm extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('si_no');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('si_no');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('si_no')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('si_no');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('si_no');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('si_no');
	}
}