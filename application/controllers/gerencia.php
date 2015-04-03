<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gerencia extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Gerencia');
   }
	public function index(){
      $data['titulo'] = 'Gerencia';
      $data['contenido'] = 'gerencia/index';
      $data['query'] = $this->Model_Gerencia->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Gerencia';
      $data['contenido'] = 'gerencia/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Gerencia->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Gerencia';
      $data['contenido'] = 'gerencia/edit';
      //$id = $this->uri->segment(3);
      $data['registro'] = $this->Model_Gerencia->find($id);   
      $this->load->view('template', $data);
   }

   public function update(){
      $this->form_validation->set_rules('ger_descripcion', 'descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['ger_id']);
      } else {
         $registro["ger_id"] = $this->input->post('ger_id');
         $registro["ger_descripcion"] = $this->input->post('ger_descripcion');
         $registro["ger_usuario_actualizacion"] = $this->session->userdata('usuario_id');
         print_r($registro);
         $this->Model_Gerencia->update($registro);
         redirect('gerencia/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Gerencia';
      $data['contenido'] = 'gerencia/create';
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('ger_descripcion', 'Descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['ger_usuario_actualizacion'] = $this->session->userdata('usuario_id');
         $registro['ger_usuario_creacion'] = $this->session->userdata('usuario_id');
         $registro['ger_fecha_creacion'] = date('Y/m/d H:i:s');
         $registro['ger_actualizacion'] = date('Y/m/d H:i:s');
         $this->Model_Gerencia->insert($registro);
         redirect('gerencia/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Gerencia->delete($id);
      redirect('gerencia/index');
   }
}