<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Parroquias extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->order_by('parroquia')
		->get('parroquias');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('parroquias');
		return $query->result();
	}

	function find($id){
		$this->db->where('id_parroquia', $id);
		return $this->db->get('parroquias')->row();
	}

	function findByMunicipio($id){
		$query = $this->db
		->select('parroquias.*')
		->from('parroquias')
		->where('id_municipio', $id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('parroquias');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id_parroquia', $registro['id_parroquia']);
		$this->db->update('parroquias');
	}

	function delete($id){
		$this->db->where('id_parroquia', $id);
		$this->db->delete('parroquias');
	}
}