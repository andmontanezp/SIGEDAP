<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Vivienda extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('tipo_vivienda');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_vivienda');
		return $query->result();
	}

	function find($id){
		$this->db->where('tv_id', $id);
		return $this->db->get('tipo_vivienda')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_vivienda');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('tv_id', $registro['tv_id']);
		$this->db->update('tipo_vivienda');
	}

	function delete($id){
		$this->db->where('tv_id', $id);
		$this->db->delete('tipo_vivienda');
	}
}