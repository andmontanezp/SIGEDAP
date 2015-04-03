<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Respuestas_X_Trabajador extends CI_Model {
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

	function find($tra_id){
		$query = $this->db
		->select('rxt.*, pxe.*, pre.*')
		->from('respuestas_x_trabajador rxt')
		->join('pregunta_x_encuesta pxe', 'pxe.pxe_id = rxt.rxt_pregunta_encuesta_id', 'left')
		->join('pregunta pre', 'pxe.pxe_pregunta_id = pre.pre_id', 'left')
		->where('rxt_trabajador_id', $tra_id)
		->get();
		return $query->result();
	}

	function findBySectionAndId($sec_id, $tra_id){
		$query = $this->db
		->select('rxt.*, pxe.*, pre.*')
		->from('respuestas_x_trabajador rxt')
		->join('pregunta_x_encuesta pxe', 'pxe.pxe_id = rxt.rxt_pregunta_encuesta_id', 'left')
		->join('pregunta pre', 'pxe.pxe_pregunta_id = pre.pre_id', 'left')
		->where('rxt_trabajador_id', $tra_id)
		->where('pre_seccion_id', $sec_id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('respuestas_x_trabajador');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('rxt_id', $registro['rxt_id']);
		$this->db->update('respuestas_x_trabajador');
	}

	function delete($enc_id){
		$this->db->where('enc_id', $enc_id);
		$this->db->delete('respuestas_x_trabajador');
	}
}