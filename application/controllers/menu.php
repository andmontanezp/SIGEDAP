<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Menu');
      $this->load->library('menuLib');
      $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
      $this->form_validation->set_message('numeric', '%s debe ser un numero');
      $this->form_validation->set_message('is_natural', '%s debe ser un numero mayor a 0');
   }
	public function index(){
      $data['titulo'] = 'Perfiles';
      $data['contenido'] = 'menu/index';
      $data['query'] = $this->Model_Menu->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Menu';
      $data['contenido'] = 'menu/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Menu->allFiltered('nombre', $buscar);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Editar';
      $data['contenido'] = 'menu/edit';
      $data['registro'] = $this->Model_Menu->find($id);
      $this->load->view('template', $data);
   }

   public function update(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_my_validation');

      if ($this->form_validation->run() == FALSE) {
         $this->edit($registro['id']);
      } else {
         $registro['fecha_actualizacion'] = date('Y/m/d H:i');
         $this->Model_Menu->update($registro);
         redirect('menu/index');
      }
   }

   public function create(){
      $data['titulo'] = 'Crear';
      $data['contenido'] = 'menu/create';
      $this->load->view('template', $data);
   }

   public function insert(){
      $registro = $this->input->post();
      $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_my_validation');
      $this->form_validation->set_rules('orden', 'Orden', 'required');
      if ($this->form_validation->run() == FALSE) {
         $this->create();
      } else {
         $registro['fecha_creacion'] = date('Y/m/d H:i');
         $registro['fecha_actualizacion'] = date('Y/m/d H:i');
         $this->Model_Menu->insert($registro);
         redirect('menu/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'menu/delete';
      $this->Model_Menu->delete($id);
      redirect('menu/index');
   }

   public function my_validation(){
      return $this->menulib->my_validation($this->input->post());
   }

   public function menu_perfiles($menu_id){
      $data['contenido'] = 'menu/menu_perfiles';
      $data['titulo'] = 'Accesos de '.$this->Model_Menu->find($menu_id)->nombre;
      
      $perfiles = $this->menulib->get_perfiles_asig_noasig($menu_id);
      $data['query_izq'] = $perfiles[0];
      $data['query_der'] = $perfiles[1];
      $this->load->view('template', $data);
   }

   public function mp_noasig(){
      $perfil_id = $this->uri->segment(3);
      $menu_id = $this->uri->segment(4);
      $this->load->library('Menu_PerfilLib');
      $this->menu_perfillib->quitar_acceso($perfil_id, $menu_id);
      redirect('menu/menu_perfiles/'.$menu_id);
   }

   public function mp_asig(){
      $perfil_id = $this->uri->segment(3);
      $menu_id = $this->uri->segment(4);
      $this->load->library('Menu_PerfilLib');
      $this->menu_perfillib->dar_acceso($perfil_id, $menu_id);
      redirect('menu/menu_perfiles/'.$menu_id);
   }
}