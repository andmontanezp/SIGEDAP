<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Discapacidad extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('tipo_discapacidad');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_discapacidad');
		return $query->result();
	}

	function find($id){
		$this->db->where('tdi_id', $id);
		return $this->db->get('tipo_discapacidad')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_discapacidad');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('tdi_id', $registro['tdi_id']);
		$this->db->update('tipo_discapacidad');
	}

	function delete($id){
		$this->db->where('tdi_id', $id);
		$this->db->delete('tipo_discapacidad');
	}
}