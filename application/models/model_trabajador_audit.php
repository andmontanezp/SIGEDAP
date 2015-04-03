<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Trabajador_Audit extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db
		->order_by('car_descripcion')
		->get('cargo');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->where($field, $value);
		$query = $this->db->get('cargo');
		return $query->result();
	}

	function allFilteredByDate($date1, $date2){
		$this->db->select("count(*) as rows, perfil.nombre as perfil, usuario.nombre, trabajador.tra_nombres, trabajador.tra_apellidos, trabajador.tra_cedula, trabajador_audit.*, (select count(*) from trabajador_audit where date(fecha) between '$date1' AND '$date2' having count(trabajador_id) > 1) as cantidad", FALSE);
		$this->db->from("trabajador_audit");
		$this->db->join("trabajador", "trabajador.idtrabajador = trabajador_audit.trabajador_id", 'left');
		$this->db->join("usuario", "usuario.id = trabajador_audit.usuario_id", 'left');
		$this->db->join("perfil", "usuario.perfil_id = perfil.id", 'left');
		$this->db->where("date(fecha) between '$date1' AND '$date2'");
		$this->db->group_by("trabajador_id");
		$this->db->order_by("fecha", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	function numRowsFilteredByDate($date1, $date2){
		$this->db->select("count(*) as rows, perfil.nombre as perfil, usuario.nombre, trabajador.tra_nombres, trabajador.tra_apellidos, trabajador.tra_cedula, trabajador_audit.*, (select count(*) from trabajador_audit where date(fecha) between '$date1' AND '$date2' having count(trabajador_id) > 1) as cantidad", FALSE);
		$this->db->from("trabajador_audit");
		$this->db->join("trabajador", "trabajador.idtrabajador = trabajador_audit.trabajador_id", 'left');
		$this->db->join("usuario", "usuario.id = trabajador_audit.usuario_id", 'left');
		$this->db->join("perfil", "usuario.perfil_id = perfil.id", 'left');
		$this->db->where("date(fecha) between '$date1' AND '$date2'");
		$this->db->group_by("trabajador_id");
		$this->db->order_by("fecha");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function numRowsFilteredByDateAndDepartamento($date1, $date2, $perfil_id){
		$this->db->select("count(*) as rows, perfil.nombre as perfil, usuario.nombre, trabajador.tra_nombres, trabajador.tra_apellidos, trabajador.tra_cedula, trabajador_audit.*, (select count(*) from trabajador_audit where date(fecha) between '$date1' AND '$date2' having count(trabajador_id) > 1) as cantidad", FALSE);
		$this->db->from("trabajador_audit");
		$this->db->join("trabajador", "trabajador.idtrabajador = trabajador_audit.trabajador_id", 'left');
		$this->db->join("usuario", "usuario.id = trabajador_audit.usuario_id", 'left');
		$this->db->join("perfil", "usuario.perfil_id = perfil.id", 'left');
		$this->db->where("date(fecha) between '$date1' AND '$date2'");
		$this->db->where("perfil_id = $perfil_id");
		$this->db->group_by("trabajador_id");
		$this->db->order_by("fecha");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('cargo')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('cargo');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('cargo');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('cargo');
	}
}