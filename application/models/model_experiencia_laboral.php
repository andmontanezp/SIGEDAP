<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Experiencia_Laboral extends CI_Model {
	function __construct(){
		//$this->output->enable_profiler(TRUE);
	}
	
	function all(){
		$query = $this->db->get('experiencia_laboral');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('experiencia_laboral');
		return $query->result();
	}

	function find($id){
		$query = $this->db->select('experiencia_laboral.*, usuario.nombre AS nombreusuario, DATEDIFF(current_timestamp, fecharegistro) AS tiempo', FALSE)
		->from('experiencia_laboral')
		->join('usuario', 'experiencia_laboral.usuario_id = usuario.id', 'LEFT')
		->where('idtrabajador', $id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('experiencia_laboral');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('experiencia_laboral');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('experiencia_laboral');
	}
}