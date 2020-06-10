<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {
	

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelo_proyecto');
		$this->load->library('javascript');
	
		
	}
		

	public function error(){
		$this->Modelo_proyecto->valida_sesion();
		$this->Modelo_proyecto->Estar_aqui();
		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/error');
		$this->load->view('templates/panel/footer');

	}


	public function index()
	{
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Alerta </strong>','</div>');
		$this->form_validation->set_rules('usuario','Correo electrónico', 'required|min_length[10]|max_length[50]|valid_email');
		$this->form_validation->set_rules('contrasena', 'Contraseña','required|min_length[4]|max_length[25]');



		if($this->form_validation->run()==FALSE){
			if($this->input->get('error'))
				$data['error'] = $this->input->get('error');
			else
				$data['error'] = false;

			$this->load->view('templates/registro/header');
			$this->load->view('templates/registro/formulario_ingreso',$data);
			$this->load->view('templates/registro/footer');
		}else{
			$this->ingresar();
		}
	}

	public function ingresar(){
		if($this->input->post()){
			$data = array(
				'usuario' => $this->input->post('usuario'),
				'contrasena' => md5($this->input->post('contrasena'))
				);

			$resultado = $this->Modelo_proyecto->valida_usuario($data);

			if($resultado['total'] == 1){
				$data_sesion = array(
					'nombre' => $resultado['nombres'],
					'privilegio' => $resultado['nombre_privilegio'],
					'id_privilegio' => $resultado['id_privilegio'],
					'id_persona' => $resultado['id_persona'],
					'id_usuario' => $resultado['id_usuario'],
					);




				if($this->Modelo_proyecto->crear_sesion($data_sesion)){
					//die(var_dump($this->Modelo_proyecto->datos_sesion()));
					header('Location:'.base_url('index.php/proyecto/panel').'');}
				else
					header('Location:'.base_url('index.php/proyecto/').'');

			}else{
				header('Location:'.base_url('index.php/proyecto?error=1').'');
			}

		}else{
			header('Location:'.base_url().'');
		}

	}


	public function formulario_usuario(){

		$this->load->library('form_validation');
		$this->load->helper('form','url');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('nombres','Nombre','required|min_length[3]|max_length[25]');
		$this->form_validation->set_rules('apellido_p','Apellido Paterno', 'required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('apellido_m','Apellido Materno', 'required|min_length[2]|max_length[25]');

		$this->form_validation->set_rules('genero', 'Género', 'required');
		$this->form_validation->set_rules('fecha', 'Fecha de nacimiento', 'required|callback_valid_date[d-m-y,-]');

       $this->form_validation->set_rules('num_empleado', 'Número de empleado', 'required|min_length[1]|max_length[5]|is_unique[persona.num_empleado],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
       $this->form_validation->set_rules('id_area', 'Área', 'required');
       $this->form_validation->set_rules('id_cargo', 'Cargo', 'required');

		$this->form_validation->set_rules('correo','Correo Electrónico','required|min_length[2]|max_length[100]|valid_email|is_unique[usuario.usuario]',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));

		$this->form_validation->set_rules('contrasena','Contraseña', 'required|min_length[4]|max_length[25]|callback_check_password');
		$this->form_validation->set_rules('contrasena_conf','Confirmar contraseña', 'required|min_length[4]|max_length[25]|matches[contrasena]');

		$this->form_validation->set_rules('aviso', 'Aviso de privacidad', 'required');

		$data['areas'] = $this->Modelo_proyecto->devuelve_areas();
			$data['cargos'] = $this->Modelo_proyecto->devuelve_cargos();
			

		if($this->form_validation->run()==FALSE){
			

			$this->load->view('templates/registro/header');
			$this->load->view('templates/registro/formulario_usuario',$data);
			$this->load->view('templates/registro/footer');


		}else{
			if($this->input->post()){

			//05-07-2016
			$fecha_final = $this->input->post('fecha');
			//var_dump($fecha_final);
			$dia = substr($fecha_final,0,2);
			$mes = substr($fecha_final,3,2);
			$anio = substr($fecha_final,6,4);

			$fecha = $anio.'-'.$mes.'-'.$dia;
			//var_dump($fecha);
			$data_persona = array(
				'nombres' => $this->input->post('nombres'),
				'ape_pat' => $this->input->post('apellido_p'),
				'ape_mat' => $this->input->post('apellido_m'),
				'correo' => $this->input->post('correo'),
				'genero' => $this->input->post('genero'),
				'fecha_nac' => $fecha,
				'num_empleado' => $this->input->post('num_empleado'),
				'id_area' => $this->input->post('id_area'),
				'id_cargo' => $this->input->post('id_cargo')
				);

			
			$id_persona = $this->Modelo_proyecto->insertar_persona($data_persona);


			$data_usuario = array(
				'usuario' => $this->input->post('correo'),
				'contrasena' => md5($this->input->post('contrasena')),
				'id_persona' => $id_persona,//DUDDDDDAAAAAA
				'id_privilegio' => ('3'),
				'activo' => '1'
				);


			$this->Modelo_proyecto->insertar_usuario($data_usuario);

			//header('Location:'.base_url('index.php/proyecto/').'');

			}header('Location:'.base_url('index.php/proyecto/').'');
		}
	
}

function valid_date($str, $params)
 {
 	//var_dump($str);
  // setup
  $CI =&get_instance();
  $params = explode(',', $params);

  $delimiter = $params[1];

  $date_parts = explode($delimiter, $params[0]);

  // get the index (0, 1 or 2) for each part
  $di = $this->valid_date_part_index($date_parts, 'd');
  $mi = $this->valid_date_part_index($date_parts, 'm');
  $yi = $this->valid_date_part_index($date_parts, 'y');


  // regex setup
  $dre =   "(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31)";
  $mre = "(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12)";
  $yre = "([0-9]{4})";
  $red = ''.$delimiter; // escape delimiter for regex
  $rex = "/^[0]{$red}[1]{$red}[2]/";

  // do replacements at correct positions
  $rex = str_replace("[{$di}]", $dre, $rex);
  $rex = str_replace("[{$mi}]", $mre, $rex);
  $rex = str_replace("[{$yi}]", $yre, $rex);
  //echo $rex;
  if (preg_match($rex, $str, $matches))
  {
   // skip 0 as it contains full match, check the date is logically valid
   if (checkdate($matches[$mi + 1], $matches[$di + 1], $matches[$yi + 1]))
   {
    return true;
   }
   else
   {
    // match but logically invalid
    $CI->form_validation->set_message('valid_date', "La fecha es inválida.");
    return false;
   }
  }

  // no match
  $CI->form_validation->set_message('valid_date', "El formato de la fecha es incorrecto. Utilice dia/mes/año Ejemplo: 16/01/2016");
  return false;
 }

 function valid_date_part_index($parts, $search)
 {
  for ($i = 0; $i <= count($parts); $i++)
  {
   if ($parts[$i] == $search)
   {
    return $i;
   }
  }
 }

function check_password($str)
{
   if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$',$str))
    {
        $this->form_validation->set_message('check_password', 'Tu contraseña debe contener al menos: 8 caracterés una letra mayúscula una letra minúscula y al menos un caracter especial');
        return FALSE;
    }
    else
    {
        return TRUE;
    }

}



public function panel(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['fichas_tecnicas'] = $this->Modelo_proyecto->devuelve_fichas_ts();
    //die(var_dump($data['fichas_tecnicas']));

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/principal');
	$this->load->view('templates/panel/footer');
}

//-- Privilegios

public function privilegios(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();
	$data['privilegios'] = $this->Modelo_proyecto->devuelve_privilegios();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/privilegios',$data);
	$this->load->view('templates/panel/footer');

}

public function alta_privilegio(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre','Privilegio', 'required|min_length[3]|max_length[50]|is_unique[privilegio.nombre_privilegio]');
	$this->form_validation->set_rules('descripcion','Descripción', 'required|min_length[3]|max_length[50]');

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_privilegio',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data = array(
				'nombre_privilegio' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'publico' => 1
				);

			$this->Modelo_proyecto->inserta_privilegio($data);

			header('Location:'.base_url('index.php/proyecto/privilegios').'');

		}
	}
}

public function edita_privilegio(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$ki = $this->uri->segment(3);
	if(!empty($ki)){

		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('nombre','Privilegio', 'required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('descripcion','Descripción', 'required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('id_privilegio','id del Privilegio', 'required');


		if ($this->form_validation->run() == FALSE){
		$data['id_privilegio'] = $this->uri->segment(3);
		$data['privilegio'] = $this->Modelo_proyecto->datos_privilegio($data['id_privilegio']);

		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_edita_privilegio',$data);
		$this->load->view('templates/panel/footer');
		}else{
			$data = array(
					'nombre_privilegio' => $this->input->post('nombre'),
					'descripcion' => $this->input->post('descripcion'),
					);
				$this->Modelo_proyecto->actualiza_privilegio($this->input->post('id_privilegio'),$data);
				header('Location:'.base_url('index.php/proyecto/privilegios').'');
		}
	}else{
		header('Location:'.base_url('index.php/proyecto/privilegios').'');
	}
}

public function salir(){
	$this->Modelo_proyecto->destruye_sesion();
}

//-- Funciones Secciones
public function secciones(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['secciones'] = $this->Modelo_proyecto->devuelve_secciones();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/secciones',$data);
	$this->load->view('templates/panel/footer');
}

public function alta_seccion(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['secciones'] = $this->Modelo_proyecto->devuelve_secciones();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre','Privilegio', 'required|min_length[3]|max_length[35]');
	$this->form_validation->set_rules('descripcion','Descripción', 'required|min_length[3]|max_length[100]');
	$this->form_validation->set_rules('url','URL', 'required|min_length[3]|max_length[20]|is_unique[seccion.url],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));


	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_seccion',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data = array(
				'nombre_seccion' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'url' => $this->input->post('url'),
				'activo' => $this->input->post('menu')
				);

			$this->Modelo_proyecto->inserta_seccion($data);

			header('Location:'.base_url('index.php/proyecto/secciones').'');

		}
	}
}

public function edita_seccion(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('nombre','Privilegio', 'required|min_length[3]|max_length[35]');
		$this->form_validation->set_rules('descripcion','Descripción', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('url','URL', 'required|min_length[3]|max_length[20]');


		if ($this->form_validation->run() == FALSE){

		$data['id_seccion'] = $this->uri->segment(3);
		$data['seccion'] = $this->Modelo_proyecto->datos_seccion($data['id_seccion']);


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_edita_seccion',$data);
		$this->load->view('templates/panel/footer');
		}else{
			$data = array(
					'nombre_seccion' => $this->input->post('nombre'),
					'descripcion' => $this->input->post('descripcion'),
					'url' => $this->input->post('url'),
					'activo' => $this->input->post('menu')
					);

				$this->Modelo_proyecto->actualiza_seccion($this->input->post('id_seccion'),$data);
				header('Location:'.base_url('index.php/proyecto/secciones').'');
		}
	}else{
			header('Location:'.base_url('index.php/proyecto/secciones').'');
	}
}

public function delete_seccion(){
	$data = array(
		'id_seccion' => $this->uri->segment(3)
		);
	$this->Modelo_proyecto->delete_seccion($data);
	header('Location:'.base_url('index.php/proyecto/secciones/'.$this->uri->segment(3).'').'');
}
//Privilegio Sección ------------


public function privilegio_seccion(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();
	$data['privilegios'] = $this->Modelo_proyecto->devuelve_privilegios_seccion();

	//var_dump($data['privilegios']);
	//die();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/privilegio_seccion',$data);
	$this->load->view('templates/panel/footer');

}

public function agrega_seccion(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){
		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		//$data['secciones']'' = $this->Modelo_proyecto->secciones_privilegio($this->uri->segment(3));
		$data['secciones_faltan'] = $this->Modelo_proyecto->drop_secciones_faltantes($this->uri->segment(3));
		$data['id_privilegio'] = $this->uri->segment(3);
		$data['secciones'] = $this->Modelo_proyecto->secciones_privilegio($this->uri->segment(3));
		$data['datos_privilegio'] = $this->Modelo_proyecto->devuelve_datos_privilegio($this->uri->segment(3));
		//die(var_dump($data['datos_privilegio']));

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');
		$this->form_validation->set_rules('campo_seccion','Sección', 'required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('templates/panel/header',$data);
			$this->load->view('templates/panel/menu',$data);
			$this->load->view('templates/panel/agrega_seccion',$data);
			$this->load->view('templates/panel/footer');
		}else{
			$data = array(
				'id_seccion' => $this->input->post('campo_seccion'),
				'id_privilegio' => $this->input->post('id_privilegio'),
				'menu' => '1'
				);
			$this->Modelo_proyecto->inserta_privilegio_seccion($data);
			header('Location:'.base_url('index.php/proyecto/agrega_seccion/'.$this->input->post('id_privilegio').'').'');
		}
	}else{
		header('Location:'.base_url('index.php/proyecto/privilegio_seccion').'');
	}
}

public function elimina_seccion(){
	$data = array(
		'id_privilegio' => $this->uri->segment(3),
		'id_seccion' => $this->uri->segment(4)
		);
	$this->Modelo_proyecto->elimina_privilegio_seccion($data);
	header('Location:'.base_url('index.php/proyecto/agrega_seccion/'.$this->uri->segment(3).'').'');
}




//----------------------------CATALOGOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS--------------
public function catalogos(){
$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	//$data['dependencias'] = $this->Modelo_proyecto->devuelve_dependencias();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/catalogos',$data);
	$this->load->view('templates/panel/footer');

}
//---------------------Áreas------------------------------------------------

public function areas(){

    $this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['areas'] = $this->Modelo_proyecto->devuelve_areas_dependencia_horario();
	


	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/areas',$data);
	$this->load->view('templates/panel/footer');
}

public function alta_areas(){

	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['dependencias'] = $this->Modelo_proyecto->devuelve_dependencias();
	$data['horario'] = $this->Modelo_proyecto->devuelve_horarios();

	$data['areas'] = $this->Modelo_proyecto->devuelve_areas();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre_a','Área', 'required|min_length[3]|max_length[60]|is_unique[areas.nombre_a],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
	$this->form_validation->set_rules('descripcion','Descripción', 'required|min_length[3]|max_length[150]');
	$this->form_validation->set_rules('ubicacion','Ubicación', 'required|min_length[3]|max_length[150]');
	$this->form_validation->set_rules('id_depe','Dependencia','required');
	$this->form_validation->set_rules('id_horario','Horario','required');



	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_area',$data);
		$this->load->view('templates/panel/footer');
		
	}else{
		if($this->input->post()){
			$data_area = array(
				'nombre_a' => $this->input->post('nombre_a'),
				'descripcion' => $this->input->post('descripcion'),
				'ubicacion' => $this->input->post('ubicacion'),
				'id_depe' => $this->input->post('id_depe'),
				'id_horario' => $this->input->post('id_horario')
				//'activo' => $this->input->post('menu')
				);
			$this->Modelo_proyecto->inserta_areas($data_area);

			header('Location:'.base_url('index.php/proyecto/areas').'');
		}
	}
}

public function edita_area(){

	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['dependencias'] = $this->Modelo_proyecto->devuelve_dependencias();
	$data['horario'] = $this->Modelo_proyecto->devuelve_horarios();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('nombre_a','Área', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('descripcion','Descripción', 'required|min_length[3]|max_length[150]');
	$this->form_validation->set_rules('ubicacion','Ubicación', 'required|min_length[3]|max_length[150]');
	//$this->form_validation->set_rules('dependencia','Dependencia','trim|required|xss_clean');
	//$this->form_validation->set_rules('horario','Horario','trim|required|xss_clean');


		if ($this->form_validation->run() == FALSE){

		$data['id_area'] = $this->uri->segment(3);
		$data['areas'] = $this->Modelo_proyecto->datos_area($data['id_area']);


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_edita_area',$data);
		$this->load->view('templates/panel/footer');
		}else{
			$data = array(
				'nombre_a' => $this->input->post('nombre_a'),
				'descripcion' => $this->input->post('descripcion'),
				'ubicacion' => $this->input->post('ubicacion'),
				'id_depe' => $this->input->post('id_depe'),
				'id_horario' => $this->input->post('id_horario')
				);


				$this->Modelo_proyecto->actualiza_area($this->input->post('id_area'),$data);
				header('Location:'.base_url('index.php/proyecto/areas').'');
		}
	}else{
			header('Location:'.base_url('index.php/proyecto/areas').'');
	}

}

public function elimina_areas(){
		$data = array(
		'id_area' => $this->uri->segment(3)
		);
	$this->Modelo_proyecto->elimina_area($data);
	header('Location:'.base_url('index.php/proyecto/areas/'.$this->uri->segment(3).'').'');
}
//----------Cargos----------------------------------------------------------
public function cargos(){
$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	
	$data['cargos'] = $this->Modelo_proyecto->devuelve_cargos();


	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/cargos',$data);
	$this->load->view('templates/panel/footer');
}

public function alta_cargo(){
	
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['cargos'] = $this->Modelo_proyecto->devuelve_cargos();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre','Cargo', 'required|min_length[3]|max_length[70]|is_unique[cargos.nombre],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
	$this->form_validation->set_rules('descripcion_c','Descripción', 'required|min_length[3]|max_length[150]');
	//$this->form_validation->set_rules('id_area','Área','required');


	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_cargo',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data_cargo = array(
				'nombre' => $this->input->post('nombre'),
				'descripcion_c' => $this->input->post('descripcion_c')
				);
			$this->Modelo_proyecto->inserta_cargo($data_cargo);

			/*$data_cargo_area = array(
					'id_cargo' => $id_cargo,
					'id_area' => $this->input->post('id_area')
			);
			$this->Modelo_proyecto->inserta_cargo_area($data_cargo_area);*/

			header('Location:'.base_url('index.php/proyecto/cargos').'');
		}	
	}
}

public function edita_cargo(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

        $this->form_validation->set_rules('nombre','Cargo', 'required|min_length[3]|max_length[70]');
	    $this->form_validation->set_rules('descrip','Descripción', 'required|min_length[3]|max_length[150]');


		if ($this->form_validation->run() == FALSE){

		$data['id_cargo'] = $this->uri->segment(3);
		$data['cargo'] = $this->Modelo_proyecto->datos_cargos($data['id_cargo']);


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_edita_cargo',$data);
		$this->load->view('templates/panel/footer');
		}else{
			$data_cargo = array(
				'nombre' => $this->input->post('nombre'),
				'descripcion_c' => $this->input->post('descripcion_c')
				);
			
				$this->Modelo_proyecto->actualiza_cargo($this->input->post('id_cargo'),$data);
				header('Location:'.base_url('index.php/proyecto/cargos').'');
		}
	}else{
			header('Location:'.base_url('index.php/proyecto/cargos').'');
	}
}

public function elimina_cargo(){
$data = array(
		'id_cargo' => $this->uri->segment(3),
		
		);
	$this->Modelo_proyecto->elimina_cargo($data);
	header('Location:'.base_url('index.php/proyecto/cargos/'.$this->uri->segment(3).'').'');
}


//---------Dependencias-----------------------------------------------------

public function dependencias(){
$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	
	//$data['extensiones'] = $this->Modelo_proyecto->devuelve_extension();
	$data['dependencias'] = $this->Modelo_proyecto->devuelve_dependencias();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/dependencias',$data);
	$this->load->view('templates/panel/footer');
}


public function alta_dependencia(){
	
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	//$data['extensiones'] = $this->Modelo_proyecto->devuelve_extension();
	$data['dependencias'] = $this->Modelo_proyecto->devuelve_dependencias();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre','Dependencia', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('descrip','Descripción', 'required|min_length[3]|max_length[200]');
	$this->form_validation->set_rules('telefono','Teléfono', 'required|min_length[6]|max_length[12]');
	$this->form_validation->set_rules('siglas','Siglas');

	$this->form_validation->set_rules('estado','Estado', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('municipio','Municipio', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('colonia','colonia', 'required|min_length[3]|max_length[50]');
	$this->form_validation->set_rules('calle','Calle', 'required|min_length[3]|max_length[50]');
	$this->form_validation->set_rules('c_p','Código postal', 'required');

//$this->form_validation->set_rules('extension','Extensión telefónica', 'required|min_length[1]|max_length[5]');

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_dep',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data = array(
				'estado' => $this->input->post('estado'),
				'municipio' => $this->input->post('municipio'),
				'colonia' => $this->input->post('colonia'),
				'calle' => $this->input->post('calle'),
				'num_int' => $this->input->post('num_int'),
				'num_ext' => $this->input->post('num_ext'),
				'c_p' => $this->input->post('c_p'),
				);
		

			$id_dom = $this->Modelo_proyecto->inserta_domicilio($data);


			$data = array(
				'nombre' => $this->input->post('nombre'),
				'descrip' => $this->input->post('descrip'),
				'telefono' =>$this->input->post('telefono'),
				'siglas' => $this->input->post('siglas'),
				'id_dom' => $id_dom,
			    'extension' =>  $this->input->post('extension')
				);

			$this->Modelo_proyecto->inserta_dependencia($data);


			/*$data=array(
				'extension' =>$this->input->post('extension'),

				);*/
			

			header('Location:'.base_url('index.php/proyecto/dependencias').'');
		}
	}
}


public function edita_dependencia(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('nombre','Dependencia', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('descrip','Descripción', 'required|min_length[3]|max_length[200]');
	$this->form_validation->set_rules('telefono','Teléfono', 'required|min_length[6]|max_length[12]');
	$this->form_validation->set_rules('siglas','Siglas');

	$this->form_validation->set_rules('estado','Estado', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('municipio','Municipio', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('colonia','colonia', 'required|min_length[3]|max_length[50]');
	$this->form_validation->set_rules('calle','Calle', 'required|min_length[3]|max_length[50]');
	$this->form_validation->set_rules('c_p','Código postal', 'required');

//$this->form_validation->set_rules('extension','Extensión telefónica', 'required|min_length[1]|max_length[5]');

		if ($this->form_validation->run() == FALSE){

		$data['id_dep'] = $this->uri->segment(3);
		$data['dependencia'] = $this->Modelo_proyecto->datos_dependencia($data['id_dep']);

		$data['id_dom'] = $this->uri->segment(4);
		$data['domicilio'] = $this->Modelo_proyecto->datos_domicilio($data['id_dom']);

		//$data['extensiones'] = $this->Modelo_proyecto->devuelve_extension();


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_edita_dependencia',$data);
		$this->load->view('templates/panel/footer');
		}else{
			$data= array(
				'nombre' => $this->input->post('nombre'),
				'descrip' => $this->input->post('descrip'),
				'telefono' =>$this->input->post('telefono'),
				'siglas' => $this->input->post('siglas'),
				'extension' =>  $this->input->post('extension')
				);

				$this->Modelo_proyecto->actualiza_dependencia($this->uri->segment(3),$data);


				$data= array(
             
				'estado' => $this->input->post('estado'),
				'municipio' => $this->input->post('municipio'),
				'colonia' => $this->input->post('colonia'),
				'calle' => $this->input->post('calle'),
				'num_int' => $this->input->post('num_int'),
				'num_ext' => $this->input->post('num_ext'),
				'c_p' => $this->input->post('c_p'),
				//var_dump($id_dom)
				);
				
			$this->Modelo_proyecto->actualiza_domicilio($this->uri->segment(4),$data);

				header('Location:'.base_url('index.php/proyecto/dependencias').'');
		}
	}else{
			header('Location:'.base_url('index.php/proyecto/dependencias').'');
	}
}

public function elimina_dep_dom(){

		$data = array(
		'id_depe' => $this->uri->segment(3),
		);
	$this->Modelo_proyecto->elimina_dep($data);

		$data_dom = array(
		'id_dom' => $this->uri->segment(4),
		);
	$this->Modelo_proyecto->elimina_dom($data_dom);

	header('Location:'.base_url('index.php/proyecto/dependencias/'.$this->uri->segment(3).''.$this->uri->segment(4).'').'');
}

//----------------Horario------------------------------------------------------
 public function horarios(){
$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['horarios'] = $this->Modelo_proyecto->devuelve_horarios();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/horarios',$data);
		$this->load->view('templates/panel/footer');
	
}

 public function alta_horario(){
	
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	//$data['usuarios'] = $this->Modelo_proyecto->devuelve_usuarios();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('dias','Dias', 'required|min_length[3]|max_length[20]');
	$this->form_validation->set_rules('horas','Horas', 'required|min_length[3]|max_length[18]');
	

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_horario',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data = array(
				'dias' => $this->input->post('dias'),
				'horas' => $this->input->post('horas')
				//'activo' => $this->input->post('menu')
				);

			$this->Modelo_proyecto->inserta_horarios($data);

			header('Location:'.base_url('index.php/proyecto/horarios').'');
		}
	}
}


public function elimina_horario(){

		$data = array(
		'id_horario' => $this->uri->segment(3),
		
		);
	$this->Modelo_proyecto->elimina_horario($data);
	header('Location:'.base_url('index.php/proyecto/horarios/'.$this->uri->segment(3).'').'');
}
//-------------------LEYES------------------------
public function leyes(){

	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['leyes'] = $this->Modelo_proyecto->devuelve_leyes();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/leyes',$data);
	$this->load->view('templates/panel/footer');
}

public function alta_leyes(){
	//var_dump(alta_leyes);
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['leyes'] = $this->Modelo_proyecto->devuelve_leyes();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('titulo','Titulo', 'required|min_length[3]|max_length[75]|is_unique[leyes.titulo],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
	


	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_leyes',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			
			$data = array(
				'titulo' => $this->input->post('titulo'),
				);
			$this->Modelo_proyecto->inserta_ley($data);
			

			header('Location:'.base_url('index.php/proyecto/leyes').'');

		} 
	}
}

public function elimina_ley(){
	$data = array(
		'id_ley' => $this->uri->segment(3),
		
		);
	$this->Modelo_proyecto->elimina_ley($data);
	header('Location:'.base_url('index.php/proyecto/leyes/'.$this->uri->segment(3).'').'');
}

public function edita_ley(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('titulo','Titulo', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('lugar','Lugar', 'required|min_length[3]|max_length[70]');
		$this->form_validation->set_rules('fecha','Fecha', 'required|min_length[3]|max_length[20]');


		if ($this->form_validation->run() == FALSE){

		$data['id_ley'] = $this->uri->segment(3);
		$data['leyes'] = $this->Modelo_proyecto->datos_ley($data['id_ley']);


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_edita_ley',$data);
		$this->load->view('templates/panel/footer');
		}else{
			$data = array(
					'titulo' => $this->input->post('titulo'),
					'lugar' => $this->input->post('lugar'),
					'fecha' => $this->input->post('fecha')
					
					);

				$this->Modelo_proyecto->actualiza_ley($this->input->post('id_ley'),$data);
				header('Location:'.base_url('index.php/proyecto/leyes').'');
		}
	}else{
			header('Location:'.base_url('index.php/proyecto/leyes').'');
	}
}

//------------------------------EXTENSIONES----------------------------------
public function extensiones(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['extensiones'] = $this->Modelo_proyecto->devuelve_extension();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/extensiones',$data);
	$this->load->view('templates/panel/footer');
}

public function alta_extension(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['extensiones'] = $this->Modelo_proyecto->devuelve_extension();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('extension','Extensión', 'required|min_length[4]|max_length[10]');

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_extension',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data = array(
				'extension' => $this->input->post('extension'),
								
				);



			$this->Modelo_proyecto->inserta_extension($data);
			//die(var_dump($id_ley));

			header('Location:'.base_url('index.php/proyecto/extensiones').'');

		} 
	}
}

public function elimina_extension(){

		$data = array(
		'id_extension' => $this->uri->segment(3),
		
		);
	$this->Modelo_proyecto->elimina_extension($data);
	header('Location:'.base_url('index.php/proyecto/extensiones/'.$this->uri->segment(3).'').'');
}

//------------------------------MEDIOS Y TIPO_MEDIOS-------------------------
public function medios(){

		$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['medios'] = $this->Modelo_proyecto->devuelve_medios();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/medios',$data);
	$this->load->view('templates/panel/footer');


}

public function alta_medio(){
	
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['medios'] = $this->Modelo_proyecto->devuelve_medios();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre','Nombre', 'required|min_length[3]|max_length[20]');
	
	

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_medios',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data = array(
				'nombre' => $this->input->post('nombre'),
				);

			$this->Modelo_proyecto->inserta_medio($data);

			header('Location:'.base_url('index.php/proyecto/medios').'');
		}
	}
}

public function elimina_medio(){

	$data = array(
		'id_medio' => $this->uri->segment(3),
		
		);
	$this->Modelo_proyecto->elimina_medio($data);
	header('Location:'.base_url('index.php/proyecto/medios/'.$this->uri->segment(3).'').'');
}
//------------------------------USUARIOS Y PERSONAS-------------------------------------
public function usuarios(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['usuarios'] = $this->Modelo_proyecto->devuelve_usuarios();
	//$data['privilegios'] = $this->Modelo_proyecto->devuelve_privilegios();


	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/usuarios',$data);
	$this->load->view('templates/panel/footer');

}

public function asigna_privilegio(){

	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('usuario','usuario', 'required|min_length[3]|max_length[200]');
	//$this->form_validation->set_rules('contrasena','contrasena', 'required|min_length[3]|max_length[200]');
	$this->form_validation->set_rules('activo','activo', 'required|min_length[2]|max_length[200]');

		if ($this->form_validation->run() == FALSE){

		$data['privilegios'] = $this->Modelo_proyecto->devuelve_privilegios();

		$data['id_usuario'] = $this->uri->segment(3);
		$data['usuarios'] = $this->Modelo_proyecto->datos_usuarios($data['id_usuario']);
		//var_dump($data['usuarios']); die();


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/asigna_privilegio',$data);
		$this->load->view('templates/panel/footer');
		}else{
			
			$data = array(
				/*'usuario' => $this->input->post('usuario'),
				'contrasena' => $this->input->post('contrasena'),
				'activo' => $this->input->post('activo'),*/
				'id_privilegio' => $this->input->post('id_privilegio')
				);


				$this->Modelo_proyecto->actualiza_usuario_privilegio($this->input->post('id_usuario'),$data);

					header('Location:'.base_url('index.php/proyecto/usuarios').'');
		}
	}else{
			header('Location:'.base_url('index.php/proyecto/usuarios').'');
	}
}

public function edita_persona(){
$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombres','Nombre', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('ape_pat','Apellido Paterno', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('ape_mat','Apellido Materno', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('fecha_nac','Fecha de nacimiento', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('genero','genero', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('num_empleado','Número de empleado', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('area','Area', 'required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('cargo','Cargo', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('gmail','Gmail', 'required|min_length[3]|max_length[30]');

	

		if ($this->form_validation->run() == FALSE){
		$data['id_persona'] = $this->uri->segment(3);
		$data['persona'] = $this->Modelo_proyecto->datos_persona($data['id_persona']);
		$data['areas'] = $this->Modelo_proyecto->devuelve_areas('id_area');
		$data['cargos'] = $this->Modelo_proyecto->devuelve_cargos('id_cargo');
		//$data['extensiones'] = $this->Modelo_proyecto->devuelve_extension()

		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_edita_persona',$data);
		$this->load->view('templates/panel/footer');
		}else{
			//var_dump($id_persona); 

			$data= array(

				'nombres' => $this->input->post('nombres'),
				'apellido_p' => $this->input->post('ape_pat'),
				'apellido_m' =>$this->input->post('ape_mat'),
				'fecha_nac' =>$this->input->post('fecha_nac'),
				'genero' => $this->input->post('genero'),
				'num_empleado' =>  $this->input->post('num_empleado'),
				'id_area' =>  $this->input->post('id_area'),
				'id_cargo' =>  $this->input->post('id_cargo')


				);


			$this->Modelo_proyecto->actualiza_persona($this->input->post('id_persona'),$data);
			header('Location:'.base_url('index.php/proyecto/usuarios').'');

		}
	}





else{
			header('Location:'.base_url('index.php/proyecto/usuarios').'');
	}
}
///++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++pendientre
public function elimina_priv(){
	$data = array(
		'id_horario' => $this->uri->segment(3),
		
		);
	$this->Modelo_proyecto->elimina_horario($data);
	header('Location:'.base_url('index.php/proyecto/horarios/'.$this->uri->segment(3).'').'');
}
//-----------------------------modalidades--------------------------------------
public function modalidades(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	//$data['usuarios'] = $this->Modelo_proyecto->devuelve_usuarios();
	$data['modalidades'] = $this->Modelo_proyecto->devuelve_modalidades();


	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/modalidades',$data);
	$this->load->view('templates/panel/footer');
}

public function alta_modalidad(){

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	//$data['medios'] = $this->Modelo_proyecto->devuelve_medios();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre_modalidad','Nombre', 'required|min_length[3]|max_length[30]|is_unique[modalidades.nombre_modalidad],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
	$this->form_validation->set_rules('descripcion','Descripcione', 'required|min_length[3]|max_length[150]');
	$this->form_validation->set_rules('identificador','Identificador', 'required|min_length[1]|max_length[2]');
	

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_modalidad',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data = array(
				'nombre_modalidad' => $this->input->post('nombre_modalidad'),
				'descripcion' => $this->input->post('descripcion'),
				'identificador' => $this->input->post('identificador')
				);

			$this->Modelo_proyecto->inserta_modalidad($data);

			header('Location:'.base_url('index.php/proyecto/modalidades').'');
		}
	}
}

public function elimina_modalidad(){

	$data = array(
		'id_modalidad' => $this->uri->segment(3)
		
		);
	$this->Modelo_proyecto->elimina_modalidad($data);

	header('Location:'.base_url('index.php/proyecto/modalidades/').$this->uri->segment(3).'');

}

//----------------------clasificaciones (Registros públicos municipales)-------
public function clasificaciones(){

	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['clasificacion'] = $this->Modelo_proyecto->devuelve_clasificaciones();

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/clasificaciones',$data);
	$this->load->view('templates/panel/footer');


}

public function alta_clasificacion(){

$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['medios'] = $this->Modelo_proyecto->devuelve_medios();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre_clasificacion','Registro público municipal', 'required|min_length[3]|max_length[50]|is_unique[clasificacion.nombre_clasificacion],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
	$this->form_validation->set_rules('descripcion','Descripción', 'required|min_length[3]|max_length[150]');
	$this->form_validation->set_rules('identificador_c','Identificador', 'required|min_length[1]|max_length[2]|is_unique[clasificacion.identificador_c],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
	
	

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_clasificacion',$data);
		$this->load->view('templates/panel/footer');
	}else{
		if($this->input->post()){
			$data = array(
				'nombre_clasificacion' => $this->input->post('nombre_clasificacion'),
				'descripcion' => $this->input->post('descripcion'),
				'identificador_c' => $this->input->post('identificador_c')
				);

			$this->Modelo_proyecto->inserta_clasificacion($data);

			header('Location:'.base_url('index.php/proyecto/clasificaciones').'');
		}
	}
}

public function edita_clasificacion(){

	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$data['clasificaciones'] = $this->Modelo_proyecto->devuelve_clasificaciones();
	//$data['horario'] = $this->Modelo_proyecto->devuelve_horarios();

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('nombre_clasificacion','Nombre', 'required|min_length[3]|max_length[50]');
	$this->form_validation->set_rules('descripcion','Descripción', 'required|min_length[3]|max_length[150]');
	$this->form_validation->set_rules('identificador_c','Identificador', 'required|min_length[1]|max_length[2]');


		if ($this->form_validation->run() == FALSE){

		$data['id_clasificacion'] = $this->uri->segment(3);
		$data['clasificaciones'] = $this->Modelo_proyecto->datos_clasificacion($data['id_clasificacion']);


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/formulario_edita_clasificacion',$data);
		$this->load->view('templates/panel/footer');
		}else{
			$data = array(
				'nombre_clasificacion' => $this->input->post('nombre_clasificacion'),
				'descripcion' => $this->input->post('descripcion'),
				'identificador_c' => $this->input->post('identificador_c')
				);


				$this->Modelo_proyecto->actualiza_clasificacion($this->input->post('id_clasificacion'),$data);
				header('Location:'.base_url('index.php/proyecto/clasificaciones').'');
		}
	}else{
			header('Location:'.base_url('index.php/proyecto/clasificaciones').'');
	}

}

public function eliminar_clasificacion(){
	$data = array(
		'id_clasificacion' => $this->uri->segment(3)	
		);
	$this->Modelo_proyecto->elimina_clasificacion($data);

	header('Location:'.base_url('index.php/proyecto/clasificaciones/').$this->uri->segment(3).'');
}
//_______________ Scripts objetos dinámicos____________________________________

public function sript_pasos(){

}


//----------------------fichas técnicas--------------------------------------


public function alta_fichat_1(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

        $data['clasificacion'] = $this->Modelo_proyecto->devuelve_clasificaciones();
		$data['ambito'] = $this->Modelo_proyecto->devuelve_ambitos_aplicacion();
		$data['quien'] = $this->Modelo_proyecto->devuelve_quien_puede();
		$data['modalidad'] = $this->Modelo_proyecto->devuelve_modalidades();
		
	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nombre','Nombre', 'required|min_length[3]|max_length[100]|is_unique[tramites_servicios.nombre_ts],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
	$this->form_validation->set_rules('tipo','Tipo', 'required');
	$this->form_validation->set_rules('fk_rpm','Registros públicos municipales', 'required');
	$this->form_validation->set_rules('descripcion_ft','Descripción', 'required|min_length[3]|max_length[250]');
	$this->form_validation->set_rules('producto_final','Producto final', 'required|min_length[3]|max_length[100]');
	$this->form_validation->set_rules('en_caso_de','Presentar en caso de', 'required|min_length[3]|max_length[85]');
	$this->form_validation->set_rules('ambito_de_a','Ámbito de aplicación', 'required');
	$this->form_validation->set_rules('quien_p[]','Quién puede realizar', 'required');
	$this->form_validation->set_rules('modalidad','Modalidad', 'required');
	$this->form_validation->set_rules('ficta','Ficta', 'required');
	//$this->form_validation->set_rules('vigencia','Vigencia', 'required|min_length[3]|max_length[20]');
	//$this->form_validation->set_rules('costo','Costo');
	//$this->form_validation->set_rules('concepto_pago','Concepto de pago');

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_ficha_1',$data);
		$this->load->view('templates/panel/footer');
}else{
		if($this->input->post()){

			$tipo = $this->input->post('tipo');
			$var1 = "";
			$var2 = "";

			$data_ts = array(
				'nombre_ts' => $this->input->post('nombre'),
				'descripcion_ft' => $this->input->post('descripcion_ft'),
				'en_caso_de' => $this->input->post('en_caso_de'),
				'tipo' =>($tipo),
				'fk_rpm' => $this->input->post('fk_rpm'),
				'vigencia' => $this->input->post('vigencia'),
				'fk_modalidad' => $this->input->post('modalidad'),
				'costo' => $this->input->post('costo'),
				'concepto_pago' => $this->input->post('concepto_pago'),
				//'fk_archivo' => $this->input->post('identificador_c'),
				'ficta' => $this->input->post('ficta'),
				'producto_final' => $this->input->post('producto_final'),
				'fk_ambito_de_a' => $this->input->post('ambito_de_a'),
				);
//var_dump($data_ts); die();
			$id_ts=$this->Modelo_proyecto->inserta_ts($data_ts);


			$data2=$this->input->post('quien_p[]');

				foreach ($data2 as $q) {
							$data_final=array(
								'fk_ts'=>($id_ts),
								'fk_quien_p'=>($q)
							);
			$this->Modelo_proyecto->inserta_quien_ambito_ts($data_final);
			
			} 

				if ($tipo == "T"){ 
					$var2="TRA"; 
					}else{ $var2="SER"; 
						}

					$var1="HUI";
					$clave_final= $var1.'-'.$var2.'-'.$id_ts;

					$data_key= array(
					'clave'=>($clave_final)
					);

		$this->Modelo_proyecto->actualiza_clave($id_ts,$data_key);
		

		//$this->alta_fichat_2($id_ts);
		
header('Location:'.base_url('index.php/proyecto/alta_fichat_2_1').'/'.$id_ts.'');
		}
	}
	
}



public function alta_fichat_2_1(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

		
        $data['pasos'] = $this->Modelo_proyecto->devuelve_pasos();

        $data['pasitos'] = $this->Modelo_proyecto->devuelve_pasitos($this->uri->segment(3));

        $data['ts'] = $this->Modelo_proyecto->devuelve_ts();
		
	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('orden','Orden', 'required|min_length[1]|max_length[2]');
		//$this->form_validation->set_rules('fk_paso','Paso', 'required');
		$this->form_validation->set_rules('nuevo_paso','Paso', 'required|min_length[3]|max_length[50]' );
		//no hago validavión por que ameritaría crear un script de clickOn para saber que campos serán obligatorios, asi que solo use el campo de nuevo paso como referencia
	if($this->form_validation->run()==FALSE){
	$data['id_ts'] = $this->uri->segment(3);
	$data['ts'] = $this->Modelo_proyecto->datos_ts($data['id_ts']);


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_ficha_2_1',$data);
		$this->load->view('templates/panel/footer');

		}else{ 
					
					$data_nuevo = array(
						'descripcion_paso' => $this->input->post('nuevo_paso')
					);
					$id_paso = $this->Modelo_proyecto->inserta_nuevo_paso($data_nuevo);

					$data_final = array(
						'fk_ts'	=> $this->input->post('id_ts'),
						'fk_paso' => ($id_paso),
						'orden' => $this->input->post('orden')
					);
					$this->Modelo_proyecto->inserta_pasos_ts($data_final);
				
				
			header('Location:'.base_url('index.php/proyecto/alta_fichat_2_1/').$this->input->post('id_ts').'');

		}
	}else{
		header('Location:'.base_url('index.php/proyecto/alta_fichat_2_1').'');
	}
}

/*public function nuevo_paso(){

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['medios'] = $this->Modelo_proyecto->devuelve_medios();

	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('nuevo_paso','Paso', 'required|min_length[3]|max_length[50]|trim|is_unique[pasos.descripcion_paso],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
	
	

	if($this->form_validation->run()==FALSE){
		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_ficha_2_1',$data);
		$this->load->view('templates/panel/footer');

	}else{
		if($this->input->post()){
			

			header('Location:'.base_url('index.php/proyecto/clasificaciones').'');
		}
	}
}*/

public function elimina_ts_paso(){

		$data = array(
			'fk_ts' => $this->uri->segment(3),
		'id_ts_pasos' => $this->uri->segment(4)
		
		);
	$this->Modelo_proyecto->elimina_ts_pasos($data);

	header('Location:'.base_url('index.php/proyecto/alta_fichat_2_1/').$this->uri->segment(3).'');
}


public function alta_fichat_3_1(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();
	//$data['orden'] = $this->Modelo_proyecto->devuelve_orden();
	$data['requisitos'] = $this->Modelo_proyecto->devuelve_requisitos();
	$data['req'] = $this->Modelo_proyecto->devuelve_ts_req($this->uri->segment(3));
	$data['tramites'] = $this->Modelo_proyecto->devuelve_tramites();
    $data['ts'] = $this->Modelo_proyecto->devuelve_ts();
	
	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Alerta </strong>','</div>');
	$this->form_validation->set_rules('id_ts','id_ts', 'required');
	$this->form_validation->set_rules('orden','Orden', 'required');



		//no hago validavión por que ameritaría crear un script de clickOn para saber que campos serán obligatorios, asi que solo use el campo de nuevo paso como referencia
	if($this->form_validation->run()==fALSE){
		$data['id_ts'] = $this->uri->segment(3);
		$data['ts'] = $this->Modelo_proyecto->datos_ts($data['id_ts']);

		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_ficha_3_1',$data);
		$this->load->view('templates/panel/footer');
		}else{
			if($this->input->post()){
				//die("Angie está equivocada");
				$id_ts=$this->input->post('id_ts');
				
				$data_cantidad = array(
						'copias' => $this->input->post('copias'),
						'original' => $this->input->post('original')
					);
					$id_cantidad = $this->Modelo_proyecto->inserta_cantidad($data_cantidad);

					if(!empty($this->input->post('nuevo_requisito'))){
						$data_req = array(
						'descripcion_req' => $this->input->post('nuevo_requisito'),
						'fk_ts'=> $this->input->post('id_tramite')
					);
					$id_requi = $this->Modelo_proyecto->inserta_nuevo_requi($data_req);
					
					$data_final = array(
						'fk_ts'	=> ($id_ts),
						'fk_requisito' => ($id_requi),
						'orden' => $this->input->post('orden'),
						//'fk_archivo' => ,
						'fk_cantidad' => ($id_cantidad)
					);

					$id_req=$this->Modelo_proyecto->inserta_req_ts($data_final);

						  if(!empty($this->input->post('institucion'))){
							$data_req_ext= array(
							'institucion' => $this->input->post('institucion'),
							'direccion' => $this->input->post('direccion'),
							'fk_requisito' => ($id_requi)
							);
							$this->Modelo_proyecto->inserta_req_ext($data_req_ext);
						  }

					}else{
						$data = array(
						'fk_ts'	=> ($id_ts),
						'fk_requisito' => ($this->input->post('fk_req')),
						'orden' => $this->input->post('orden'),
						//'fk_archivo' => ,
						'fk_cantidad' => ($id_cantidad)
						);

						$id_req=$this->Modelo_proyecto->inserta_req_ts($data);

						  if(!empty($this->input->post('institucion'))){
							$data_req_ext= array(
							'institucion' => $this->input->post('institucion'),
							'direccion' => $this->input->post('direccion'),
							'fk_requisito' => ($this->input->post('fk_req'))
							);
							$this->Modelo_proyecto->inserta_req_ext($data_req_ext);
						  }

						  
					}
	

					header('Location:'.base_url('index.php/proyecto/alta_fichat_3_1').'/'.$id_ts.'');
				}
		}
	}else{
	header('Location:'.base_url('index.php/proyecto/alta_fichat_3_1').'');
	}
}

private function save_file(){
		$mi_archivo = 'upload';
        $config['upload_path'] = "assets/files/";
        $config['file_name'] = "requisitos";
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();

	}

public function elimina_ts_requisito(){
	$data = array(
			'fk_ts' => $this->uri->segment(3),
		'id_req_ts' => $this->uri->segment(4)
		
		);
	$this->Modelo_proyecto->elimina_ts_requisito($data);

	header('Location:'.base_url('index.php/proyecto/alta_fichat_3_1/').$this->uri->segment(3).'');
}


public function alta_fichat_4(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

		 //formato con segundos  
		$ts=($this->uri->segment(3));
        $data['disposicion'] = $this->Modelo_proyecto->devuelve_leyes();

        $data['fundamentos'] = $this->Modelo_proyecto->devuelve_fundamentos($ts);
      

        $data['ts'] = $this->Modelo_proyecto->devuelve_ts();
		
	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('id_ts','Trámite y servicio', 'required');
		$this->form_validation->set_rules('enunciado','Fundamento', 'required');
		$this->form_validation->set_rules('fk_ley','Disposición', 'required');
		
		//no hago validavión por que ameritaría crear un script de clickOn para saber que campos serán obligatorios, asi que solo use el campo de nuevo paso como referencia
	if($this->form_validation->run()==FALSE){
	$data['id_ts'] = $this->uri->segment(3);
	$data['ts'] = $this->Modelo_proyecto->datos_ts($data['id_ts']);


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_ficha_4',$data);
		$this->load->view('templates/panel/footer');

		}else{

			$data_fj = array(
						'fk_ley' => $this->input->post('fk_ley'),
						'enunciado' => $this->input->post('enunciado'),
						'fk_ts' =>($ts)
					);

			$this->Modelo_proyecto->inserta_fundamento($data_fj);
				
			header('Location:'.base_url('index.php/proyecto/alta_fichat_4/').$this->input->post('id_ts').'');
		}
		
	}else{

		header('Location:'.base_url('index.php/proyecto/alta_fichat_4').'');
	}
}

public function alta_fichat_5(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$ts=($this->uri->segment(3));
        $data['ts'] = $this->Modelo_proyecto->devuelve_ts();
		
	$this->load->library('form_validation');
	$this->load->helper(array('form', 'url'));

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Alerta </strong>','</div>');

		$this->form_validation->set_rules('id_ts','Trámite y servicio', 'required');
		//no hago validavión por que ameritaría crear un script de clickOn para saber que campos serán obligatorios, asi que solo use el campo de nuevo paso como referencia
	if($this->form_validation->run()==FALSE){
	$data['id_ts'] = $this->uri->segment(3);
	$data['ts'] = $this->Modelo_proyecto->datos_ts($data['id_ts']);


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/alta_ficha_5',$data);
		$this->load->view('templates/panel/footer');

		}else{
			$v="NO";
			$ver='1';
		
				$data_ficha = array(
						'fk_ts' => $this->input->post('id_ts'),
						'validacion' => ($v),
						'consideraciones' => $this->input->post('info_rele_ts'),
						'info_relevante' => $this->input->post('info_rele'),
						'fecha_elab' => $this->input->post('fecha_actual'),
						'fk_us' => $this->input->post('id_us'),
						'tiempo_res' => $this->input->post('tiempo_res'),
				);
			$id_ficha=$this->Modelo_proyecto->inserta_ficha_tec($data_ficha);
				
				

				$data_version =array(
					'version'=> ($ver),
					'fk_ficha'=> ($id_ficha)
				);
				$this->Modelo_proyecto->inserta_version($data_version);



			header('Location:'.base_url('index.php/proyecto/mis_fichas/').'');
		}
		
	}else{

		header('Location:'.base_url('index.php/proyecto/alta_fichat_4').'');
	}
}
public function fichas(){
	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

	$data['fichas_tecnicas'] = $this->Modelo_proyecto->devuelve_fichas_ts();
    //die(var_dump($data['fichas_tecnicas']));

	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/fichas_tecnicas');
	$this->load->view('templates/panel/footer');
}

public function revision_ficha(){
		$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	if(!empty($this->uri->segment(3))){

		$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
		$data['menu'] = $this->Modelo_proyecto->datos_menu();


		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta </strong>','</div>');

	$this->form_validation->set_rules('validacion','Validación', 'required');
	
	//$this->form_validation->set_rules('dependencia','Dependencia','trim|required|xss_clean');
	//$this->form_validation->set_rules('horario','Horario','trim|required|xss_clean')

		if ($this->form_validation->run() == FALSE){

		$data['ts'] = $this->Modelo_proyecto->devuelve_ts();
		$data['clas_ts'] = $this->Modelo_proyecto->fts_clasificacion($this->uri->segment(4));
		$data['version_ft'] = $this->Modelo_proyecto->version_ft($this->uri->segment(3));
		$data['ambito'] = $this->Modelo_proyecto->ts_ambito($this->uri->segment(4));
		$data['quien'] = $this->Modelo_proyecto->ts_quien($this->uri->segment(4));
		$data['modalidad'] = $this->Modelo_proyecto->ts_modalidad($this->uri->segment(4));
		
		$data['pasos'] = $this->Modelo_proyecto->devuelve_pasitos($this->uri->segment(4));
        $data['pasitos'] = $this->Modelo_proyecto->devuelve_pasitos($this->uri->segment(3));
       
        $data['requisitos'] = $this->Modelo_proyecto->devuelve_requisitos();
		$data['req'] = $this->Modelo_proyecto->devuelve_ts_req($this->uri->segment(4));
		$data['tramites'] = $this->Modelo_proyecto->devuelve_tramites();
		
		$data['ficha_tec'] = $this->Modelo_proyecto->datos_fichatec($this->uri->segment(3));
        $dato_depen =$this->Modelo_proyecto->datos_fichatec($this->uri->segment(3));
        $id_area= $dato_depen['id_area'];
		$data['horario'] = $this->Modelo_proyecto->horario_area($id_area);
        $data['disposicion'] = $this->Modelo_proyecto->devuelve_leyes();
        $data['fundamentos'] = $this->Modelo_proyecto->devuelve_fundamentos($this->uri->segment(4));

		


		$this->load->view('templates/panel/header',$data);
		$this->load->view('templates/panel/menu',$data);
		$this->load->view('templates/panel/revisionn_ficha',$data);
		$this->load->view('templates/panel/footer');
		//die(var_dump($data['horario']));
		
		}else{ 
			if ($this->input->post()) {
			$data= array(

					'validacion' => $this->input->post('validacion'),
			);

			//die(var_dump(expression));
			$this->Modelo_proyecto->actualiza_validacion($this->input->post('id_ficha'),$data);
			header('Location:'.base_url('index.php/proyecto/fichas').'');
		}
		
		}
	}else{
			header('Location:'.base_url('index.php/proyecto/fichas').'');
	}

}

public function mis_fichas(){

	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();
	$datos_usuario=($this->Modelo_proyecto->datos_sesion());

			$nombre= $datos_usuario['nombre'];
			$id_usuario= $datos_usuario['id_usuario'];
			//die(var_dump($nombre));
   
	$data['fichas_tecnicas'] = $this->Modelo_proyecto->devuelve_fichas_ts_us($id_usuario);
    $data['ts'] = $this->Modelo_proyecto->devuelve_ts();
		$data['clas_ts'] = $this->Modelo_proyecto->fts_clasificacion($this->uri->segment(4));
		$data['version_ft'] = $this->Modelo_proyecto->version_ft($this->uri->segment(3));
		$data['ambito'] = $this->Modelo_proyecto->ts_ambito($this->uri->segment(4));
		$data['quien'] = $this->Modelo_proyecto->ts_quien($this->uri->segment(4));
		$data['modalidad'] = $this->Modelo_proyecto->ts_modalidad($this->uri->segment(4));
		
		$data['pasos'] = $this->Modelo_proyecto->devuelve_pasitos($this->uri->segment(4));
        $data['pasitos'] = $this->Modelo_proyecto->devuelve_pasitos($this->uri->segment(3));
       
        $data['requisitos'] = $this->Modelo_proyecto->devuelve_requisitos();
		$data['req'] = $this->Modelo_proyecto->devuelve_ts_req($this->uri->segment(4));
		$data['tramites'] = $this->Modelo_proyecto->devuelve_tramites();
		
		$data['ficha_tec'] = $this->Modelo_proyecto->datos_fichatec($this->uri->segment(3));
        $dato_depen =$this->Modelo_proyecto->datos_fichatec($this->uri->segment(3));
        $id_area= $dato_depen['id_area'];
		$data['horario'] = $this->Modelo_proyecto->horario_area($id_area);
        $data['disposicion'] = $this->Modelo_proyecto->devuelve_leyes();
        $data['fundamentos'] = $this->Modelo_proyecto->devuelve_fundamentos($this->uri->segment(4));


	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/mis_fichas',$data);
	$this->load->view('templates/panel/footer');

}

public function fichas_tecnicas(){

	$this->Modelo_proyecto->valida_sesion();
	$this->Modelo_proyecto->Estar_aqui();

	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();
	$datos_usuario=($this->Modelo_proyecto->datos_sesion());
			//die(var_dump($nombre));
   $nombre= $datos_usuario['nombre'];
			$id_usuario= $datos_usuario['id_usuario'];
   
	$data['fichas_tecnicas'] = $this->Modelo_proyecto->devuelve_fichas_ts_us($id_usuario);
    $data['ts'] = $this->Modelo_proyecto->devuelve_ts();
		$data['clas_ts'] = $this->Modelo_proyecto->fts_clasificacion($this->uri->segment(4));
		$data['version_ft'] = $this->Modelo_proyecto->version_ft($this->uri->segment(3));
		$data['ambito'] = $this->Modelo_proyecto->ts_ambito($this->uri->segment(4));
		$data['quien'] = $this->Modelo_proyecto->ts_quien($this->uri->segment(4));
		$data['modalidad'] = $this->Modelo_proyecto->ts_modalidad($this->uri->segment(4));
		
		$data['pasos'] = $this->Modelo_proyecto->devuelve_pasitos($this->uri->segment(4));
        $data['pasitos'] = $this->Modelo_proyecto->devuelve_pasitos($this->uri->segment(3));
       
        $data['requisitos'] = $this->Modelo_proyecto->devuelve_requisitos();
		$data['req'] = $this->Modelo_proyecto->devuelve_ts_req($this->uri->segment(4));
		$data['tramites'] = $this->Modelo_proyecto->devuelve_tramites();
		
		$data['ficha_tec'] = $this->Modelo_proyecto->datos_fichatec($this->uri->segment(3));
        $dato_depen =$this->Modelo_proyecto->datos_fichatec($this->uri->segment(3));
        $id_area= $dato_depen['id_area'];
		$data['horario'] = $this->Modelo_proyecto->horario_area($id_area);
        $data['disposicion'] = $this->Modelo_proyecto->devuelve_leyes();
        $data['fundamentos'] = $this->Modelo_proyecto->devuelve_fundamentos($this->uri->segment(4));


	$this->load->view('templates/panel/header',$data);
	$this->load->view('templates/panel/menu',$data);
	$this->load->view('templates/panel/mi_ficha',$data);
	$this->load->view('templates/panel/footer');

}



}
