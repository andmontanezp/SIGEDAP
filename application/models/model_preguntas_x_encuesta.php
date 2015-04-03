<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Preguntas_X_Encuesta extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->select('pxe.*, enc.*, pre.*')
		->from('pregunta_x_encuesta pxe')
		->join('encuesta enc', 'pxe.pxe_encuesta_id = enc.enc_id', 'left')
		->join('pregunta pre', 'pxe.pxe_pregunta_id = pre.pre_id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('pregunta_x_encuesta');
		return $query->result();
	}

	function find($enc_id){
		$query = $this->db
		->select('pxe.*, enc.*, pre.*')
		->from('pregunta_x_encuesta pxe')
		->join('encuesta enc', 'pxe.pxe_encuesta_id = enc.enc_id', 'left')
		->join('pregunta pre', 'pxe.pxe_pregunta_id = pre.pre_id', 'left')
		->where('pxe_encuesta_id', $enc_id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('pregunta_x_encuesta');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('enc_id', $registro['enc_id']);
		$this->db->update('pregunta_x_encuesta');
	}

	function delete($enc_id){
		$this->db->where('enc_id', $enc_id);
		$this->db->delete('pregunta_x_encuesta');
	}
}