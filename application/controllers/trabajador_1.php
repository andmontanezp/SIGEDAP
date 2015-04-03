<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trabajador extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->model('Model_Trabajador');
      //$this->output->enable_profiler(TRUE);
      //$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
      //$this->form_validation->set_message('numeric', '%s debe ser un numero');
      //$this->form_validation->set_message('is_natural', '%s debe ser un numero mayor a 0');
   }

   public function index(){
      $data['titulo'] = 'Trabajadores';
      $data['contenido'] = 'trabajador/index';

      if ($this->uri->segment(3)) {
         $pagina = $this->uri->segment(3);
      } else {
         $pagina = 0;
      }

      $porpagina = 100;
      $data['query'] = $this->Model_Trabajador->getTrabajadorPagination($pagina, $porpagina, 'limit');
      $cuantos = $this->Model_Trabajador->getTrabajadorPagination($pagina, $porpagina, 'cuantos');
      
      $config['base_url'] = base_url().'trabajador/index/';
      $config['total_rows'] = $cuantos;
      $config['per_page'] = $porpagina;
      $config['uri_segment'] = 3;
      $config['num_links'] = 1;
      $config['full_tag_open'] = "<ul class='col-md-6 pagination'>";
      $config['full_tag_close'] ="</ul>";
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
      $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
      $config['next_tag_open'] = "<li>";
      $config['next_tagl_close'] = "</li>";
      $config['prev_tag_open'] = "<li>";
      $config['prev_tagl_close'] = "</li>";
      $config['first_tag_open'] = "<li>";
      $config['first_tagl_close'] = "</li>";
      $config['last_tag_open'] = "<li>";
      $config['last_tagl_close'] = "</li>";
      $config['first_link'] = 'Primera'; //primer link
      $config['last_link'] = 'Última'; //último link
      $config['next_link'] = 'Siguiente'; //siguiente link
      $config['prev_link'] = 'Anterior'; //anterior link
      $data["gerencias"] = $this->Model_Trabajador->getGerencias();
      $data["coordinaciones"] = $this->Model_Trabajador->getCoordinaciones();
      $data["cargos"]= $this->Model_Trabajador->getCargos();
      $this->pagination->initialize($config);
      $this->load->view('template', $data);
	}

   public function search(){
      $data['titulo'] = 'Trabajadores';
      $data['contenido'] = 'trabajador/index';

      if ($this->uri->segment(3)) {
         $pagina = $this->uri->segment(3);
      } else {
         $pagina = 0;
      }

      $porpagina = 100;

      if (isset($_POST["cedula"])) {
         $data['query'] = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'limit', 'tra_cedula', $this->input->post('cedula'));
         $cuantos = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'cuantos', 'tra_cedula', $this->input->post('cedula')); 
      } else if (isset($_POST["nombres"])) {
         $data['query'] = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'limit', 'concat(tra_nombres, " ", tra_apellidos)', $this->input->post('nombres'));
         $cuantos = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'cuantos', 'concat(tra_nombres, " ", tra_apellidos)', $this->input->post('nombres')); 
      } else if (isset($_POST["gerencia"])) {
         $data['query'] = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'limit', 'g.ger_id', $this->input->post('gerencia'));
         $cuantos = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'cuantos', 'g.ger_id', $this->input->post('gerencia')); 
      } else if (isset($_POST["coordinacion"])) {
         $data['query'] = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'limit', 'coo.coo_id', $this->input->post('coordinacion'));
         $cuantos = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'cuantos', 'coo.coo_id', $this->input->post('coordinacion')); 
      } else if (isset($_POST["cargo"])) {
         $data['query'] = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'limit', 'c.car_id', $this->input->post('cargo'));
         $cuantos = $this->Model_Trabajador->getFilteredPagination($pagina, $porpagina, 'cuantos', 'c.car_id', $this->input->post('cargo')); 
      }


      $data['gerencias'] = $this->Model_Trabajador->getGerencias();
      $data['coordinaciones'] = $this->Model_Trabajador->getCoordinaciones();
      $data['cargos'] = $this->Model_Trabajador->getCargos();
      
      $config['base_url'] = base_url().'trabajador/index/';
      $config['total_rows'] = (isset($cuantos) ? $cuantos : 0);
      $config['per_page'] = $porpagina;
      $config['uri_segment'] = 3;
      $config['num_links'] = 1;
      $config['full_tag_open'] = "<ul class='col-md-6 pagination'>";
      $config['full_tag_close'] ="</ul>";
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
      $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
      $config['next_tag_open'] = "<li>";
      $config['next_tagl_close'] = "</li>";
      $config['prev_tag_open'] = "<li>";
      $config['prev_tagl_close'] = "</li>";
      $config['first_tag_open'] = "<li>";
      $config['first_tagl_close'] = "</li>";
      $config['last_tag_open'] = "<li>";
      $config['last_tagl_close'] = "</li>";
      $config['first_link'] = 'Primera'; //primer link
      $config['last_link'] = 'Última'; //último link
      $config['next_link'] = 'Siguiente'; //siguiente link
      $config['prev_link'] = 'Anterior'; //anterior link


      $this->pagination->initialize($config);
      $this->load->view('template', $data);
   }

   public function edit($id){
      $data['titulo'] = 'Editar';
      $data['contenido'] = 'trabajador/edit';
      $data['registro'] = $this->Model_Trabajador->find($id);
      $data['analizado'] = $this->Model_Trabajador->findByAnalisisDeCargo($id);
      $data['tipotrabajador'] = $this->Model_Trabajador->getTipoTrabajador();
      $data['genero'] = $this->Model_Trabajador->getGenero();
      $data['estadocivil'] = $this->Model_Trabajador->getEstadoCivil();
      $data['sedes'] = $this->Model_Trabajador->getSedes();
      $data['gerencias'] = $this->Model_Trabajador->getGerencias();
      $data['coordinaciones'] = $this->Model_Trabajador->getCoordinaciones();
      $data['cargos'] = $this->Model_Trabajador->getCargos();
      $data['tallacamisa'] = $this->Model_Trabajador->getTallaCamisa();
      $data['tallapantalon'] = $this->Model_Trabajador->getTallaPantalon();
      $data['tallazapato'] = $this->Model_Trabajador->getTallaZapato();
      $data['tiposbota'] = $this->Model_Trabajador->getTipoBota();
      $data['gruposanguineo'] = $this->Model_Trabajador->getGrupoSanguineo();
      $data['tallacamisa'] = $this->Model_Trabajador->getTallaCamisa();
      $data['tallapantalon'] = $this->Model_Trabajador->getTallaPantalon();
      $data['tallazapato'] = $this->Model_Trabajador->getTallaZapato();
      $data['tiposfamiliar'] = $this->Model_Trabajador->getTipoFamiliar();
      $data['nacionalidades'] = $this->Model_Trabajador->getNacionalidad();
      $data['tiposvivienda'] = $this->Model_Trabajador->getTipoVivienda();
      $data['condicionvivienda'] = $this->Model_Trabajador->getCondicionVivienda();
      $data['estadosvivienda'] = $this->Model_Trabajador->getEstadoVivienda();
      $data['estudios'] = $this->Model_Trabajador->getTipoEstudios();
      $data['areaestudios'] = $this->Model_Trabajador->getAreaEstudios();
      $data['tipoactividades'] = $this->Model_Trabajador->getTipoActividad();
      $data['tipoalergia'] = $this->Model_Trabajador->getTipoAlergia();
      $data['tipodiscapacidad'] = $this->Model_Trabajador->getTipoDiscapacidad();
      $data['estados'] = $this->Model_Trabajador->getEstados();
      $data['municipios'] = $this->Model_Trabajador->getMunicipios();
      $data['parroquias'] = $this->Model_Trabajador->getParroquias();
      $data['parroquiaslibertador'] = $this->Model_Trabajador->getParroquiasByMunicipio(462);
      $data['turnos'] = $this->Model_Trabajador->getTurnos();

      //-->Movimientos

      $this->load->model('Model_Historico_Movimientos');

      $data['movimientos'] = $this->Model_Historico_Movimientos->find($id);

      //-->Experiencia Laboral

      $this->load->model('Model_Experiencia_Laboral');

      $data['experiencias'] = $this->Model_Experiencia_Laboral->find($id);

      //-->Familiares

      $this->load->model('Model_Familiar');

      $data['familiares'] = $this->Model_Familiar->find($id);

      $this->load->model('Model_Trabajador_X_Actividades');

      $data['actividades'] = $this->Model_Trabajador_X_Actividades->find($id);

      $this->load->model('Model_Secciones_Cuestionario');  

      $data['secciones'] = $this->Model_Secciones_Cuestionario->all();

      $this->load->model('Model_Preguntas_X_Encuesta');

      $data['preguntas'] = $this->Model_Preguntas_X_Encuesta->find(1);

      $this->load->model('Model_Respuestas_X_Trabajador');  

      $data['respuestas'] = $this->Model_Respuestas_X_Trabajador->find($id);

      $this->load->model('Model_Trabajador_X_Alergias');  

      $data['alergias'] = $this->Model_Trabajador_X_Alergias->find($id);

      $this->load->model('Model_Trabajador_X_Discapacidad');  

      $data['discapacidades'] = $this->Model_Trabajador_X_Discapacidad->find($id);

      $this->load->model('Model_Trabajador_X_Estudios');  

      $data['estudiosrealizados'] = $this->Model_Trabajador_X_Estudios->find($id);


      $this->load->view('template', $data);
   }

   public function registrarFamiliar(){
      $registro = $this->input->post();
      $this->load->model('Model_Familiar');
      $data['registro'] = $this->Model_Familiar->insert($registro);
      echo json_encode(array("error" => '0', 'message' => 'Se ha registrado el familiar...'));
   }

   public function registrarMovimiento(){
      $registro = $this->input->post();
      $this->load->model('Model_Historico_Movimientos');
      $data['registro'] = $this->Model_Historico_Movimientos->insert($registro);
      $upd = array(
         'tra_sede_id' => $registro["idsede"],
         'tra_cargo_id' => $registro["idcargo"],
         'tra_funciones' => $registro["funciones_nuevas"],
         'idtrabajador' => $registro["idtrabajador"],
      );
      $this->Model_Trabajador->update($upd);
      echo json_encode(array("error" => '0', 'message' => 'Se ha registrado el movimiento...'));
   }

   public function registrarExperiencia(){
      $registro = $this->input->post();
      $this->load->model('Model_Experiencia_Laboral');
      $data['registro'] = $this->Model_Experiencia_Laboral->insert($registro);
      echo json_encode(array("error" => '0', 'message' => 'Se han registrado los datos...'));
   }

   public function registrarEstudios(){
      $registro = $this->input->post();
      $this->load->model('Model_Trabajador_X_Estudios');
      $data['registro'] = $this->Model_Trabajador_X_Estudios->insert($registro);
      echo json_encode(array("error" => '0', 'message' => 'Se han registrado los datos...'));
   }

   public function registrarActividad(){
      $registro = $this->input->post();
      $this->load->model('Model_Trabajador_X_Actividades');
      $data['registro'] = $this->Model_Trabajador_X_Actividades->insert($registro);
      echo json_encode(array("error" => '0', 'message' => 'Se han registrado los datos...'));
   }

   public function registrarAlergia(){
      $registro = $this->input->post();
      $this->load->model('Model_Trabajador_X_Alergias');
      $data['registro'] = $this->Model_Trabajador_X_Alergias->insert($registro);
      echo json_encode(array("error" => '0', 'message' => 'Se han registrado los datos...'));
   }

   public function registrarDiscapacidad(){
      $registro = $this->input->post();
      $this->load->model('Model_Trabajador_X_Discapacidad');
      $data['registro'] = $this->Model_Trabajador_X_Discapacidad->insert($registro);
      echo json_encode(array("error" => '0', 'message' => 'Se han registrado los datos...'));
   }

   public function llenarCiudades(){
      if ($this->input->post('id_estado')) {
         $estado_id = $this->input->post('id_estado');
         $ciudades = $this->Model_Trabajador->getCiudadesByEstado($estado_id);
         echo form_dropdown('id_ciudad', $ciudades, 0, "class='form-control' id='id_ciudad'");
      }
   }

   public function llenarMunicipios(){
      if ($this->input->post('id_estado')) {
         $estado_id = $this->input->post('id_estado');
         $municipios = $this->Model_Trabajador->getMunicipiosByEstado($estado_id);
         echo form_dropdown('id_municipio', $municipios, 0, "class='form-control' id='id_municipio'");
      }
   }

   public function llenarParroquias(){
      if ($this->input->post('id_municipio')) {
         $municipio_id = $this->input->post('id_municipio');
         $parroquias = $this->Model_Trabajador->getParroquiasByMunicipio($municipio_id);
         echo form_dropdown('tra_parroquia_id', $parroquias, 0, "class='form-control' id='id_parroquia'");
      }
   }

   public function tomar_foto($trabajador_id){
      $data['titulo'] = 'Tomar Foto';
      $data['contenido'] = 'trabajador/tomar_foto';

      $this->load->view('template', $data);
   }

   public function subir_foto(){
      $idtrabajador = $this->input->post('idtrabajador');
      $foto = $this->input->post('foto');
      if ($_SERVER['HTTP_X_FORWARDED_FOR']){
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else{
	$ip = $_SERVER['REMOTE_ADDR'];
      }
      $registro = array(
         'idtrabajador' => $idtrabajador,
         'foto' => $foto,
         'tra_usuario_actualizacion_id' => $this->session->userdata('usuario_id'),
         'tra_usuario_direccion_ip' => $ip
      );
      $this->Model_Trabajador->update($registro);
      redirect('trabajador/edit/'.$idtrabajador);
   }

   public function insertEncuesta(){
      $registros = $this->input->post();
      $preguntas = $registros["rxt_pregunta_encuesta_id"];
      $respuestas = $registros["rxt_respuesta"];
      
      $trabajador = $registros["idtrabajador"];
      $this->load->model("Model_Respuestas_X_Trabajador");
         
      for ($i=0; $i < count($preguntas); $i++) {
         $registro = array(
            'rxt_pregunta_encuesta_id'=> $preguntas[$i], 
            'rxt_respuesta'=> $respuestas[$i],
            'rxt_trabajador_id' => $trabajador,
            'rxt_usuario_actualizacion' => $this->session->userdata("usuario_id"),
            'rxt_usuario_creacion' => $this->session->userdata("usuario_id")
            ); 
         $this->Model_Respuestas_X_Trabajador->insert($registro);
      }
      redirect("trabajador/edit/".$trabajador);
   }

   public function updateEncuesta(){
      $registros = $this->input->post();
      $preguntas = $registros["rxt_id"];
      $respuestas = $registros["rxt_respuesta"];
      
      $trabajador = $registros["idtrabajador"];
      $this->load->model("Model_Respuestas_X_Trabajador");
         
      for ($i=0; $i < count($preguntas); $i++) {
         $registro = array(
            'rxt_id'=> $preguntas[$i], 
            'rxt_respuesta'=> $respuestas[$i],
            'rxt_trabajador_id' => $trabajador,
            'rxt_usuario_actualizacion' => $this->session->userdata("usuario_id")
            ); 
         $this->Model_Respuestas_X_Trabajador->update($registro);
      }
      redirect("trabajador/edit/".$trabajador);
   }

   public function update(){
      print_r($_POST);
	if ($_SERVER['HTTP_X_FORWARDED_FOR']){
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} 
	else{ 
	    $ip = $_SERVER['REMOTE_ADDR'];
	}
      $registro = array( 
         'tra_funciones' => $this->input->post('tra_funciones'),
         'tra_habilidades' => $this->input->post('tra_habilidades'),
         'tra_nacionalidad_id' => $this->input->post('tra_nacionalidad_id'),
         'tra_tipotrabajador_id' => $this->input->post('tra_tipotrabajador_id'), 
         'codigotrabajador' => $this->input->post('codigotrabajador'), 
         'tra_genero_id' => $this->input->post('tra_genero_id'), 
         'tra_estadocivil_id' => $this->input->post('tra_estadocivil_id'), 
         'tra_nombres' => $this->input->post('tra_nombres'),
         'tra_apellidos' => $this->input->post('tra_apellidos'), 
         //'tra_cedula' => $this->input->post('tra_cedula'), 
         'tra_fechanac' => $this->input->post('tra_fechanac'), 
         'tra_telf_celular' => $this->input->post('tra_telf_celular'), 
         'tra_telf_local' => $this->input->post('tra_telf_local'), 
         'tra_direccion' => $this->input->post('tra_direccion'), 
         'tra_sede_id' => $this->input->post('tra_sede_id'), 
         'tra_cargo_id' => $this->input->post('tra_cargo_id'), 
         'tra_correo' => $this->input->post('tra_correo'), 
         'tra_talla_pantalon' => $this->input->post('tra_talla_pantalon'), 
         'tra_talla_camisa' => $this->input->post('tra_talla_camisa'), 
         'tra_talla_zapato' => $this->input->post('tra_talla_zapato'), 
         'tra_grupo_sanguineo' => $this->input->post('tra_grupo_sanguineo'), 
         'idtrabajador' => $this->input->post('idtrabajador'),
         'tra_tipobota_id' => $this->input->post('tra_tipobota_id'),
         'tra_parroquia_id' => $this->input->post('tra_parroquia_id'),
         'tra_turno_id' => $this->input->post('tra_turno_id'),
         'tra_parroquiatrabajo_id' => $this->input->post('tra_parroquiatrabajo_id'),
         'tra_usuario_actualizacion_id' => $this->session->userdata('usuario_id'),
	 'tra_usuario_direccion_ip' => $ip
         
      );

         $this->Model_Trabajador->update($registro);
         redirect('trabajador/edit/'.$registro["idtrabajador"]);
   }

   public function update2(){
      $registro = array( 
         'idtrabajador' => $this->input->post('idtrabajador'),
         'grado' => $this->input->post('grado'), 
         'area' => $this->input->post('area'), 
         'cursos' => $this->input->post('cursos'),
         'descripcioncursos' => $this->input->post('descripcioncursos'),
         'otrosestudios' => $this->input->post('otrosestudios'), 
         'estudiando' => $this->input->post('estudiando'),
         'estudios' => $this->input->post('estudios')
      );

      $this->Model_Trabajador->update($registro);
      redirect('trabajador/edit/'.$registro["idtrabajador"]);
   }

   public function update3(){
      $registro = array( 
         'idtrabajador' => $this->input->post('idtrabajador'),
         'tra_tipovivienda_id' => $this->input->post('tra_tipovivienda_id'), 
         'tra_condicionvivienda_id' => $this->input->post('tra_condicionvivienda_id'),
         'tra_estadovivienda_id' => $this->input->post('tra_estadovivienda_id')
      );

      $this->Model_Trabajador->update($registro);
      redirect('trabajador/edit/'.$registro["idtrabajador"]);
   }
   
   public function PdfDescripcionCargo($id){

         $this->load->library('Pdf');

         $pdf = new Pdf('','Letter');
         $stylesheet = file_get_contents(base_url('css/mpdf.css')); // external css
         $trabajador = $this->Model_Trabajador->find($id);
         $this->load->model('Model_Secciones_Cuestionario');
         $this->load->model('Model_Respuestas_X_Trabajador');
                  
         $pdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
         $pdf->defaultheaderfontsize = 10; /* in pts */
         $pdf->defaultheaderfontstyle = B; /* blank, B, I, or BI */
         $pdf->defaultheaderline = 1; /* 1 to include line below header/above footer */
         $pdf->defaultfooterfontsize = 12; /* in pts */
         $pdf->defaultfooterfontstyle = B; /* blank, B, I, or BI */
         $pdf->defaultfooterline = 1; /* 1 to include line below header/above footer */
         $pdf->SetHeader('Usuario : '.$this->session->userdata("usuario").' // Fecha : {DATE j-m-Y}||Trabajador: '.$trabajador->tra_nombres." ".$trabajador->tra_apellidos);
         $pdf->SetFooter('|Página {PAGENO} de {nb}|SUPRA Caracas C.A.'); /* defines footer for Odd and Even Pages - placed at Outer margin */

         $this->load->model('Model_Familiar');
         $familiares = $this->Model_Familiar->find($id);

         $secciones = $this->Model_Secciones_Cuestionario->all();

         $this->load->model('Model_Historico_Movimientos');
         $movimientos = $this->Model_Historico_Movimientos->find($id);

         $this->load->model('Model_Trabajador_X_Actividades');
         $actividades = $this->Model_Trabajador_X_Actividades->find($id);

         $this->load->model('Model_Trabajador_X_Estudios');  

         $estudiosrealizados = $this->Model_Trabajador_X_Estudios->find($id);

         $this->load->model('Model_Experiencia_Laboral');

         $experiencias = $this->Model_Experiencia_Laboral->find($id);
         
         $html.= "<table border='1'><tr class='min'><td width='150px' height='100px'><img width='150px' height='100px' src='".base_url('js/webcamjs/'.$trabajador->foto)."'></td><td><h1>DIAGNÓSTICO FUNCIONAL</h1></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><td><h3>DATOS PERSONALES</h3></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>NOMBRES Y APELLIDOS: </th><td style='width:25%;'>".$trabajador->tra_nombres." ".$trabajador->tra_apellidos."</td><th style='width:25%;text-align:left;'>CÉDULA: </th><td style='width:25%;'>".$trabajador->nacionalidad."".number_format($trabajador->tra_cedula,0,',','.')."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>FECHA DE NACIMIENTO: </th><td style='width:25%;'>".date('d-m-Y', strtotime($trabajador->tra_fechanac))."</td><th style='width:25%;text-align:left;'>EDAD: </th><td style='width:25%;'>".$trabajador->edad."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>GÉNERO: </th><td style='width:25%;'>".$trabajador->genero."</td><th style='width:25%;text-align:left;'>ESTADO CIVIL: </th><td style='width:25%;'>".$trabajador->estadocivil."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>TELÉFONO LOCAL: </th><td style='width:25%;'>".$trabajador->tra_telf_local."</td><th style='width:25%;text-align:left;'>TELÉFONO MÓVIL: </th><td style='width:25%;'>".$trabajador->tra_telf_celular."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>CORREO: </th><td style='width:25%;'>".$trabajador->tra_correo."</td><th style='width:25%;text-align:left;'>GRUPO SANGUÍNEO: </th><td style='width:25%;'>".$trabajador->tra_grupo_sanguineo."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>TALLA CAMISA: </th><td style='width:25%;'>".$trabajador->tra_talla_camisa."</td><th style='width:25%;text-align:left;'>TALLA BOTAS: </th><td style='width:25%;'>".$trabajador->tra_talla_zapato."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>TIPO DE BOTAS: </th><td style='width:25%;'>".$trabajador->tipobota."</td><th style='width:25%;text-align:left;'>TALLA PANTALON: </th><td style='width:25%;'>".$trabajador->tra_talla_pantalon."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;height:50px;text-align:left;'>DIRECCIÓN: </th><td style='width:75%;'>".$trabajador->tra_direccion."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;height:50px;text-align:left;'>HABILIDADES DE TRABAJO: </th><td style='width:75%;'>".$trabajador->habilidades."</td></tr></table>";

         $html.= "<table border='1' style='margin-top:5%'><tr class='min'><td><h3>DATOS LABORALES</h3></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>CÓDIGO DE NÓMINA: </th><td style='width:25%;'>".$trabajador->codigotrabajador."</td><th style='width:25%;text-align:left;'>GERENCIA: </th><td style='width:25%;'>".$trabajador->ger_descripcion."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>COORDINACIÓN: </th><td style='width:25%;'>".$trabajador->coo_descripcion."</td><th style='width:25%;text-align:left;'>CARGO: </th><td style='width:25%;'>".$trabajador->car_descripcion."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>TIPO DE TRABAJADOR: </th><td style='width:25%;'>".$trabajador->tipotrabajador."</td><th style='width:25%;text-align:left;'>SEDE: </th><td style='width:25%;'>".$trabajador->sede."</td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:25%;text-align:left;'>FECHA DE INGRESO: </th><td style='width:25%;'>".date('d-m-Y', strtotime($trabajador->tra_fechaingreso))."</td><th style='width:25%;text-align:left;'>TIEMPO DE SERVICIO: </th><td style='width:25%;'>".$trabajador->tiempo_transcurrido."</td></tr></table>";
         
         $html.= "<table border='1' style='margin-top:5%'><tr class='min'><td><h3>DATOS FAMILIARES</h3></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:5%;text-align:left;'>#</th><th style='width:20%;'>Nombres y Apellidos</th><th style='width:20%;'>Cédula </th><th style='width:20%;'>Parentezco</th><th style='width:20%;'>Edad</th><th style='width:20%;'>Teléfonos</th></tr>";
         $i = 1;
         if (count($familiares) > 0) {
            foreach ($familiares as $familiar) {
               $html.= "<tr class='min'><td style='width:5%;text-align:left;'>".$i."</td><td style='width:20%;'>".$familiar->fam_nombres." ".$familiar->fam_apellidos."</td><td style='width:20%;'>".$familiar->nac_descripcion."".number_format($familiar->fam_cedula, 0, ",", ".")."</td><td style='width:20%;'>".$familiar->tfa_descripcion."</td><td style='width:20%;'>".$familiar->edad."</td><td style='width:20%;'>".$familiar->fam_telefono."</td></tr>";
               $i++;
            }
         } else {
            $html.="<tr class='min'><th colspan='10' style='width:5%;text-align:left;'>Este trabajador no posee familiares registrados...</th></tr>";
         }
         $html.= "</table>";

         $html.= "<table border='1' style='margin-top:5%'><tr class='min'><td><h3>DATOS SOCIO-ECONÓMICOS</h3></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:20%;text-align:left;'>TIPO DE VIVIENDA: </th><td style='width:20%;text-align:left;'>".$trabajador->tv_descripcion."</td><th style='width:20%;'>CONDICIÓN VIVIENDA: </th><td>".$trabajador->cv_descripcion."</td><th style='width:20%;'>ESTADO VIVIENDA: </th><td style='width:20%;'>".$trabajador->ev_descripcion."</td></tr>";
         $html.= "</table>";
         
         $html.= "<pagebreak />";

         $html.= "<table border='1' style='margin-top:5%'><tr class='min'><td><h3>MOVIMIENTOS</h3></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:5%;text-align:left;'>#</th><th style='width:20%;'>Fecha</th><th style='width:20%;'>Ubicación-Cargo anterior </th><th style='width:20%;'>Funciones</th><th style='width:20%;'>Ubicación-Cargo Nuevo</th><th style='width:20%;'>Funciones</th></tr>";
         $i = 1;
         if (count($movimientos) > 0) {
            foreach ($movimientos as $movimiento) {
               $html.= "<tr class='min'><td style='width:5%;text-align:center;'>".$i."</td><td style='width:5%;'>".date('d-m-Y', strtotime($movimiento->fechadesde))."</td><td style='width:20%;'>".$movimiento->sede_anterior." - ".$movimiento->cargo_anterior."</td><td style='width:20%;'>".$movimiento->funciones_anteriores."</td><td style='width:20%;'>".$movimiento->sede_nueva."-".$movimiento->cargo_nuevo."</td><td style='width:20%;'>".$movimiento->funciones_nuevas."</td></tr>";
               $i++;
            }
         } else {
            $html.="<tr class='min'><th colspan='10' style='width:5%;text-align:left;'>Este trabajador no posee movimientos registrados...</th></tr>";
         }
         $html.= "</table>";

         $html.= "<table border='1' style='margin-top:5%'><tr class='min'><td><h3>ACTIVIDADES</h3></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:5%;text-align:left;'>#</th><th style='width:20%;'>Tipo de Actividad</th><th style='width:20%;'>Descripcion</th><th style='width:20%;'>Fecha Inicio</th><th style='width:20%;'>Fecha Fin</th><th style='width:20%;'>Ubicación</th></tr>";
         $i = 1;
         if (count($actividades) > 0) {
            foreach ($actividades as $actividad) {
               $html.= "<tr class='min'><td style='width:5%;text-align:center;'>".$i."</td><td style='width:5%;'>".$actividad->ta_descripcion."</td><td style='width:20%;'>".$actividad->txa_descripcion."</td><td style='width:20%;'>".date('d-m-Y', strtotime($actividad->txa_fecha_inicio))."</td><td style='width:20%;'>".$actividad->txa_fecha_fin."</td><td style='width:20%;'>".$actividad->txa_ubicacion."</td></tr>";
               $i++;
            }
         } else {
            $html.="<tr class='min'><th colspan='10' style='width:5%;text-align:left;'>Este trabajador no posee actividades registradas...</th></tr>";
         }
         $html.= "</table>";

         $html.= "<table border='1' style='margin-top:5%'><tr class='min'><td><h3>ESTUDIOS REALIZADOS</h3></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th>#</th><th>Tipo de Estudios</th><th>Institución</th><th>Área de estudios</th></tr>";
         $i = 1;
         if (count($estudiosrealizados) > 0) {
            foreach ($estudiosrealizados as $estudio) {
               $html.= "<tr class='min'><td style='width:5%;text-align:center;'>".$i."</td><td>".$estudio->tes_descripcion."</td><td>".$estudio->txe_institucion."</td><td>".$estudio->aes_descripcion."</td></tr>";
               $i++;
            }
         } else {
            $html.="<tr class='min'><th colspan='10' style='width:5%;text-align:left;'>Este trabajador no posee actividades registradas...</th></tr>";
         }
         $html.= "</table>";

         $html.= "<table border='1' style='margin-top:5%'><tr class='min'><td><h3>EXPERIENCIA LABORAL</h3></td></tr></table>";
         $html.= "<table border='1'><tr class='min'><th style='width:5%;text-align:left;'>#</th><th style='width:30%;'>Empresa</th><th style='width:30%;'>Cargo</th><th style='width:20%;'>Jefe Inmediato</th><th style='width:20%;'>Teléfonos</th></tr>";
         $i = 1;
         if (count($experiencias) > 0) {
            foreach ($experiencias as $experiencia) {
               $html.= "<tr class='min'><td style='width:5%;text-align:center;'>".$i."</td><td style='width:20%;'>".$experiencia->empresa."</td><td style='width:20%;'>".$experiencia->cargoexp."</td><td style='width:20%;'>".$experiencia->jefeinmediato."</td><td style='width:20%;'>".$experiencia->telefonosexp."</td></tr>";
               $i++;
            }
         } else {
            $html.="<tr class='min'><th colspan='10' style='width:5%;text-align:left;'>Este trabajador no posee experiencia laboral registrada...</th></tr>";
         }
         $html.= "</table>";

         /*if (count($secciones)>0) {
            $laps = 0;
            foreach ($secciones as $seccion) {
               $html .= "<table border='1' style='margin-top:10%;'>";
               $html.="<tr class='min'><th height='40'>".$seccion->sec_encabezado."</th></tr>";
               $preguntas = $this->Model_Respuestas_X_Trabajador->findBySectionAndId($seccion->sec_id, $trabajador->idtrabajador);
               $i = 1;
               foreach ($preguntas as $pregunta) {
                  $html.="<tr class='min'><td style='text-align:left'>".$i.") ".$pregunta->pre_descripcion."</td></tr>";
                  $html.="<tr class='min'><td style='text-align:left' height='60'>R: ".$pregunta->rxt_respuesta."</td></tr>";
               $i++;
               }
               if ($laps == 0 || $laps == 2) {
                  $html .= "<pagebreak />";
               }
               $html .= "</table>";
               $laps++;
            }
               //$html.="<tr class='min'><th colspan='4'></th><th>TOTAL TIEMPO DE SERVICIO: </th><td></td></tr>";
         }*/
         
         $pdf->WriteHTML($stylesheet, 1);
         $pdf->WriteHTML($html, 2);
         $pdf->Output();
         exit;
   }
   public function Pdf($id){

      $this->load->library('Pdf');

      $pdf = new Pdf('','Letter');
      $stylesheet = file_get_contents(base_url('css/mpdf.css')); // external css
      $trabajador = $this->Model_Trabajador->find($id);
      $this->load->model('Model_Historico_Movimientos');
      $movimientos = $this->Model_Historico_Movimientos->find($id);

      $this->load->model('Model_Experiencia_Laboral');
      $experiencias = $this->Model_Experiencia_Laboral->find($id);
      $pdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
      $pdf->defaultheaderfontsize = 10; /* in pts */
      $pdf->defaultheaderfontstyle = B; /* blank, B, I, or BI */
      $pdf->defaultheaderline = 1; /* 1 to include line below header/above footer */
      $pdf->defaultfooterfontsize = 12; /* in pts */
      $pdf->defaultfooterfontstyle = B; /* blank, B, I, or BI */
      $pdf->defaultfooterline = 1; /* 1 to include line below header/above footer */
      $pdf->SetHeader('{DATE j-m-Y}||Empleado: '.$trabajador->nombres." ".$trabajador->apellidos);
      $pdf->SetFooter('|Página {PAGENO} de {nb}|SUPRA Caracas C.A.'); /* defines footer for Odd and Even Pages - placed at Outer margin */
      $html = "<div class='container'>";
      $html.="<table border='1'>";
      $html.= "<tr class='min'><td rowspan='3'><img src='".base_url('img/suprita.png')."'></td><td rowspan='4'><h1>DIAGNÓSTICO FUNCIONAL</h1></td><th colspan='3' rowspan='1'>FECHA DE INGRESO</th></tr>";
      $html.= "<tr class='min'><th>DÍA</th><th>MES</th><th>AÑO</th></tr>";
      $html.= "<tr class='min'><td>".$trabajador->dia."</td><td>".$trabajador->mes."</td><td>".$trabajador->anio."</td></tr>";
      $html.="</table>";
      $html.="<table border='1' class='table'>";
      $html.="<thead>";
      $html.="<tr><th colspan='6' style='font-size:14px; padding:5px;'>DATOS PERSONALES</th></tr>";
      $html.="<tr class='min'><th>PERSONAL: </th><td>".$trabajador->clasificacion."</td><th>DIRECCIÓN: </th><td>".$trabajador->contactoopcional."</td><th>CARGO: </th><td>".$trabajador->cargo."</td></tr>";
      $html.="<tr class='min'><th>CÓDIGO: </th><td>".$trabajador->codigotrabajador."</td><th>NOMBRES: </th><td>".$trabajador->nombres."</td><th>APELLIDOS: </th><td>".$trabajador->apellidos."</td></tr>";
      $html.="<tr class='min'><th>NACIONALIDAD: </th><td>".$trabajador->nacionalidad."</td><th>CÉDULA: </th><td>".number_format($trabajador->cedula, 0,",", ".")."</td><th>SEXO: </th><td>".$trabajador->sexo."</td></tr>";
      $html.="<tr class='min'><th>EDAD: </th><td>En proceso...</td><th>ESTADO CIVIL: </th><td>".$trabajador->estadocivil."</td><th>HIJOS MENORES A 13 AÑOS: </th><td>".$trabajador->nohijos."</td></tr>";
      $html.="<tr class='min'><th>DIRECCION: </th><td colspan='5'>".$trabajador->direccion."</td></tr>";
      $html.="<tr class='min'><th>CORREO: </th><td>".$trabajador->correo."</td><th>TELÉFONO LOCAL: </th><td>".$trabajador->telfhabitacion."</td><th>TELEFONO MÓVIL: </th><td>".$trabajador->telfcelular."</td></tr>";
      $html.="<tr class='min'><th colspan='3'>TALLAS</th><th colspan='2'>INDIQUE SI ES ALÉRGICO: ".$trabajador->alergico."</th><th colspan='2'>GRUPO SANGUINEO: ".$trabajador->gruposanguineo."</th></tr>";
      $html.="<tr class='min'><td>PANTALÓN: ".$trabajador->tallapantalon."</td><td>CAMISA: ".$trabajador->tallacamisa."</td><td>ZAPATOS: ".$trabajador->tallazapato."</td><td colspan='3' style='text-align:left'>TIPO DE ALERGIA: ".$trabajador->tipoalergia."</td></tr>";
      $html.="<tr><th colspan='6' style='font-size:14px; padding:5px;'>ANTECEDENTES LABORALES EN SUPRA Caracas C.A.</th></tr>";
      
      if (count($movimientos)>0) {
         $i = 1;
	 $html.="<tr class='min'><th>#</th><th colspan='2'>UBICACIÓN ADMINISTRATIVA</th><th colspan='2'>CARGO - FUNCIONES</th><th>TIEMPO DE SERVICIO</th></tr>";
         foreach ($movimientos as $movimiento) {
            $html.="<tr class='min'><td>".$i."</td><td colspan='2'>".$movimiento->idsedeactual."</td><td colspan='2'>".$movimiento->idcargoactual."-".$movimiento->funciones."</td><td>en proceso...</td></tr>";
            $i++;
         }
	 $html.="<tr class='min'><th colspan='4'></th><th>TOTAL TIEMPO DE SERVICIO: </th><td></td></tr>";
      }else {
            $html.="<tr class='min'><td colspan='6'>Este trabajador no posee antecedentes registrados...</td></tr>";        
      }

      $html.="<tr><th colspan='6' style='font-size:14px; padding:5px;'>GRADO DE INSTRUCCIÓN - NIVEL EDUCATIVO</th></tr>";
      $html.="<tr class='min'><th>ESTUDIOS REALIZADOS: </th><td>".$trabajador->grado."</td><th>ÁREA: </th><td>".$trabajador->area."</td><th>OTROS ESTUDIOS: </th><td>".$trabajador->otrosestudios."</td></tr>";
      $html.="<tr class='min'><th>ESTÁ ESTUDIANDO ? : </th><td>".$trabajador->estudiando."</td><th>TIPO DE ESTUDIOS: </th><td colspan='3'>".$trabajador->estudios."</td></tr>";
      $html.="<tr class='min'><th>REALIZÓ CURSOS ? : </th><td>".$trabajador->cursos."</td><th>DESCRÍBALOS: </th><td colspan='3'>".$trabajador->descripcioncursos."</td></tr>";
      $html.="<tr><th colspan='6' style='font-size:14px; padding:5px;'>FUNCIONES Y ACTIVIDADES QUE REALIZA ACTUALMENTE</th></tr>";
      $html.="<tr><th colspan='6' style='font-size:14px; padding:5px;'>&nbsp;</th></tr>";
      $html.="<tr><th colspan='6' style='font-size:14px; padding:5px;'>EXPERIENCIA LABORAL</th></tr>";
      if (count($experiencias)>0) {
         $html.="<tr><th colspan='6' style='font-size:14px; padding:5px;'>EXPERIENCIA LABORAL</th></tr>";
         $html.="<tr class='min'><th>#</th><th>NOMBRE DE LA EMPRESA</th><th colspan='2'>CARGO - FUNCIONES</th><th>JEFE INMEDIATO</th><th>TELEFONOS</th></tr>";
         $i = 1;
         foreach ($experiencias as $experiencia) {
            $html.="<tr class='min'><td>".$i."</td><td>".$experiencia->empresa."</td><td colspan='2'>".$experiencia->cargoexp."</td><td>".$experiencia->jefeinmediato."</td><td>".$experiencia->telefonosexp."</td></tr>";
            $i++;
         }
      }else {
            $html.="<tr class='min'><td colspan='6'>Este trabajador no posee experiencia laboral registrada...</td></tr>";        
      }
      $html.="<tr><th colspan='6' style='font-size:14px; padding:5px;'>HABILIDADES Y DESTREZAS DE TRABAJO</th></tr>";
      $html.="<tr><td colspan='6' style='font-size:14px; padding:5px;'>&nbsp;".$trabajador->habilidades."</td></tr>";
      $html.="</thead>";
      $html.="<tbody>";
      $html.="<tbody>";
      $html.="</table>";
      $html.="</div>";
      $html.="<div style='border: 1px solid #000;width:100%;height:30px;'>";
      setlocale(LC_TIME, 'es_VE', 'es_VE.utf-8', 'es_VE.utf8'); # Asi es mucho mas seguro que funciones, ya que no todos los sistemas llaman igual al locale ;)
      date_default_timezone_set('America/Caracas');
      $mes=strtoupper(strftime("%B",mktime(0, 0, 0, date('m'), 1, 2000)));
      $html.="<table border='none'>";
      $html.="<tr><td style='text-align:left'>CARACAS, ".date('d')." DE ".$mes." DE ".date('Y')."</td></tr>";
      $html.="<tr><td style='text-align:center'>&nbsp;</td></tr>";
      $html.="<tr><td style='text-align:center'>&nbsp;</td></tr>";
      $html.="<tr><td style='text-align:center'>________________________________</td></tr>";
      $html.="<tr><td style='text-align:center'>LIC. NINO GONZALEZ</td></tr>";
      $html.="<tr><td style='text-align:center'>GERENTE DEL TALENTO HUMANO</td></tr>";
      $html.="<tr><td style='text-align:center'>&nbsp;</td></tr>";
      $html.="</table>";
      $html.="</div>";
      $html.="<div style='border: 1px solid #000;width:100%; clear:both;font-size:9px;text-align:center'>";
      $html.="NOTA: Es obligación comunicar a la dirección de Recursos Humanos cualquier modificación quese produzca en los datos consignados. La falsedad de los datos suministrados en la presente ficha, facultará a SUPRA Caracas a no realizar la incorporación laboral y prescindir de sus servicios.";
      $html.="</div>";

      $pdf->WriteHTML($stylesheet, 1);
      $pdf->WriteHTML($html);

      $pdf->OutPut();
      exit;
   }

   public function create(){
      $data['titulo'] = 'Crear';
      $data['contenido'] = 'trabajador/create';
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
         $this->Model_Trabajador->insert($registro);
         redirect('trabajador/index');
      }
   }

   public function delete($id){
      $data['titulo'] = 'Eliminar';
      $data['contenido'] = 'trabajador/delete';
      $this->Model_Trabajador->delete($id);
      redirect('trabajador/index');
   }

   public function autocompleteCedula(){
      
      if (isset($_GET["term"])) {
         $cedula = htmlspecialchars($_GET["term"]);
         $this->Model_Trabajador->likeByCedula($cedula);
      }
   }

   public function autocompleteNombres(){
      
      if (isset($_GET["term"])) {
         $nombres = htmlspecialchars($_GET["term"]);
         $this->Model_Trabajador->likeByNombres($nombres);
      }
   }
}
