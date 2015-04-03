<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Encuesta extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->order_by('enc_descripcion')
		->get('encuesta');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('encuesta');
		return $query->result();
	}

	function find($enc_id){
		$this->db->where('enc_id', $enc_id);
		return $this->db->get('encuesta')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('encuesta');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('enc_id', $registro['enc_id']);
		$this->db->update('encuesta');
	}

	function delete($enc_id){
		$this->db->where('enc_id', $enc_id);
		$this->db->delete('encuesta');
	}
}