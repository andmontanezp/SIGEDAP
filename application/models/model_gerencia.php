<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Gerencia extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->select('g.*, u.nombre as ger_usuario_creacion, u2.nombre as ger_usuario_actualizacion')
		->from('gerencia g')
		->join('usuario u', 'g.ger_usuario_creacion = u.id', 'left')
		->join('usuario u2', 'g.ger_usuario_actualizacion = u2.id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('gerencia');
		return $query->result();
	}

	function find($ger_id){
		$this->db->where('ger_id', $ger_id);
		return $this->db->get('gerencia')->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('gerencia');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('ger_id', $registro['ger_id']);
		$this->db->update('gerencia');
	}

	function delete($ger_id){
		$this->db->where('ger_id', $ger_id);
		$this->db->delete('gerencia');
	}
}