<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Job extends CI_Model{
	private $nominadb;

    public function __construct() {
		$this->nominadb = $this->load->database(NOMINA_DATABASE, TRUE); 
	}
	public function executeQuery($queryString) {
		$query = $this->db->query($queryString);
	}

	public function getAllDataFromASL(){
		$query = 
			$this->db->select("DISTINCT(NT_IDTRABAJADOR)")->from("BATCH_ASLEMPLOYEESPROCESSOR")->get();
		return $query->result();
	}

	public function executeQueryOnOtherDatabase($databaseName = '', $queryString) {
		$query = $this->nominadb->query($queryString);
		return $query->result();
	}

	public function loadEmployeeInformation($employeeId){
		$query = 
			$this->db->select("*")->from("nomina.trabajador")->where("idtrabajador", $employeeId)->get();
		return $query->row();
	}

    // functions for change name of pictures

    public function loadAllPicturesAndEmployeeCodes() {
        $query =
            $this->db->select("codigotrabajador, foto")->from("trabajador")->where("foto !=", "")->get();
        return $query->result();
    }

}