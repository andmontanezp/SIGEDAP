<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Alergia extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('tipo_alergia');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_alergia');
		return $query->result();
	}

	function find($id){
		$this->db->where('tal_id', $id);
		return $this->db->get('tipo_alergia')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_alergia');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('tal_id', $registro['tal_id']);
		$this->db->update('tipo_alergia');
	}

	function delete($id){
		$this->db->where('tal_id', $id);
		$this->db->delete('tipo_alergia');
	}
}