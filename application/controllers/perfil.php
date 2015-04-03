<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->library('perfilLib');
      $this->load->model('Model_Perfil');
      $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
      $this->form_validation->set_message('norep', 'Ya existe un registro con el mismo nombre.');
   }
	public function index(){
      $data['titulo'] = 'Perfiles';
      $data['contenido'] = 'perfil/index';
      $data['query'] = $this->Model_Perfil->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Perfiles';
      $data['contenido'] = 'perfil/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Perfil->allFilter('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Editar';
      $data['contenido'] = 'perfil/edit';
      //$id = $this->uri->segment(3);
      $data['registro'] = $this->Model_Perfil->find($id);
      $this->load->view('template', $data);
   }

   public function update(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_norep');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['id']);
      } else {
         $registro['fecha_actualizacion'] = date('Y/m/d H:i');
         $this->Model_Perfil->update($registro);
         redirect('perfil/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Crear';
      $data['contenido'] = 'perfil/create';
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_norep');

      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['fecha_creacion'] = date('Y/m/d H:i');
         $registro['fecha_actualizacion'] = date('Y/m/d H:i');
         $this->Model_Perfil->insert($registro);
         redirect('perfil/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'perfil/delete';
      $this->Model_Perfil->delete($id);
      redirect('perfil/index');
   }

   public function norep(){
      return $this->perfillib->norep($this->input->post());
   }
}