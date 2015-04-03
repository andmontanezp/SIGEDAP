<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HCM extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Historico_Movimientos');
   }
	public function index(){
      $data['titulo'] = 'HCM';
      $data['contenido'] = 'hcm/index';
      $data['query'] = $this->Model_Historico_Movimientos->all();
		$this->load->view('template', $data);
	}
   public function search(){
      $data['titulo'] = 'Genero';
      $data['contenido'] = 'hcm/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Historico_Movimientos->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Genero';
      $data['contenido'] = 'hcm/edit';
      //$id = $this->uri->segment(3);
      $data['registro'] = $this->Model_Historico_Movimientos->find($id);   
      $this->load->view('template', $data);
   }

   public function update(){
      $this->form_validation->set_rules('gen_descripcion', 'descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['gen_id']);
      } else {
         $registro["gen_id"] = $this->input->post('gen_id');
         $registro["gen_descripcion"] = $this->input->post('gen_descripcion');
         $registro["gen_usuario_actualizacion"] = $this->session->userdata('usuario_id');
         print_r($registro);
         $this->Model_Historico_Movimientos->update($registro);
         redirect('hcm/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Genero';
      $data['contenido'] = 'hcm/create';
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('gen_descripcion', 'Descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['gen_usuario_actualizacion'] = $this->session->userdata('usuario_id');
         $registro['gen_usuario_creacion'] = $this->session->userdata('usuario_id');
         $registro['gen_fecha_creacion'] = date('Y/m/d H:i:s');
         $this->Model_Historico_Movimientos->insert($registro);
         redirect('hcm/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Historico_Movimientos->delete($id);
      redirect('hcm/index');
   }

   public function buscarTrabajador(){
      $cedula = $this->input->post('tra_cedula');
      $this->load->model("Model_Trabajador");
      $trabajador[] = $this->Model_Trabajador->findByCedula($cedula);
      $allData = array();
      if (count($trabajador) > 0) {
         $this->load->model("Model_Familiar");
         $benef = $this->Model_Familiar->find($trabajador[0]->idtrabajador);
         if (count($benef) > 0) {
            $allData = array_merge($benef, $trabajador);
         } else {
            $allData = $trabajador;
         }
         echo json_encode($allData);   
      } else {
         $mensaje = array(array("idtrabajador" => "0", "mensaje" => "No se han encontrado registros..."));
         echo json_encode($mensaje);
      }
   }
}