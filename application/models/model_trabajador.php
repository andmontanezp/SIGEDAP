<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Trabajador extends CI_Model {
	function __construct(){

	}
	public function findByCedula($cedula){
		$query = $this->db
		->select('t.*, c.car_descripcion as cargo, n.nac_descripcion as nacionalidad, s.sed_descripcion as sede, coo.coo_descripcion as coordinacion, g.ger_descripcion as gerencia')
		->from('trabajador t')
		->join('cargo c', 't.tra_cargo_id = c.car_id', 'left')
		->join('coordinacion coo', 'c.car_coordinacion_id = coo.coo_id', 'left')
		->join('gerencia g', 'coo.coo_gerencia_id = g.ger_id', 'left')
		->join('nacionalidad n', 't.tra_nacionalidad_id = n.nac_id', 'left')	
		->join('sede s', 't.tra_sede_id = s.sed_id', 'left')
		->where('tra_cedula', $cedula)
		->get();
		return $query->row();
	}

	public function likeByCedula($cedula){
		$query = $this->db
		->select('trabajador.tra_cedula')
		->from('trabajador')
		->like('trabajador.tra_cedula', $cedula)
		->get();
		if($query->num_rows > 0){
     	 	foreach ($query->result_array() as $row){
        	$row_set[] = htmlentities(stripslashes($row['tra_cedula'])); //build an array
      	}
      	echo json_encode($row_set); //format the array into json data
    	}
	}

	public function likeByNombres($nombres){
		$query = $this->db
		->select('tra_nombres, tra_apellidos, tra_cedula')
		->from('trabajador')
		->like('concat(trabajador.tra_nombres, " 	",trabajador.tra_apellidos)', $nombres)
		->get();
		if($query->num_rows > 0){
     	 	foreach ($query->result_array() as $row){
        	$row_set[] = stripslashes($row['tra_nombres']." ".$row["tra_apellidos"]); //build an array
      	}
      	echo json_encode($row_set); //format the array into json data
    	}
	}

	public function getTrabajadorPagination($pagina, $porpagina, $opcion){
		switch ($opcion) {
			case 'limit':{
				$query = $this->db
				->select('t.*, c.car_descripcion as car_descripcion')
				->from('trabajador t')
				->join('cargo c', 't.tra_cargo_id = c.car_id', 'left')
				->order_by('idtrabajador')
				->limit($porpagina, $pagina)
				->get();
				return $query->result();	
			break;
			}
			case 'cuantos':{
				$query = $this->db
				->select('t.*, c.car_descripcion as trab_cargo')
				->from('trabajador t')
				->join('cargo c', 't.tra_cargo_id = c.car_id', 'left')
				->count_all_results();
				return $query;
			break;
			}
		}
	}

	public function getFilteredPagination($pagina, $porpagina, $opcion, $field, $value, $where = false){
		switch ($opcion) {
			case 'limit':{
				$query = $this->db
				->select('t.*, c.car_descripcion as car_descripcion')
				->from('trabajador t')
				->join('cargo c', 't.tra_cargo_id = c.car_id', 'left')
				->join('coordinacion coo', 'coo.coo_id = c.car_coordinacion_id', 'left')
				->join('gerencia g', 'coo.coo_gerencia_id = g.ger_id', 'left');
					if($where){
						$query = $this->db->where($field, $value);
					} else {
						$query = $this->db->like($field, $value);
					}
				$query = $this->db->order_by('idtrabajador')
				->limit($porpagina, $pagina)
				->get();
				return $query->result();	
			break;
			}
			case 'cuantos':{
				$query = $this->db
				->select('t.*, c.car_descripcion as car_descripcion')
				->from('trabajador t')
				->join('cargo c', 't.tra_cargo_id = c.car_id', 'left')
				->join('coordinacion coo', 'coo.coo_id = c.car_coordinacion_id', 'left')
				->join('gerencia g', 'coo.coo_gerencia_id = g.ger_id', 'left');
					if($where){
						$query = $this->db->where($field, $value);
					} else {
						$query = $this->db->like($field, $value);
					}
					$query = $this->db->count_all_results();
				return $query;
			break;
			}
		}
	}

	function getGrupoSanguineo(){
		$lista = array();
		$this->load->model('Model_Grupo_Sanguineo');
		$registros = $this->Model_Grupo_Sanguineo->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->grupo] = $registro->grupo;
		}
		return $lista;
	}

	function getTallaCamisa(){
		$lista = array();
		$this->load->model('Model_Talla_Camisa');
		$registros = $this->Model_Talla_Camisa->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tallacamisa] = $registro->tallacamisa;
		}
		return $lista;
	}

	function getTallaPantalon(){
		$lista = array();
		$this->load->model('Model_Talla_Pantalon');
		$registros = $this->Model_Talla_Pantalon->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tallapantalon] = $registro->tallapantalon;
		}
		return $lista;
	}

	function getTallaZapato(){
		$lista = array();
		$this->load->model('Model_Talla_Zapato');
		$registros = $this->Model_Talla_Zapato->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tallazapato] = $registro->tallazapato;
		}
		return $lista;
	}

	function getTipoPersonal(){
		$lista = array();
		$this->load->model('Model_Tipo_Personal');
		$registros = $this->Model_Tipo_Personal->all();
		$lista["vacio"] = "Vacio...";
		foreach ($registros as $registro) {
			$lista[$registro->tipopersonal] = $registro->tipopersonal;
		}
		return $lista;
	}

	function getGenero(){
		$lista = array();
		$this->load->model('Model_Genero');
		$registros = $this->Model_Genero->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->gen_id] = $registro->gen_descripcion;
		}
		return $lista;
	}

	function getTurnos(){
		$lista = array();
		$this->load->model('Model_Turno');
		$registros = $this->Model_Turno->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tur_id] = $registro->tur_descripcion;
		}
		return $lista;
	}

	function getEstadoCivil(){
		$lista = array();
		$this->load->model('Model_Estado_Civil');
		$registros = $this->Model_Estado_Civil->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->ec_id] = $registro->ec_descripcion;
		}
		return $lista;
	}

	function getNoHijos(){
		$lista = array();
		$this->load->model('Model_No_Hijos');
		$registros = $this->Model_No_Hijos->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->nohijos] = $registro->nohijos;
		}
		return $lista;
	}

	function getConfirm(){
		$lista = array();
		$this->load->model('Model_Confirm');
		$registros = $this->Model_Confirm->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->confirm] = $registro->confirm;
		}
		return $lista;
	}

	function getSedes(){
		$lista = array();
		$this->load->model('Model_Sede');
		$registros = $this->Model_Sede->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->sed_id] = $registro->sed_descripcion;
		}
		return $lista;
	}

	function getGerencias(){
		$lista = array();
		$this->load->model('Model_Gerencia');
		$registros = $this->Model_Gerencia->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->ger_id] = $registro->ger_descripcion;
		}
		return $lista;
	}

	function getCoordinaciones(){
		$lista = array();
		$this->load->model('Model_Coordinacion');
		$registros = $this->Model_Coordinacion->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->coo_id] = $registro->coo_descripcion;
		}
		return $lista;
	}

	function getCargos(){
		$lista = array();
		$this->load->model('Model_Cargo');
		$registros = $this->Model_Cargo->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->car_id] = $registro->car_descripcion;
		}
		return $lista;
	}

	function getGrados(){
		$lista = array();
		$this->load->model('Model_Grado');
		$registros = $this->Model_Grado->all();
		$lista["vacio"] = "Vacio...";
		foreach ($registros as $registro) {
			$lista[$registro->grado] = $registro->grado;
		}
		return $lista;
	}

	function getNacionalidad(){
		$lista = array();
		$this->load->model('Model_Nacionalidad');
		$registros = $this->Model_Nacionalidad->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->nac_id] = $registro->nac_descripcion;
		}
		return $lista;
	}

	function getTipoFamiliar(){
		$lista = array();
		$this->load->model('Model_Tipo_Familiar');
		$registros = $this->Model_Tipo_Familiar->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tfa_id] = $registro->tfa_descripcion;
		}
		return $lista;
	}
	function getEstadoVivienda(){
		$lista = array();
		$this->load->model('Model_Estado_Vivienda');
		$registros = $this->Model_Estado_Vivienda->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->ev_id] = $registro->ev_descripcion;
		}
		return $lista;
	}
	function getCondicionVivienda(){
		$lista = array();
		$this->load->model('Model_Condicion_Vivienda');
		$registros = $this->Model_Condicion_Vivienda->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->cv_id] = $registro->cv_descripcion;
		}
		return $lista;
	}
	function getTipoVivienda(){
		$lista = array();
		$this->load->model('Model_Tipo_Vivienda');
		$registros = $this->Model_Tipo_Vivienda->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tv_id] = $registro->tv_descripcion;
		}
		return $lista;
	}

	function getTipoActividad(){
		$lista = array();
		$this->load->model('Model_Tipo_Actividad');
		$registros = $this->Model_Tipo_Actividad->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->ta_id] = $registro->ta_descripcion;
		}
		return $lista;
	}

	function getTipoAlergia(){
		$lista = array();
		$this->load->model('Model_Tipo_Alergia');
		$registros = $this->Model_Tipo_Alergia->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tal_id] = $registro->tal_descripcion;
		}
		return $lista;
	}

	function getTipoDiscapacidad(){
		$lista = array();
		$this->load->model('Model_Tipo_Discapacidad');
		$registros = $this->Model_Tipo_Discapacidad->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tdi_id] = $registro->tdi_descripcion;
		}
		return $lista;
	}

	function getTipoBota(){
		$lista = array();
		$this->load->model('Model_Tipo_Bota');
		$registros = $this->Model_Tipo_Bota->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tb_id] = $registro->tb_descripcion;
		}
		return $lista;
	}

	function getTipoTrabajador(){
		$lista = array();
		$this->load->model('Model_Tipo_Trabajador');
		$registros = $this->Model_Tipo_Trabajador->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->ttr_id] = $registro->ttr_descripcion;
		}
		return $lista;
	}

	function getTipoEstudios(){
		$lista = array();
		$this->load->model('Model_Tipo_Estudios');
		$registros = $this->Model_Tipo_Estudios->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->tes_id] = $registro->tes_descripcion;
		}
		return $lista;
	}

	function getAreaEstudios(){
		$lista = array();
		$this->load->model('Model_Area_Estudios');
		$registros = $this->Model_Area_Estudios->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->aes_id] = $registro->aes_descripcion;
		}
		return $lista;
	}

	function getEstados(){
		$lista = array();
		$this->load->model('Model_Estados');
		$registros = $this->Model_Estados->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->id_estado] = $registro->estado;
		}
		return $lista;
	}

	function getMunicipios(){
		$lista = array();
		$this->load->model('Model_Municipios');
		$registros = $this->Model_Municipios->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->id_municipio] = $registro->municipio;
		}
		return $lista;
	}

	function getParroquias(){
		$lista = array();
		$this->load->model('Model_Parroquias');
		$registros = $this->Model_Parroquias->all();
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->id_parroquia] = $registro->parroquia;
		}
		return $lista;
	}

	function getCiudadesByEstado($id_estado){
		$lista = array();
		$this->load->model('Model_Ciudades');
		$registros = $this->Model_Ciudades->findByEstado($id_estado);
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->id_ciudad] = $registro->ciudad;
		}
		return $lista;
	}

	function getMunicipiosByEstado($id_estado){
		$lista = array();
		$this->load->model('Model_Municipios');
		$registros = $this->Model_Municipios->findByEstado($id_estado);
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->id_municipio] = $registro->municipio;
		}
		return $lista;
	}

	function getParroquiasByMunicipio($id_municipio){
		$lista = array();
		$this->load->model('Model_Parroquias');
		$registros = $this->Model_Parroquias->findByMunicipio($id_municipio);
		$lista[0] = "Seleccione...";
		foreach ($registros as $registro) {
			$lista[$registro->id_parroquia] = $registro->parroquia;
		}
		return $lista;
	}

	function all(){
		$query = $this->db
		->get('trabajador', 10);
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('trabajador');
		return $query->result();
	}

	function find($id){
		$query = $this->db
		->select("	trabajador.*,
					par.id_parroquia,
					est.id_estado,
					mun.id_municipio,
					nac_descripcion as nacionalidad,
					ttr.ttr_descripcion as tipotrabajador,
					gen.gen_descripcion as genero,
					ec.ec_descripcion as estadocivil,
					tb.tb_descripcion as tipobota,
					coo.coo_id as tra_coordinacion_id, 
					g.ger_id as tra_gerencia_id,
					c.*, 
					coo.*, 
					g.*,
					ev.ev_descripcion,
					tv.tv_descripcion,
					cv.cv_descripcion,
					(YEAR(CURDATE())-YEAR(tra_fechanac))-(RIGHT(CURDATE(),5)<RIGHT(tra_fechanac,5)) AS edad,
					CONCAT(year(curdate()) - YEAR(tra_fechaingreso), ' año, ', month(curdate()) - month(tra_fechaingreso), ' meses, ', day(curdate()) - day(tra_fechaingreso), ' dias. ') AS tiempo_transcurrido,
					sed.sed_descripcion as sede", FALSE)
		->from('trabajador')
		->join('parroquias par', 'trabajador.tra_parroquia_id = par.id_parroquia', 'left')
		->join('municipios mun', 'par.id_municipio = mun.id_municipio', 'left')
		->join('estados est', 'mun.id_estado = est.id_estado', 'left')
		->join('sede sed', 'trabajador.tra_sede_id = sed.sed_id', 'left')
		->join('tipo_vivienda tv', 'trabajador.tra_tipovivienda_id = tv.tv_id', 'left')
		->join('condicion_vivienda cv', 'trabajador.tra_condicionvivienda_id = cv.cv_id', 'left')
		->join('estado_vivienda ev', 'trabajador.tra_estadovivienda_id = ev.ev_id', 'left')
		->join('tipo_bota tb', 'trabajador.tra_tipobota_id = tb.tb_id', 'left')
		->join('nacionalidad nac', 'trabajador.tra_nacionalidad_id = nac.nac_id', 'left')
		->join('tipo_trabajador ttr', 'trabajador.tra_tipotrabajador_id = ttr.ttr_id', 'left')
		->join('genero gen', 'trabajador.tra_genero_id = gen.gen_id', 'left')
		->join('estado_civil ec', 'trabajador.tra_estadocivil_id = ec.ec_id', 'left')
		->join('cargo c', 'trabajador.tra_cargo_id = c.car_id', 'left')
		->join('coordinacion coo', 'coo.coo_id = c.car_coordinacion_id', 'left')
		->join('gerencia g', 'coo.coo_gerencia_id = g.ger_id', 'left')
		->where('idtrabajador', $id)
		->get();
		return $query->row();
	}

	function findByAnalisisDeCargo($id){
		$query = $this->db
		->select('count(rxt_id) as analizado')
		->from('trabajador')
		->join('cargo c', 'trabajador.tra_cargo_id = c.car_id', 'left')
		->join('coordinacion coo', 'coo.coo_id = c.car_coordinacion_id', 'left')
		->join('gerencia g', 'coo.coo_gerencia_id = g.ger_id', 'left')
		->join('respuestas_x_trabajador rxt', 'rxt.rxt_trabajador_id = trabajador.idtrabajador')
		->where('rxt_trabajador_id', $id)
		->get();
		return $query->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('trabajador');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('idtrabajador', $registro['idtrabajador']);
		$this->db->update('trabajador');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('trabajador');
	}
}
	
?>
