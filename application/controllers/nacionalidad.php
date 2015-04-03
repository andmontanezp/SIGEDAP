<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nacionalidad extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Nacionalidad');
   }
	public function index(){
      $data['titulo'] = 'Nacionalidad';
      $data['contenido'] = 'nacionalidad/index';
      $data['query'] = $this->Model_Nacionalidad->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Nacionalidad';
      $data['contenido'] = 'nacionalidad/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Nacionalidad->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Nacionalidad';
      $data['contenido'] = 'nacionalidad/edit';
      //$id = $this->uri->segment(3);
      $data['registro'] = $this->Model_Nacionalidad->find($id);   
      $this->load->view('template', $data);
   }

   public function update(){
      $this->form_validation->set_rules('nac_descripcion', 'descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['nac_id']);
      } else {
         $registro["nac_id"] = $this->input->post('nac_id');
         $registro["nac_descripcion"] = $this->input->post('nac_descripcion');
         $registro["nac_usuario_actualizacion"] = $this->session->userdata('usuario_id');
         print_r($registro);
         $this->Model_Nacionalidad->update($registro);
         redirect('nacionalidad/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Nacionalidad';
      $data['contenido'] = 'nacionalidad/create';
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('nac_descripcion', 'Descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['nac_usuario_actualizacion'] = $this->session->userdata('usuario_id');
         $registro['nac_usuario_creacion'] = $this->session->userdata('usuario_id');
         $registro['nac_fecha_creacion'] = date('Y/m/d H:i:s');
         $this->Model_Nacionalidad->insert($registro);
         redirect('nacionalidad/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Nacionalidad->delete($id);
      redirect('nacionalidad/index');
   }
}