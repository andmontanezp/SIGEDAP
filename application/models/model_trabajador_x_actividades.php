<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Trabajador_X_Actividades extends CI_Model {
	function __construct(){
		//$this->output->enable_profiler(TRUE);
	}
	
	function all(){
		$query = $this->db
		->select('txe.*, tra.*, tes.*, aes.*')
		->from('trabajador_x_estudios txe')
		->join('trabajador tra', 'txe.txe_trabajador_id = tra.idtrabajador', 'left')
		->join('tipo_estudios tes', 'txe.txe_tipoestudio_id = tes.tes_id', 'left')
		->join('area_estudio aes', 'txe.txe_areaestudio_id = aes.aes_id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('trabajador_x_estudios');
		return $query->result();
	}

	function find($id){
		$query = $this->db->select('trabajador_x_actividades.*, tipo_actividad.*', FALSE)
		->from('trabajador_x_actividades')
		->join('tipo_actividad', 'trabajador_x_actividades.txa_tipoactividad_id = tipo_actividad.ta_id', 'LEFT')
		->where('txa_trabajador_id', $id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('trabajador_x_actividades');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('trabajador_x_actividades');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('trabajador_x_actividades');
	}
}