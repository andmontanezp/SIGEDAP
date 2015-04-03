<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Cargo extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->select('coo.coo_descripcion as coordinacion,c.*, u.nombre as car_usuario_creacion, u2.nombre as car_usuario_actualizacion')
		->from('cargo c')
		->join('usuario u', 'c.car_usuario_creacion = u.id', 'left')
		->join('usuario u2', 'c.car_usuario_actualizacion = u2.id', 'left')
		->join('coordinacion coo', 'c.car_coordinacion_id = coo.coo_id', 'left')
		->get();
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('cargo');
		return $query->result();
	}

	function find($cargo_id){
		$query = $this->db->select('ger_id as gerencia_id, coo.coo_id as coordinacion_id, coo.coo_descripcion as coordinacion,c.*, u.nombre as car_usuario_creacion, u2.nombre as car_usuario_actualizacion')
		->from('cargo c')
		->join('usuario u', 'c.car_usuario_creacion = u.id', 'left')
		->join('usuario u2', 'c.car_usuario_actualizacion = u2.id', 'left')
		->join('coordinacion coo', 'c.car_coordinacion_id = coo.coo_id', 'left')
		->join('gerencia ger', 'coo.coo_gerencia_id = ger.ger_id', 'left')
		->where('car_id', $cargo_id)
		->get();
		return $query->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('cargo');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('car_id', $registro['car_id']);
		$this->db->update('cargo');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('cargo');
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

	function getCoordinaciones($gerencia_id){
		$lista = array();
		$this->load->model('Model_Coordinacion');
		$registros = $this->Model_Coordinacion->findByGerencia($gerencia_id);
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->coo_id] = $registro->coo_descripcion;
		}
		return $lista;
	}
}