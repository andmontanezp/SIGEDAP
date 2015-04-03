<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Historico_Movimientos extends CI_Model {
	function __construct(){
		//$this->output->enable_profiler(TRUE);
	}
	
	function all(){
		$query = $this->db->get('historico_movimientos');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('historico_movimientos');
		return $query->result();
	}

	function find($id){
		$query = $this->db->select('historico_movimientos.*, usuario.*, trabajador.*, s1.sed_descripcion as sede_anterior, s2.sed_descripcion as sede_nueva, c1.car_descripcion as cargo_anterior, c2.car_descripcion as cargo_nuevo', FALSE)
		->from('historico_movimientos')
		->join('trabajador', 'historico_movimientos.idtrabajador = trabajador.idtrabajador', 'LEFT')
		->join('cargo c1', 'historico_movimientos.idcargo_anterior = c1.car_id', 'LEFT')
		->join('cargo c2', 'historico_movimientos.idcargo = c2.car_id', 'LEFT')
		->join('coordinacion', 'c1.car_coordinacion_id = coordinacion.coo_id', 'LEFT')
		->join('gerencia', 'coordinacion.coo_gerencia_id = gerencia.ger_id', 'LEFT')
		->join('sede s1', 'historico_movimientos.idsede_anterior = s1.sed_id', 'LEFT')
		->join('sede s2', 'historico_movimientos.idsede = s2.sed_id', 'LEFT')
		->join('usuario', 'historico_movimientos.usuario_id = usuario.id', 'LEFT')
		->where('historico_movimientos.idtrabajador', $id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('historico_movimientos');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('historico_movimientos');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('historico_movimientos');
	}
}