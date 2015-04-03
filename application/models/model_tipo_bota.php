<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Bota extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('tipo_bota');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_bota');
		return $query->result();
	}

	function find($id){
		$this->db->where('tb_id', $id);
		return $this->db->get('tipo_bota')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_bota');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('tb_id', $registro['tb_id']);
		$this->db->update('tipo_bota');
	}

	function delete($id){
		$this->db->where('tb_id', $id);
		$this->db->delete('tipo_bota');
	}
}