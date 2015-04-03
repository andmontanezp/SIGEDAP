<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Catalogo extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('opciones_catalogo');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('opciones_catalogo');
		return $query->result();
	}

	function allForMenu(){
		$this->db->order_by('oca_descripcion', 'asc');
		$query = $this->db->get('opciones_catalogo');
		return $query->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('opciones_catalogo')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('opciones_catalogo');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('opciones_catalogo');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('opciones_catalogo');
	}
}
	
?>