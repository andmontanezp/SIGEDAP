<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Ciudades extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->order_by('ciudad')
		->get('ciudades');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('ciudades');
		return $query->result();
	}

	function find($id){
		$this->db->where('id_ciudad', $id);
		return $this->db->get('ciudades')->row();
	}

	function findByEstado($id){
		$query = $this->db
		->select('ciudades.*')
		->from('ciudades')
		->where('id_estado', $id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('ciudades');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id_ciudad', $registro['id_ciudad']);
		$this->db->update('ciudades');
	}

	function delete($id){
		$this->db->where('id_ciudad', $id);
		$this->db->delete('ciudades');
	}
}