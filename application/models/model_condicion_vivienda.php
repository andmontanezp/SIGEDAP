<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Condicion_Vivienda extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('condicion_vivienda');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('condicion_vivienda');
		return $query->result();
	}

	function find($id){
		$this->db->where('cv_id', $id);
		return $this->db->get('condicion_vivienda')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('condicion_vivienda');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('cv_id', $registro['cv_id']);
		$this->db->update('condicion_vivienda');
	}

	function delete($id){
		$this->db->where('cv_id', $id);
		$this->db->delete('condicion_vivienda');
	}
}