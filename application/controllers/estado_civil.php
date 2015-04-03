<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estado_Civil extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Estado_Civil');
   }
	public function index(){
      $data['titulo'] = 'Estado_Civil';
      $data['contenido'] = 'estado_civil/index';
      $data['query'] = $this->Model_Estado_Civil->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Estado_Civil';
      $data['contenido'] = 'estado_civil/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Estado_Civil->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Estado_Civil';
      $data['contenido'] = 'estado_civil/edit';
      //$id = $this->uri->segment(3);
      $data['registro'] = $this->Model_Estado_Civil->find($id);   
      $this->load->view('template', $data);
   }

   public function update(){
      $this->form_validation->set_rules('ec_descripcion', 'descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['ec_id']);
      } else {
         $registro["ec_id"] = $this->input->post('ec_id');
         $registro["ec_descripcion"] = $this->input->post('ec_descripcion');
         $registro["ec_usuario_actualizacion"] = $this->session->userdata('usuario_id');
         print_r($registro);
         $this->Model_Estado_Civil->update($registro);
         redirect('estado_civil/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Estado_Civil';
      $data['contenido'] = 'estado_civil/create';
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('ec_descripcion', 'Descripcion', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['ec_usuario_actualizacion'] = $this->session->userdata('usuario_id');
         $registro['ec_usuario_creacion'] = $this->session->userdata('usuario_id');
         $registro['ec_fecha_creacion'] = date('Y/m/d H:i:s');
         $this->Model_Estado_Civil->insert($registro);
         redirect('estado_civil/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Estado_Civil->delete($id);
      redirect('estado_civil/index');
   }
}