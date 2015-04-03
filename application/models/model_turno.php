<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Turno extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->order_by('tur_descripcion')
		->get('turno');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('turno');
		return $query->result();
	}

	function find($id){
		$this->db->where('tur_id', $id);
		return $this->db->get('turno')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('turno');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('tur_id', $registro['tur_id']);
		$this->db->update('turno');
	}

	function delete($id){
		$this->db->where('tur_id', $id);
		$this->db->delete('turno');
	}
}