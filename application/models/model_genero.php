<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Genero extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->select('g.*, u.nombre as gen_usuario_creacion, u2.nombre as gen_usuario_actualizacion')
		->from('genero g')
		->join('usuario u', 'g.gen_usuario_creacion = u.id', 'left')
		->join('usuario u2', 'g.gen_usuario_actualizacion = u2.id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('genero');
		return $query->result();
	}

	function find($gen_id){
		$this->db->where('gen_id', $gen_id);
		return $this->db->get('genero')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('genero');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('gen_id', $registro['gen_id']);
		$this->db->update('genero');
	}

	function delete($gen_id){
		$this->db->where('gen_id', $gen_id);
		$this->db->delete('genero');
	}
}