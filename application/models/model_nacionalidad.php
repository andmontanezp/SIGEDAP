<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Nacionalidad extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->select('n.*, u.nombre as nac_usuario_creacion, u2.nombre as nac_usuario_actualizacion')
		->from('nacionalidad n')
		->join('usuario u', 'n.nac_usuario_creacion = u.id', 'left')
		->join('usuario u2', 'n.nac_usuario_actualizacion = u2.id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('nacionalidad');
		return $query->result();
	}

	function find($nac_id){
		$this->db->where('nac_id', $nac_id);
		return $this->db->get('nacionalidad')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('nacionalidad');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('nac_id', $registro['nac_id']);
		$this->db->update('nacionalidad');
	}

	function delete($nac_id){
		$this->db->where('nac_id', $nac_id);
		$this->db->delete('nacionalidad');
	}
}