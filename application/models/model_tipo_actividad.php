<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Actividad extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('tipo_actividad');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_actividad');
		return $query->result();
	}

	function find($id){
		$this->db->where('ta_id', $id);
		return $this->db->get('tipo_actividad')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_actividad');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('ta_id', $registro['ta_id']);
		$this->db->update('tipo_actividad');
	}

	function delete($id){
		$this->db->where('ta_id', $id);
		$this->db->delete('tipo_actividad');
	}
}