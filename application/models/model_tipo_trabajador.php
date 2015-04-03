<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tipo_Trabajador extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->select('ttr.*, u.nombre as ttr_usuario_creacion, u2.nombre as ttr_usuario_actualizacion')
		->from('tipo_trabajador ttr')
		->join('usuario u', 'ttr.ttr_usuario_creacion = u.id', 'left')
		->join('usuario u2', 'ttr.ttr_usuario_actualizacion = u2.id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('tipo_trabajador');
		return $query->result();
	}

	function find($ttr_id){
		$this->db->where('ttr_id', $ttr_id);
		return $this->db->get('tipo_trabajador')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('tipo_trabajador');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('ttr_id', $registro['ttr_id']);
		$this->db->update('tipo_trabajador');
	}

	function delete($ttr_id){
		$this->db->where('ttr_id', $ttr_id);
		$this->db->delete('tipo_trabajador');
	}
}