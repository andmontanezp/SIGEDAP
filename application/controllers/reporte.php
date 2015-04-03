<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Trabajador_Audit');
      //$this->output->enable_profiler(TRUE);
   }
	public function index(){
      $data['titulo'] = 'Reporte';
      $data['contenido'] = 'reporte/index';
		$this->load->view('template', $data);
	}
   public function buscar(){
      $data['titulo'] = 'Reporte';
      $data['contenido'] = 'reporte/index';
      $fecha_desde = $this->input->post('fecha_desde');
      $fecha_hasta = $this->input->post('fecha_hasta');
      $data['query'] = $this->Model_Trabajador_Audit->allFilteredByDate($fecha_desde, $fecha_hasta);
      $data['num_rows'] = $this->Model_Trabajador_Audit->numRowsFilteredByDate($fecha_desde, $fecha_hasta);
      $data['bienestar'] = $this->Model_Trabajador_Audit->numRowsFilteredByDateAndDepartamento($fecha_desde, $fecha_hasta, 6);
      $data['registro'] = $this->Model_Trabajador_Audit->numRowsFilteredByDateAndDepartamento($fecha_desde, $fecha_hasta, 4);
      $this->load->view('template', $data);
   }
}