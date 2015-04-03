<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Secciones_Cuestionario extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('secciones_cuestionario');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('secciones_cuestionario');
		return $query->result();
	}

	function find($sec_id){
		$this->db->where('sec_id', $sec_id);
		return $this->db->get('secciones_cuestionario')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('secciones_cuestionario');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('sec_id', $registro['sec_id']);
		$this->db->update('secciones_cuestionario');
	}

	function delete($sec_id){
		$this->db->where('sec_id', $sec_id);
		$this->db->delete('secciones_cuestionario');
	}
}