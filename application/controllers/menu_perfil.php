<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_Perfil extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Menu_Perfil');
      $this->load->library('menuLib');
   }
	public function index(){
      $data['titulo'] = 'Menu Perfil';
      $data['contenido'] = 'menu_perfil/index';
      $data['query'] = $this->Model_Menu_Perfil->all();
		$this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Menu';
      $data['contenido'] = 'menu_perfil/index';
      $buscar = $this->input->post('buscar');
      $data['query'] = $this->Model_Menu_Perfil->allFiltered('menu.nombre', $buscar);
      $this->load->view('template', $data);
   }
}