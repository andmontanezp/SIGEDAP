<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Coordinacion extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->select('g.ger_descripcion as gerencia, c.*, u.nombre as coo_usuario_creacion, u2.nombre as coo_usuario_actualizacion')
		->from('coordinacion c')
		->join('usuario u', 'c.coo_usuario_creacion = u.id', 'left')
		->join('usuario u2', 'c.coo_usuario_actualizacion = u2.id', 'left')
		->join('gerencia g', 'c.coo_gerencia_id = g.ger_id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('coordinacion');
		return $query->result();
	}

	function find($coo_id){
		$this->db->where('coo_id', $coo_id);
		return $this->db->get('coordinacion')->row();
	}

	function findByGerencia($gerencia_id){
		$this->db->where('coo_gerencia_id', $gerencia_id);
		return $this->db->get('coordinacion')->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('coordinacion');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('coo_id', $registro['coo_id']);
		$this->db->update('coordinacion');
	}

	function delete($coo_id){
		$this->db->where('coo_id', $coo_id);
		$this->db->delete('coordinacion');
	}

	function getGerencias(){
		$lista = array();
		$this->load->model('Model_Gerencia');
		$registros = $this->Model_Gerencia->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->ger_id] = $registro->ger_descripcion;
		}
		return $lista;
	}
}