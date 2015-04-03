<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobs extends CI_Controller{
	function __construct() {parent::__construct();
      $this->load->model("jobs/Model_Job");
      $this->output->enable_profiler(TRUE);
      $this->load->helper('file');
    }

    public function init($jobDescription = ''){
    	switch ($jobDescription) {
    		case 'test': {
    			$this->Model_Job->executeQuery(
	    			$this->prepareParamsForDiscover(
						"sigedap.trabajador st", 
						array('nomina.trabajador nt ON st.idtrabajador = nt.idtrabajador GROUP BY nt.idtrabajador HAVING count(st.idtrabajador) = 0' => 'RIGHT'),
						array("nt.idtrabajador", ASL_NOT_PROCESSED),
						array()
					)
    			);
    			sleep(3);
    			$employeesIdList = $this->Model_Job->getAllDataFromASL();

    			$logInfo = '';
    			foreach ($employeesIdList as $employeeId) {
    				$logInfo .="Trabajador a Procesar : ".$employeeId->NT_IDTRABAJADOR."\n";
    				$employee = $this->Model_Job->loadEmployeeInformation($employeeId->NT_IDTRABAJADOR);
    				$logInfo .="Nombre : ".$employee->nombres."\n";
    				$logInfo .="Apellidos : ".$employee->apellidos."\n";
    				$logInfo .="Nacionalidad : ".$employee->nacionalidad."\n";
    				$logInfo .="Nacionalidad SIGEDAP : ".$this->convertNacionality($employee->nacionalidad)."\n";
    				$logInfo .="Cedula : ".$employee->cedula."\n";
    				$logInfo .="Fecha Nacimiento : ".$employee->fechanac."\n";
    				$logInfo .="Genero : ".$employee->sexo."\n";
    				$logInfo .="Genero SIGEDAP : ".$this->convertGenre($employee->sexo)."\n";
    				$logInfo .="Estado Civil : ".$employee->estadocivil."\n";
    				$logInfo .="Direccion : ".$employee->direccion."\n";
    				$logInfo .="TelfHabitacion : ".$employee->telfhabitacion."\n";
    				$logInfo .="contactoopcional : ".$employee->contactoopcional."\n";

    				$logInfo .="//////////////////////////////////////////////////////////////////////////////////////\n";
    				#$this->Model_Job->insertFromAslTable();
    			}
    			if (!write_file("./asl_log.txt", $logInfo, FOPEN_WRITE_CREATE_DESTRUCTIVE)) {
    				echo "ERROR ESCRIBIENDO EL LOG DE EJECUCION...";
    			} else {
    				echo "EJECUCIÓN FINALIZADA, REVISE EL LOG PARA VERIFICAR LOS DETALLES...";
    			}
                break;
    		}
            # Script para cambiar el nombre de las imagenes
            case 'changePicturesName' : {
                $picturesAndCodesList = $this->Model_Job->loadAllPicturesAndEmployeeCodes();
                $logInfo = '';
                $index = 1;
                foreach ($picturesAndCodesList as $pictureAndCode) {
                    $logInfo .= 'Registro # '.$index."\n";
                    $logInfo .= 'Codigo a procesar : '.$pictureAndCode->codigotrabajador."\n";
                    $logInfo .= 'Ruta imagen : '.base_url("js/webcamjs/".$pictureAndCode->foto)."\n";
                    $logInfo .= 'Nueva Ruta imagen : '.base_url("js/webcamjs/newPictures/".$pictureAndCode->codigotrabajador)."\n";
                    $logInfo .="//////////////////////////////////////////////////////////////////////////////////////\n";

                }

                if (!write_file("/var/www/SIGEDAP/renamepictures_".date("dmYHis")."_log.txt", $logInfo, "x+")) {
                    echo "ERROR ESCRIBIENDO EL LOG DE EJECUCION...";
                } else {
                    echo "EJECUCIÓN FINALIZADA, REVISE EL LOG PARA VERIFICAR LOS DETALLES...";
                }
                #print_r($picturesAndCodesList);
                break;
            }
    	}
    }

    public function convertNacionality($wtdNacionality) {
    	if (substr_count(strtoupper($wtdNacionality), "VEN") > 0) {
    		return 1;
    	}
    	return 2;
    }

    public function convertGenre($wtdGenre) {
    	if (substr_count(strtoupper($wtdGenre), "MAS") > 0) {
    		return 1;
    	}
    	return 2;
    }

    public function prepareParamsForJob($paramsArray){
   		
    	if ($paramsArray != null && count($paramsArray) > 0) {
    		 
    	}
    }

    public function formatParams($param, $convertToUpper, $cleanBlankSpaces) {
		$param = ($cleanBlankSpaces) ? trim($param) : $param;
		$param = ($convertToUpper) ? strtoupper($param) : strtolower($param);
    	
    	return $param;
    }

	public function prepareParamsForDiscover($tableName, $joinTables, $columnNames, $conditions ='') {
    	$queryBuilder = "";
		
		//formatParams($param, $convertToUpper, $cleanBlankSpaces)
		   	
		$queryBuilder .="INSERT INTO BATCH_ASLEMPLOYEESPROCESSOR(NT_IDTRABAJADOR,EP_STATUS) ";
		$queryBuilder .="SELECT ";
		$queryBuilder .= $this->getParamsFromSimpleArray($columnNames);
		$queryBuilder .= " FROM ";
		$queryBuilder .= $this->formatParams($tableName, false, true);
		$queryBuilder .= $this->getJoinsFromKeyValueArray($joinTables);
		$queryBuilder .= $this->getParamsFromKeyValueArray($conditions);

    	return $queryBuilder;
    }

    public function getParamsFromSimpleArray($simpleArray) {
    	$index = 0;
    	$resultString = "";
    	foreach ($simpleArray as $token) {
			$resultString .= $this->formatParams($token, false, true);
			$resultString .= ($this->isLastElement($simpleArray, $index)) ? "," : " ";
			$index++;
    	}
    	return $resultString;
	}
	
	public function getParamsFromKeyValueArray($keyValueArray) {
		if ($keyValueArray == null || count($keyValueArray) == 0) {
			return '';
		}

		$index = 0;
		$resultString = " WHERE ";
    	foreach ($keyValueArray as $condition => $value) {
			$resultString .= $this->formatParams($condition, false, true)." = '".$value."'";
    		$resultString .= ($this->isLastElement($keyValueArray, $index)) ? "," : " ";
			$index++;
    	}
    	return $resultString;
	}

	public function getJoinsFromKeyValueArray($keyValueArray) {
		$resultString = " ";
    	foreach ($keyValueArray as $table => $joinType) {
			$resultString .= $this->formatParams($joinType, true, true)." JOIN ".$table." ";
    	}
    	return $resultString;
	}

    public function isLastElement($element, $index) {
    	if (count($element) - 1 > $index) {
    		return true;
		}
		return false;
    }

    public function jobDiscover() {

    }
    public function jobProcessor() {

    }
}