<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Document');
   }
	public function index(){
      $data['titulo'] = 'Documentos';
      $data['contenido'] = 'document/index';
      $data['query'] = $this->Model_Document->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Cargo';
      $data['contenido'] = 'cargo/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Genero->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Cargo';
      $data['contenido'] = 'cargo/edit';
      //$id = $this->uri->segment(3);
      $data['gerencias'] = $this->Model_Cargo->getGerencias();
      $data['registro'] = $this->Model_Cargo->find($id);   
      $this->load->view('template', $data);
   }

   public function update(){
      $this->form_validation->set_rules('car_descripcion', 'descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['gen_id']);
      } else {
         $registro["car_id"] = $this->input->post('car_id');
         $registro["car_descripcion"] = $this->input->post('car_descripcion');
         $registro["car_coordinacion_id"] = $this->input->post('car_coordinacion_id');
         $registro["car_usuario_actualizacion"] = $this->session->userdata('usuario_id');
         $this->Model_Cargo->update($registro);
         redirect('cargo/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Cargo';
      $data['contenido'] = 'cargo/create';
      $data['gerencias'] = $this->Model_Cargo->getGerencias();   
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('car_descripcion', 'Descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['car_usuario_actualizacion'] = $this->session->userdata('usuario_id');
         $registro['car_usuario_creacion'] = $this->session->userdata('usuario_id');
         $registro['car_fecha_creacion'] = date('Y/m/d H:i:s');
         $this->Model_Cargo->insert($registro);
         redirect('cargo/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Cargo->delete($id);
      redirect('cargo/index');
   }

   public function llenarCoordinaciones(){
      if ($this->input->post('car_gerencia_id')) {
         $car_gerencia_id = $this->input->post('car_gerencia_id');
         $cargo_id = $this->input->post('cargo_id');
         $cargo = $this->Model_Cargo->find($cargo_id); 
         $coordinaciones = $this->Model_Cargo->getCoordinaciones($car_gerencia_id);
         echo form_dropdown('car_coordinacion_id', $coordinaciones, $cargo->coordinacion_id, "class='form-control' id='car_gerencia_id'");
      }
   }
}