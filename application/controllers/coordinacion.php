<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coordinacion extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Coordinacion');
   }
	public function index(){
      $data['titulo'] = 'Coordinacion';
      $data['contenido'] = 'coordinacion/index';
      $data['query'] = $this->Model_Coordinacion->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Coordinacion';
      $data['contenido'] = 'coordinacion/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Genero->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Coordinacion';
      $data['contenido'] = 'coordinacion/edit';
      //$id = $this->uri->segment(3);
      $data['gerencias'] = $this->Model_Coordinacion->getGerencias();  
      $data['registro'] = $this->Model_Coordinacion->find($id);   
      $this->load->view('template', $data);
   }

   public function update(){
      $this->form_validation->set_rules('coo_descripcion', 'descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['gen_id']);
      } else {
         $registro["coo_id"] = $this->input->post('gen_id');
         $registro["coo_gerencia_id"] = $this->input->post('coo_gerencia_id');
         $registro["coo_descripcion"] = $this->input->post('coo_descripcion');
         $registro["coo_usuario_actualizacion"] = $this->session->userdata('usuario_id');
         print_r($registro);
         $this->Model_Coordinacion->update($registro);
         redirect('coordinacion/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Coordinacion';
      $data['contenido'] = 'coordinacion/create';
      $data['gerencias'] = $this->Model_Coordinacion->getGerencias();
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('coo_descripcion', 'Descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['coo_usuario_actualizacion'] = $this->session->userdata('usuario_id');
         $registro['coo_usuario_creacion'] = $this->session->userdata('usuario_id');
         $registro['coo_fecha_creacion'] = date('Y/m/d H:i:s');
         $registro['coo_actualizacion'] = date('Y/m/d H:i:s');
         $this->Model_Coordinacion->insert($registro);
         redirect('coordinacion/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Coordinacion->delete($id);
      redirect('coordinacion/index');
   }
}