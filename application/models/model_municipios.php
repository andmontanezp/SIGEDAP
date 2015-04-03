<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Municipios extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->order_by('municipio')
		->get('municipios');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('municipios');
		return $query->result();
	}

	function find($id){
		$this->db->where('id_municipio', $id);
		return $this->db->get('municipios')->row();
	}

	function findByEstado($id){
		$query = $this->db
		->select('municipios.*')
		->from('municipios')
		->where('id_estado', $id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('municipios');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id_municipio', $registro['id_municipio']);
		$this->db->update('municipios');
	}

	function delete($id){
		$this->db->where('id_municipio', $id);
		$this->db->delete('municipios');
	}
}