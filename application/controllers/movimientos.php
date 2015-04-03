<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movimientos extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Historico_Movimientos');
   }
	public function index(){
      $data['titulo'] = 'Movimientos';
      $data['contenido'] = 'movimientos/index';
      $data['query'] = $this->Model_Historico_Movimientos->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Genero';
      $data['contenido'] = 'movimientos/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Historico_Movimientos->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Genero';
      $data['contenido'] = 'movimientos/edit';
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
         redirect('movimientos/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Genero';
      $data['contenido'] = 'movimientos/create';
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
         redirect('movimientos/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Historico_Movimientos->delete($id);
      redirect('movimientos/index');
   }
}