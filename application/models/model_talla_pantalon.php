<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Talla_Pantalon extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('talla_pantalon');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('talla_pantalon');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('talla_pantalon')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('talla_pantalon');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('talla_pantalon');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('talla_pantalon');
	}
}