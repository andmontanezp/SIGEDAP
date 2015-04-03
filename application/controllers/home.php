<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->library('usuarioLib');
      $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
      $this->form_validation->set_message('matches', 'Las contraseñas deben coincidir');
      $this->form_validation->set_message('login_ok', 'Usuario o clave incorrectos.');
      $this->form_validation->set_message('cambio_ok', 'No se puede realizar la operacion de cambio de clave.');
   }

   public function sendMailGmail()
    {
        //cargamos la libreria email de ci
        $this->load->library("email");
 
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'assembler07@gmail.com',
            'smtp_pass' => 'java02124165752',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );    
 
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);
 
        $this->email->from('assembler07@gmail.com');
        $this->email->to("m4rt1nkrank@gmail.com");
        $this->email->subject('Recordatorio');
        $this->email->message('<h2>Estimado Sr. Jules</h2><hr><br> <p>Estimado señor Jules, le informamos que la cita de su mascota "tintin" ha sido programada para el día 22/05/2014 (veintidós de mayo de dos mil catorce), le enviaremos una serie de alertas para evitar la pérdida de la misma</p><hr /> Consultorio veterinario chupatelhueco c.a &copy; todos los derechos reservados');
        $this->email->send();
        //con esto podemos ver el resultado
        var_dump($this->email->print_debugger());
    }


	public function index(){
      $data['titulo'] = 'Inicio';
      $data['contenido'] = 'home/index';
		$this->load->view('template', $data);
	}
	public function acerca_de(){
      $data['titulo'] = 'Acerca de ...';
      $data['contenido'] = 'home/acerca_de';
      $this->load->view('template', $data);
	}
   public function ingreso(){
      $data['titulo'] = 'Ingreso';
      $data['contenido'] = 'home/ingreso';
      $this->load->view('template', $data);
   }
   public function ingresar(){
      $this->form_validation->set_rules('login', 'Usuario', 'required|callback_login_ok');
      $this->form_validation->set_rules('password', 'Clave', 'required');
      if ($this->form_validation->run() == FALSE) {
         $this->ingreso();
      } else {
         redirect(base_url('home/index'));
      }
   }
   public function login_ok(){
      $login = $this->input->post('login');
      $pass = $this->input->post('password'); 
      
      $pass = sha1($pass);
      return $this->usuariolib->login($login, $pass);
   }
   public function salir(){
      $this->session->sess_destroy();
      redirect(base_url('home/index'));
   }
   public function acceso_denegado(){
      $data['titulo'] = 'Acceso Restringido';
      $data['contenido'] = 'home/acceso_denegado';
      $this->load->view('template', $data);
   }
   public function cambio_clave(){
      $data['titulo'] = 'Cambiar Clave';
      $data['contenido'] = 'home/cambio_clave';
      $this->load->view('template', $data);
   }
   public function cambiar_clave(){

      $this->form_validation->set_rules('clave_actual', 'Clave Actual', 'required|callback_cambio_ok');
      $this->form_validation->set_rules('clave_nueva', 'Clave Nueva', 'required|matches[re_clave_nueva]');
      $this->form_validation->set_rules('re_clave_nueva', 'Re-Clave Nueva', 'required');
      if ($this->form_validation->run() == FALSE) {
         $this->cambio_clave();
      } else {
         redirect(base_url('home/index'));
      }
      
   }

   public function cambio_ok(){
      $clave_actual    = $this->input->post('clave_actual');
      $clave_nueva     = $this->input->post('clave_nueva');      
      return $this->usuariolib->cambiarpwd($clave_actual, $clave_nueva);
   }
}