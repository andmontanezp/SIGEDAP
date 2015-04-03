<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Usuario');
      $this->load->library('usuarioLib');
      $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
      $this->form_validation->set_message('my_validation', 'Ya existe un usuario con ese nombre');
      $this->form_validation->set_message('valid_email', 'Email invalido.');
   }
	public function index(){
      $data['titulo'] = 'Usuarios';
      $data['contenido'] = 'usuario/index';
      $data['query'] = $this->Model_Usuario->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Menu';
      $data['contenido'] = 'usuario/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Usuario->allFiltered('usuario.nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Editar';
      $data['contenido'] = 'usuario/edit';
      $data['registro'] = $this->Model_Usuario->find($id);
      $data['perfiles'] = $this->Model_Usuario->getPerfiles();
      $this->load->view('template', $data);
   }

   public function update(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_norep');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['id']);
      } else {
         $registro['fecha_actualizacion'] = date('Y/m/d H:i');
         $this->Model_Usuario->update($registro);
         redirect('usuario/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Crear Usuario';
      $data['contenido'] = 'usuario/create';
      $data['perfiles'] = $this->Model_Usuario->getPerfiles();
      $this->load->view('template', $data);
   }

   public function my_validation(){
      return $this->usuariolib->my_validation($this->input->post());
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('login', 'Login', 'required|callback_my_validation');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['password'] = sha1($registro['login']);
         $registro['fecha_creacion'] = date('Y/m/d H:i');
         $registro['fecha_actualizacion'] = date('Y/m/d H:i');
         $this->Model_Usuario->insert($registro);
         redirect('usuario/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'usuario/delete';
      $this->Model_Usuario->delete($id);
      redirect('usuario/index');
   }
}