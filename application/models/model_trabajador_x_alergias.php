<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Trabajador_X_Alergias extends CI_Model {
	function __construct(){
		//$this->output->enable_profiler(TRUE);
	}
	
	function all(){
		$query = $this->db
		->select('txa.*, tra.*, tes.*, aes.*')
		->from('trabajador_x_alergias txa')
		->join('trabajador tra', 'txa.txe_trabajador_id = tra.idtrabajador', 'left')
		->join('tipo_estudios tes', 'txa.txe_tipoestudio_id = tes.tes_id', 'left')
		->join('area_estudio aes', 'txa.txe_areaestudio_id = aes.aes_id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('trabajador_x_alergias');
		return $query->result();
	}

	function find($id){
		$query = $this->db->select('trabajador_x_alergias.*, tipo_alergia.*', FALSE)
		->from('trabajador_x_alergias')
		->join('tipo_alergia', 'trabajador_x_alergias.txa_tal_id = tipo_alergia.tal_id', 'LEFT')
		->where('txa_trab_id', $id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('trabajador_x_alergias');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('txa_id', $registro['txa_id']);
		$this->db->update('trabajador_x_alergias');
	}

	function delete($id){
		$this->db->where('txa_id', $id);
		$this->db->delete('trabajador_x_alergias');
	}
}