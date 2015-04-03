<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Area_Estudios extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->get('area_estudio');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('area_estudio');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('area_estudio')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('area_estudio');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('area_estudio');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('area_estudio');
	}
}