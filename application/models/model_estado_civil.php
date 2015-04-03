<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Estado_Civil extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->select('e.*, u.nombre as ec_usuario_creacion, u2.nombre as ec_usuario_actualizacion')
		->from('estado_civil e')
		->join('usuario u', 'e.ec_usuario_creacion = u.id', 'left')
		->join('usuario u2', 'e.ec_usuario_actualizacion = u2.id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('estado_civil');
		return $query->result();
	}

	function find($ec_id){
		$this->db->where('ec_id', $ec_id);
		return $this->db->get('estado_civil')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('estado_civil');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('ec_id', $registro['ec_id']);
		$this->db->update('estado_civil');
	}

	function delete($ec_id){
		$this->db->where('ec_id', $ec_id);
		$this->db->delete('estado_civil');
	}
}