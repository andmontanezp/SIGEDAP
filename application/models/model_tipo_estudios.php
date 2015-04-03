<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Estudios extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('tipo_estudios');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_estudios');
		return $query->result();
	}

	function find($tes_id){
		$this->db->where('tes_id', $tes_id);
		return $this->db->get('tipo_estudios')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_estudios');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('tes_id', $registro['tes_id']);
		$this->db->update('tipo_estudios');
	}

	function delete($tes_id){
		$this->db->where('tes_id', $tes_id);
		$this->db->delete('tipo_estudios');
	}
}