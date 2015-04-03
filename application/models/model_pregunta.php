<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Pregunta extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->order_by('pre_descripcion')
		->get('pregunta');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('pregunta');
		return $query->result();
	}

	function find($sec_id){
		$query = $this->db
		->select("pregunta.*")
		->from("pregunta")
		->where('pre_seccion_id', $sec_id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('pregunta');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('pre_id', $registro['pre_id']);
		$this->db->update('pregunta');
	}

	function delete($pre_id){
		$this->db->where('pre_id', $pre_id);
		$this->db->delete('pregunta');
	}
}