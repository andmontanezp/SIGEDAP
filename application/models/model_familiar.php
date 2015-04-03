<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Familiar extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('familiar');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('familiar');
		return $query->result();
	}

	function find($id){
		$query = $this->db->select("fam_nombres, fam_apellidos,fam_cedula, tfa_descripcion,fam_telefono,nacionalidad.nac_descripcion,(YEAR(CURDATE())-YEAR(fam_fechanac))-(RIGHT(CURDATE(),5)<RIGHT(fam_fechanac,5)) AS edad, usuario.nombre", FALSE)
		->from("familiar")
		->join("nacionalidad", "familiar.fam_nacionalidad_id = nacionalidad.nac_id", "left")
		->join("trabajador", "familiar.trabajador_id = trabajador.idtrabajador", "left")
		->join("tipo_familiar", "familiar.tipo_familiar_id = tipo_familiar.tfa_id", "left")
		->join("usuario", "familiar.usu_cre = usuario.id", "left")		
		->where("familiar.trabajador_id", $id)
		->get();
		return $query->result();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('familiar');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('familiar');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('familiar');
	}
}