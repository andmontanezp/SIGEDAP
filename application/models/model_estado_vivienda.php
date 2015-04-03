<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Estado_Vivienda extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('estado_vivienda');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('estado_vivienda');
		return $query->result();
	}

	function find($id){
		$this->db->where('ev_id', $id);
		return $this->db->get('estado_vivienda')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('estado_vivienda');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('ev_id', $registro['ev_id']);
		$this->db->update('estado_vivienda');
	}

	function delete($id){
		$this->db->where('ev_id', $id);
		$this->db->delete('estado_vivienda');
	}
}