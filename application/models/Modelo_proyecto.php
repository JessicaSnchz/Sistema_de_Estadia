<?php
class Modelo_proyecto extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->library('upload');
		$this->load->helper('file');
		$this->load->library('email');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('text');
	}

	function insertar_persona($data){
		$this->db->insert('persona',$data);
		return $this->db->insert_id();
	}

	function insertar_usuario($data){
		$this->db->insert('usuario',$data);
		return $this->db->insert_id();
	}

	function valida_usuario($data){
		$this->db->select('u.*, count(*) AS total, p.*, pe.*');
		$this->db->from('usuario u');
		$this->db->join('privilegio as p','p.id_privilegio = u.id_privilegio','left');
		$this->db->join('persona as pe','pe.id_persona = u.id_persona');
		$this->db->where('u.usuario',$data['usuario']);
		$this->db->where('u.contrasena',$data['contrasena']);
		$this->db->where('u.activo','1');
		$this->db->group_by('u.id_usuario');

		$query = $this->db->get();
		return $query->row_array();
	}


	//---- Privilegios
	function devuelve_privilegios(){
		$query = $this->db->get('privilegio');
		return $query->result();
	}

	function devuelve_priv(){
		$this->db->select('*');
		$this->db->from('privilegio');  

		$query = $this->db->get();
		return $query->result();
	}

	function inserta_privilegio($data){
		$this->db->insert('privilegio',$data);
	}

	function datos_privilegio($data){
		$this->db->select('*');
		$this->db->from('privilegio');
		$this->db->where('id_privilegio',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_privilegio($id_privilegio,$data){
		$this->db->where('id_privilegio', $id_privilegio);
		$this->db->update('privilegio', $data);
	}

	//---- Manejo de sesiones
		function crear_sesion($data){
		if(!empty($data)){
			$sesion = array(
				   'nombre'  => $data['nombre'],
                   'privilegio'  => $data['privilegio'],
                   'id_privilegio'  => $data['id_privilegio'],
                   'id_usuario'  => $data['id_usuario'],
                   'id_persona'  => $data['id_persona'],
                   'logged_in' => TRUE
				);
			$this->session->set_userdata($sesion);
			return true;
		}else{
			return false;
		}

	}

	function valida_sesion(){
		//die(var_dump($this->session->userdata('logged_in')));
		if(!$this->session->userdata('logged_in'))
			header('Location: index');
	}

	function destruye_sesion(){
		$this->session->sess_destroy();
		header('Location: index');
	}

	function datos_sesion(){
		$data = array(
			'nombre' => $this->session->userdata('nombre'),
			'id_usuario' => $this->session->userdata('id_usuario'),
			'nombre_privilegio' => $this->session->userdata('privilegio'),
			'id_privilegio' => $this->session->userdata('id_privilegio'),
			'id_persona' => $this->session->userdata('id_persona'),
			'logged_in' => $this->session->userdata('logged_in')
		);
		return $data;
	}

	function Estar_aqui(){
		$data = $this->datos_sesion();
		$actual = $this->uri->segment(2);
		$resultado = $this->cumpara_url($data,$actual);
		//die(var_dump($actual));
		if($resultado->total==1){
			return true;
		}else{
			if($this->datos_session->logged_in==true)
				header('Location:'.base_url('index.php/proyecto/error').'');
			else
			header('Location:'.base_url('index.php').'');
		}

	}

	function cumpara_url($data,$actual){
		$this->db->select('s.*, count(*) AS total, p.*');
		$this->db->from('seccion s');
		$this->db->join('privilegio_seccion as p','p.id_seccion = s.id_seccion','left');
		$this->db->where('p.id_privilegio',$data['id_privilegio']);
		$this->db->where('p.menu','1');
		$this->db->where('s.url',$actual);
		$this->db->group_by('s.id_seccion');

		$query = $this->db->get();
		return $query->row();

	}

	//-- menu ----
	function datos_menu(){
		$data = $this->datos_sesion();

		$this->db->select('s.*, p.*');
		$this->db->from('seccion s');
		$this->db->join('privilegio_seccion as p','p.id_seccion = s.id_seccion','left');
		$this->db->where('p.id_privilegio',$data['id_privilegio']);
		$this->db->where('s.activo','1');
		$query = $this->db->get();
		return $query->result();
	}
	//---------Horarios-------------
	function devuelve_horarios(){
		$query = $this->db->get('horario');
		return $query->result();
	}

	function inserta_horarios($data){
		$this->db->insert('horario',$data);
	}

	function elimina_horario($data){
		$this->db->delete('horario', $data);
	}
	//-------Medios y Tipo_medios-------------
	function devuelve_medios(){
		$query= $this->db->get('medios');
		return $query->result();
	}

	function inserta_medio($data){
		$this->db->insert('medios',$data);
	}

	function elimina_medio($data){
		$this->db->delete('medios', $data);
	}

	function consulta_medio(){
			$this->db->select('m.id_medio');
		$this->db->from('medios as m');
		$this->db->where('m.nombre = "CORREO ELECTÓNICO"');

		$query = $this->db->get();
		return $query->result();
	}

	//------Dependencias------

	function devuelve_dependencias(){
		$this->db->select('dom.*,depe.*');
		$this->db->from('domicilio AS dom');
		$this->db->join('dependencia as depe','dom.id_dom = depe.id_dom');
		//$this->db->join('extensiones as e','depe.id_extension = e.id_extension');
		$this->db->group_by('depe.id_depe');

		$query = $this->db->get();
		return $query->result();		
	}

	function inserta_dependencia($data){
		$this->db->insert('dependencia',$data);
	}

	function datos_dependencia($data){
		$this->db->select('*');
		$this->db->from('dependencia');
		$this->db->where('id_depe',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_dependencia($id_depe,$data){
		$this->db->where('id_depe', $id_depe);
		$this->db->update('dependencia', $data);
	}

	function elimina_dep($data){
		$this->db->delete('dependencia', $data);
	}

	//---------Domicilios----------------
	function inserta_domicilio($data){
		$this->db->insert('domicilio',$data);
		return $this->db->insert_id();
	}

	function datos_domicilio($data){
		$this->db->select('*');
		$this->db->from('domicilio');
		$this->db->where('id_dom',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_domicilio($id_dom,$data ){

		$this->db->where('id_dom', $id_dom);
		$this->db->update('domicilio', $data);

	}

	function elimina_dom($data){
		$this->db->delete('domicilio', $data);
	}

	//-------------Leyes y fundamentos -------------

	function devuelve_leyes(){
		$query = $this->db->get('leyes');
		return $query->result();
	}

	function inserta_ley($data){
	$this->db->insert('leyes',$data);
		//return $this->db->insert_id();
	}

	function elimina_ley($data){
	$this->db->delete('leyes', $data);

	}

	function datos_ley($data){
		$this->db->select('*');
		$this->db->from('leyes');
		$this->db->where('id_ley',$data);

		$query = $this->db->get();
		return $query->row_array();
	}


	function actualiza_ley($id_ley, $data){
		$this->db->where('id_ley', $id_ley);
		$this->db->update('leyes', $data);
	}

	function inserta_fundamento($data){
		$this->db->insert('fundamento_ts',$data);
	}

	function devuelve_fundamentos($id_ts){
		$this->db->select('le.*,f.*');
		$this->db->from('leyes as le');
		$this->db->join('fundamento_ts as f','le.id_ley = f.fk_ley');
		$this->db->where('f.fk_ts',$id_ts);

		$query = $this->db->get();
		return $query->result();
	}

	//----------Extensiones------------
	function devuelve_extension(){
		$query = $this->db->get('extensiones');
		return $query->result();
	}


	function inserta_extension($data){
	$this->db->insert('extensiones',$data);
	}
	

	function datos_extension($data){
		$this->db->select('*');
		$this->db->from('extensiones');
		$this->db->where('id_extension',$data);

		$query = $this->db->get();
		return $query->row_array();
	}


     function elimina_extension($data){
		$this->db->delete('extensiones', $data);
	}

	//-------Areas---------------------
	
	function inserta_areas($data){
		$this->db->insert('areas',$data);
	}


	function devuelve_areas(){
	$query = $this->db->get('areas');
		return $query->result();
	}


	function devuelve_areas_dependencia_horario(){

		$this->db->select('h.*,a.*, d.*');
		$this->db->from('horario as h');
		$this->db->join('areas as a ','h.id_horario = a.id_horario');
		$this->db->join('dependencia as d ','a.id_depe = d.id_depe');
		$this->db->group_by('a.id_area');

		$query = $this->db->get();
		return $query->result();
	}


	function datos_area($data){
		$this->db->select('*');
		$this->db->from('areas');
		$this->db->where('id_area',$data);

		$query = $this->db->get();
		return $query->row_array();
	}


	function actualiza_area($id_area,$data){
		$this->db->where('id_area', $id_area);
		$this->db->update('areas', $data);
	}

	function elimina_area($data){
		$this->db->delete('areas', $data);
	}

	function horario_area($data){
		$this->db->select('h.*');
		$this->db->from('horario AS h');
		$this->db->join('areas AS a','h.id_horario = a.id_horario');
		$this->db->where('a.id_area',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

     //---------------- Cargos--------

	function devuelve_cargos(){
		$query = $this->db->get('cargos');
		return $query->result();
	}

	function devuelve_cargo_area(){
		$this->db->select('c.*,a.*,ca.*');
		$this->db->from('cargos as c');
		$this->db->join('cargo_area as ca ','c.id_cargo= ca.id_cargo');
		$this->db->join('areas as a ','ca.id_area = a.id_area');
		$this->db->group_by('ca.id_cargo_area');

		$query = $this->db->get();
		return $query->result();
	}
	function inserta_cargo($data){
		$this->db->insert('cargos',$data);
		return $this->db->insert_id();
	}

	function inserta_cargo_area($data){
		$this->db->insert('cargo_area',$data);
	}

	function datos_cargos($data){
		$this->db->select('*');
		$this->db->from('cargos');
		$this->db->where('id_cargo',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_cargo($id_cargo,$data){
		$this->db->where('id_cargo', $id_cargo);
		$this->db->update('cargos', $data);
	}

	function elimina_cargo($data){
		$this->db->delete('cargos', $data);
	}

		//-- Secciones ----

	function devuelve_secciones(){
		$query = $this->db->get('seccion');
		return $query->result();
	}

	function inserta_seccion($data){
		$this->db->insert('seccion',$data);
	}

	function datos_seccion($data){
		$this->db->select('*');
		$this->db->from('seccion');
		$this->db->where('id_seccion',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_seccion($id_seccion,$data){
		$this->db->where('id_seccion', $id_seccion);
		$this->db->update('seccion', $data);
	}
	function delete_seccion($data){
		$this->db->delete('seccion', $data);
	}

	//--Sección Privilegio---

	function devuelve_privilegios_seccion(){
		/*
		$this->db->select('ps.*,p.*,count(*) AS total');
		$this->db->from('privilegio AS p');
		$this->db->join('privilegio_seccion AS ps','p.id_privilegio = ps.id_privilegio');
		$this->db->join('seccion AS s','s.id_seccion = ps.id_seccion');
		*/

		$this->db->select('COUNT(*)')->from('privilegio_seccion AS ps')->WHERE('ps.id_privilegio = p.id_privilegio');
		$total = $this->db->get_compiled_select();

		$this->db->select('p.*, ('.$total.') AS total');
		$this->db->from('privilegio AS p');
		//$this->db->from('privilegio_seccion AS ps');
		//$this->db->join('seccion AS s','p.id_seccion = s.id_seccion');
		$this->db->group_by('p.id_privilegio');
		$query = $this->db->get();
		return $query->result();
	}

	function secciones_privilegio($id_privilegio){
		$this->db->select('ps.*,s.*');
		$this->db->from('privilegio_seccion AS ps');
		$this->db->join('seccion as s','ps.id_seccion = s.id_seccion');
		$this->db->where('ps.id_privilegio',$id_privilegio);
		$this->db->group_by('s.id_seccion');

		$query = $this->db->get();
		return $query->result();
	}

	function secciones_en_privilegio($id_privilegio){
		$this->db->select('*');
		$this->db->from('privilegio_seccion');
		$this->db->where('id_privilegio',$id_privilegio);

		$query = $this->db->get();
		return $query->result_array();
	}

	function drop_secciones_faltantes($id_privilegio){

		$arreglo = $this->secciones_en_privilegio($id_privilegio);
		if(!empty($arreglo)){
			foreach ($arreglo as $a) {
				$ignore[] = (int)$a['id_seccion'];
			}
		}else{
			$ignore = 0;
		}

		$this->db->select('s.*');
		$this->db->from('seccion AS s');
		$this->db->where_not_in('s.id_seccion', $ignore);

		//SELECT `ps`.* FROM `privilegio_seccion` AS `ps` WHERE `ps`.`id_privilegio` = '1' AND `ps`.`id_seccion` NOT IN(1,2)
		$query = $this->db->get();
		return $query->result();
	}

	function inserta_privilegio_seccion($data){
		$this->db->insert('privilegio_seccion',$data);
	}

	function elimina_privilegio_seccion($data){
		$this->db->delete('privilegio_seccion', $data);
	}

	function devuelve_datos_privilegio($data){
		$this->db->select('*');
		$this->db->from('privilegio');
		$this->db->where('id_privilegio',$data);
		$this->db->order_by('id_privilegio');

		$query = $this->db->get();
		return $query->row_array();
	}
//----------------usuarios y personas---------------------------
	function devuelve_usuarios(){
		$this->db->select('u.*,p.*,pr.*');
		$this->db->from('persona AS p');
		$this->db->join('usuario as u','p.id_persona = u.id_persona');
		$this->db->join('privilegio as pr','u.id_privilegio = pr.id_privilegio');
		$this->db->order_by('u.id_usuario');

		$query = $this->db->get();
		return $query->result();
	}

	function datos_usuarios($data){

		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('id_usuario',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_usuario_privilegio($id_usuario,$data){
		$this->db->where('id_usuario', $id_usuario);
		$this->db->update('usuario', $data);
	}

	function datos_persona($data){
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->where('id_persona',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_persona($id_persona,$data){
		$this->db->where('id_persona', $id_persona);
		$this->db->update('persona', $data);
	}
//--------------modalidades---------------------------------------------
	function devuelve_modalidades(){
		$query = $this->db->get('modalidades');
		return $query->result();
	}

	function inserta_modalidad($data){
		$this->db->insert('modalidades',$data);
		//return $this->db->insert_id();
	}

	function datos_modalidad($data){
		$this->db->select('*');
		$this->db->from('modalidades');
		$this->db->where('id_modalidad',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_modalidad($id_modalidad,$data){
		$this->db->where('id_modalidad', $id_modalidad);
		$this->db->update('modalidades', $data);
	}

	function elimina_modalidad($data){
		$this->db->delete('modalidades', $data);
	}

	function ts_modalidad($data){
		$this->db->select('m.*');
		$this->db->from('modalidades as m');
		$this->db->join('tramites_servicios as ts','m.id_modalidad = ts.fk_modalidad');
		$this->db->where('ts.id_ts',$data);

		$query = $this->db->get();
		return $query->row_array();
	}
//----------------------clasificaciones---------------------------------
	function devuelve_clasificaciones(){
		$query = $this->db->get('clasificacion');
		return $query->result();
	}

	function inserta_clasificacion($data){
		$this->db->insert('clasificacion',$data);
		//return $this->db->insert_id();
	}

	function datos_clasificacion($data){
		$this->db->select('*');
		$this->db->from('clasificacion');
		$this->db->where('id_clasificacion',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function actualiza_clasificacion($id_clasificacion,$data){
		$this->db->where('id_clasificacion', $id_clasificacion);
		$this->db->update('clasificacion', $data);
	}

	function elimina_clasificacion($data){
			$this->db->delete('clasificacion', $data);
	}

	function fts_clasificacion($data){
		$this->db->select('c.*');
		$this->db->from('clasificacion as c');
		$this->db->join('tramites_servicios as ts','c.id_clasificacion = ts.fk_rpm');
		$this->db->where('ts.id_ts',$data);


		$query = $this->db->get();
		return $query->row_array();
	}
//--------------------------ámbitos de aplicación-----------------------
	function devuelve_ambitos_aplicacion(){
		$query = $this->db->get('ambito_de_aplicacion');
		return $query->result();
	}

	function devuelve_quien_puede(){
		$query = $this->db->get('quien_puede');
		return $query->result();
	}

	function ts_ambito($data){
		$this->db->select('a.*');
		$this->db->from('ambito_de_aplicacion as a');
		$this->db->join('tramites_servicios as ts','a.id_ambito_de_a = ts.fk_ambito_de_a');
		$this->db->where('ts.id_ts',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function ts_quien($data){
		$this->db->select('q.*,qa.*');
		$this->db->from('quien_puede as q');
		$this->db->join('quien_ambito_aplicacion as qa','q.id_quien_p = qa.fk_quien_p');
		$this->db->join('tramites_servicios as ts','qa.fk_ts = ts.id_ts');
		$this->db->where('ts.id_ts',$data);
		$this->db->group_by('qa.id_quien_ts');

		$query = $this->db->get();
		return $query->result();
	}
//---------------------------orden--------------------------
	
//----------------------------pasos------------------------------
	function devuelve_pasos(){
		$query = $this->db->get('pasos');
		return $query->result();
	}

	function devuelve_pasitos($id_ts){
		$this->db->select('p.*,tsp.*');
		$this->db->from('pasos AS p');
		$this->db->join('ts_pasos as tsp','p.id_paso = tsp.fk_paso');
		$this->db->where('tsp.fk_ts',$id_ts);
		$this->db->group_by('tsp.id_ts_pasos');

		$query = $this->db->get();
		return $query->result();
	}

	function inserta_nuevo_paso($data){
		$this->db->insert('pasos',$data);
		return $this->db->insert_id();
	}

	function inserta_pasos_ts($data){
		$this->db->insert('ts_pasos',$data);
	}

	function elimina_ts_pasos($id_ts_pasos){
		$this->db->delete('ts_pasos', $id_ts_pasos);
	}
//---------------------------cantidad---------------------------
	
	function inserta_cantidad($data){
		$this->db->insert('cantidad',$data);
		return $this->db->insert_id();
	}

//------------------------requisitos----------------------------

	function devuelve_requisitos(){
		$query = $this->db->get('requisitos');
		return $query->result();
	}

	function devuelve_ts_req($id_ts){
		$this->db->select('r.*,tsr.*,c.*');
		$this->db->from('requisitos AS r');
		$this->db->join('requisitos_ts as tsr','r.id_requisito = tsr.fk_requisito');
		$this->db->join('cantidad AS c','tsr.fk_cantidad = c.id_cant');
		$this->db->where('tsr.fk_ts',$id_ts);
		$this->db->group_by('tsr.id_req_ts');

		$query = $this->db->get();
		return $query->result();
	}

	function inserta_nuevo_requi($data){
		$this->db->insert('requisitos',$data);
		return $this->db->insert_id();
	}

	function inserta_req_ts($data){
		$this->db->insert('requisitos_ts',$data);
		return $this->db->insert_id();
	}

	function inserta_req_ext($data){
		$this->db->insert('requisito_externo',$data);
		//return $this->db->insert_id();
	}

	function elimina_ts_requisito($id_ts_requisito){
		$this->db->delete('requisitos_ts', $id_ts_requisito);
	}
//----------------------------tramite / servicio----------------------------

	function inserta_ts($data){
		$this->db->insert('tramites_servicios',$data);
		return $this->db->insert_id();
	}

	function actualiza_clave($id_ts,$data_key){
		$this->db->where('id_ts', $id_ts);
		$this->db->update('tramites_servicios', $data_key);
		return $this->db->insert_id();
	}

	function devuelve_ts(){
		$query = $this->db->get('tramites_servicios');
		return $query->result();
	}

	function datos_ts($data){
		$this->db->select('*');
		$this->db->from('tramites_servicios');
		$this->db->where('id_ts',$data);

		$query = $this->db->get();
		return $query->row_array();
	}

	function devuelve_tramites(){
		$tipo="T";
		$this->db->select('*');
		$this->db->from('tramites_servicios');
		$this->db->where('tipo',$tipo );

		$query = $this->db->get();
		return $query->result();
	}

	function inserta_quien_ambito_ts($data){
		$this->db->insert('quien_ambito_aplicacion',$data);
	}

//--------------------archivos-------------------------------------

	public function cargar_archivo($campo,$tipo_archivo){
    if (!empty($_FILES[$mi_arcivo]['name'])){
            switch ($tipo_archivo) {
              case 1:
                  $config['upload_path'] = 'assets/img/';
                  $config['allowed_types'] = 'jpg|png|gif';
                break;
                case 2:
                    $config['upload_path'] = 'assets/files/';
                    $config['allowed_types'] = 'pdf';
                  break;
            }
            $config['max_size']      = '5120';
            $config['file_name'] = random_string('alnum', 20);
            $extension = substr(strrchr($_FILES[$campo]['name'],'.'),1);
            $nombre_archivo = $config['file_name'].".".$extension;
            $this->upload->initialize($config);
            if ($this->upload->do_upload($campo)){
                 $this->resizeImage($nombre_archivo);
                 return $this->inserta_archivo($nombre_archivo,$tipo_archivo,$_FILES[$campo]['name']);
            }else{
                $this->session->set_flashdata('mensaje_error',$this->upload->display_errors());
                return FALSE;
            }
      }else{
        return FALSE;
      }
  }


  public function resizeImage($filename)
  {
    $source_path = FCPATH."assets/img/".$filename;
    $target_path = FCPATH."assets/img/thumbnail/".$filename;
    $config_manip = array(
        'image_library' => 'gd2',
        'source_image' => $source_path,
        'new_image' => $target_path,
        'maintain_ratio' => TRUE,
        'create_thumb' => TRUE,
        'thumb_marker' => '',
        'width' => 150,
        'height' => 150
    );
    $this->load->library('image_lib', $config_manip);
    if (!$this->image_lib->resize()) {
        echo $this->image_lib->display_errors();
    }
    $this->image_lib->clear();
 }

 function borra_archivo($archivo){
      unlink(FCPATH."assets/img/".$archivo['nombre_archivo']);
   unlink(FCPATH."assets/img/thumbnail/".$archivo['nombre_archivo']);
 }

   function valida_achivo($ruta,$tipo){
       $path = FCPATH."/assets/img/";
       $servidor = base_url('assets/img/');
       if((file_exists($path.$ruta) === FALSE) || $ruta == null){
         return $servidor."image_not_found.png";
       }
       return $servidor.$ruta;
   }

function elimina_archivo($id_archivo){
  $this->db->delete('producto_archivo', array('id_archivo' => $id_archivo));
  $this->db->delete('archivo', array('id_archivo' => $id_archivo));
}

//-------------------------fichas técnicas----------------------------------

	function inserta_ficha_tec($data){
		$this->db->insert('ficha_tecnica',$data);
		return $this->db->insert_id();
	}

    function devuelve_fichas_ts(){
    	$this->db->select('ts.*, f.*, u.*, p.*, a.*, d.*');
		$this->db->from(' tramites_servicios as ts');
		$this->db->join('ficha_tecnica AS f','ts.id_ts = f.fk_ts ');
		$this->db->join('usuario AS u','f.fk_us = u.id_usuario ');
		$this->db->join('persona AS p','u.id_persona = p.id_persona ');
		$this->db->join('areas AS a','p.id_area = a.id_area');
		$this->db->join('dependencia AS d','a.id_depe = d.id_depe');
		$this->db->where('u.id_usuario > 0');
		$this->db->group_by('f.id_ficha');
		
		$query = $this->db->get();
		return $query->result();	
    }

     function devuelve_fichas_ts_us($id_us){
    	$this->db->select('ts.*, f.*, u.*, p.*, a.*, d.*');
    	//$this->db->select('ts.*,f.*,u.*,p.*,a.*');
		$this->db->from(' tramites_servicios as ts');
		$this->db->join('ficha_tecnica AS f','ts.id_ts = f.fk_ts ');
		$this->db->join('usuario AS u','f.fk_us = u.id_usuario ');
		$this->db->join('persona AS p','u.id_persona = p.id_persona ');
		$this->db->join('areas AS a','p.id_area = a.id_area');
		$this->db->join('dependencia AS d','a.id_depe = d.id_depe');
		$this->db->where('u.id_usuario',$id_us);
		$this->db->group_by('f.id_ficha');
		
		$query = $this->db->get();
		return $query->result();	
    }

    function datos_fichatec($id_ficha){
		$this->db->select('ts.*, f.*, u.*, p.*, a.*, d.*,dom.*');
		$this->db->from(' tramites_servicios as ts');
		$this->db->join('ficha_tecnica AS f','ts.id_ts = f.fk_ts ');
		$this->db->join('usuario AS u','f.fk_us = u.id_usuario ');
		$this->db->join('persona AS p','u.id_persona = p.id_persona ');
		$this->db->join('areas AS a','p.id_area = a.id_area');
		$this->db->join('dependencia AS d','a.id_depe = d.id_depe');
		$this->db->join('domicilio AS dom','d.id_dom = dom.id_dom');
		$this->db->where('f.id_ficha',$id_ficha);
		$this->db->group_by('f.id_ficha');
		
		$query = $this->db->get();
		return $query->row_array();	
    
	}

	function actualiza_validacion($id_ft, $data){
		$this->db->where('id_ficha', $id_ft);
		$this->db->update('ficha_tecnica', $data);
	}
//________________________________versiones---------------------------------
    function inserta_version($data){
    	$this->db->insert('versiones',$data);
    }

    function version_ft($data){
    	$this->db->select('v.*');
		$this->db->from('versiones as v');
		$this->db->join('ficha_tecnica as ft','v.fk_ficha = ft.id_ficha');
		$this->db->where('id_ficha',$data);

		$query = $this->db->get();
		return $query->row_array();
    }

}
