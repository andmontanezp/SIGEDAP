<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sede extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Sede');
   }
	public function index(){
      $data['titulo'] = 'Sedes';
      $data['contenido'] = 'sede/index';
      $data['query'] = $this->Model_Sede->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Sedes';
      $data['contenido'] = 'sede/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Sede->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Sedes';
      $data['contenido'] = 'sede/edit';
      //$id = $this->uri->segment(3);
      $data['registro'] = $this->Model_Sede->find($id);   
      $this->load->view('template', $data);
   }

   public function update(){
      $this->form_validation->set_rules('sed_descripcion', 'descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['sed_id']);
      } else {
         $registro["sed_id"] = $this->input->post('sed_id');
         $registro["sed_descripcion"] = $this->input->post('sed_descripcion');
         $registro["sed_usuario_actualizacion"] = $this->session->userdata('usuario_id');
         print_r($registro);
         $this->Model_Sede->update($registro);
         redirect('sede/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Sedes';
      $data['contenido'] = 'sede/create';
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('sed_descripcion', 'Descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['sed_usuario_actualizacion'] = $this->session->userdata('usuario_id');
         $registro['sed_usuario_creacion'] = $this->session->userdata('usuario_id');
         $registro['sed_fecha_creacion'] = date('Y/m/d H:i:s');
         $this->Model_Sede->insert($registro);
         redirect('sede/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Sede->delete($id);
      redirect('sede/index');
   }
}