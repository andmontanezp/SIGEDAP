<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Familiar extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('tipo_familiar');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_familiar');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('tipo_familiar')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_familiar');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('tfa_id', $registro['tfa_id']);
		$this->db->update('tipo_familiar');
	}

	function delete($tfa_id){
		$this->db->where('tfa_id', $tfa_id);
		$this->db->delete('tipo_familiar');
	}
}