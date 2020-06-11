<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

	public function __construct(){
		parent::__construct();
        date_default_timezone_set('America/Mexico_City');
		$this->load->model('Modelo_proyecto');
	}

	public function index(){
		$this->load->library('form_validation');
		$this->load->helper(array('form','url'));

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');

		$this->form_validation->set_rules('usuario','Correo electronico','required|min_length[10]|max_length[50]|valid_email');
		$this->form_validation->set_rules('contrasena','Contraseña','required|min_length[4]|max_length[25]');


		
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
          //'id_centro' => $resultado['id_centro'],
          );

				if($this->Modelo_proyecto->crear_sesion($data_sesion)){
          
          header('Location:'.base_url('index.php/proyecto/panel').'');}
        else
          header('Location:'.base_url('index.php/proyecto/').'');

      }
      else{
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

		$this->form_validation->set_rules('correo','Correo Electrónico','required|min_length[2]|max_length[100]|valid_email|is_unique[usuario.usuario]',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));

		$this->form_validation->set_rules('contrasena','Contraseña', 'required|min_length[4]|max_length[25]|callback_check_password');
		$this->form_validation->set_rules('contrasena_conf','Confirmar contraseña', 'required|min_length[4]|max_length[25]|matches[contrasena]');

		$this->form_validation->set_rules('aviso', 'Aviso de privacidad', 'required');		

		if($this->form_validation->run()==FALSE){
			

			$this->load->view('templates/registro/header');
			$this->load->view('templates/registro/formulario_usuario');
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
				'apellido_p' => $this->input->post('apellido_p'),
				'apellido_m' => $this->input->post('apellido_m'),
				'correo' => $this->input->post('correo'),
				'genero' => $this->input->post('genero'),
				'id_privilegio' => ('1'),
				'activop' => 'Activo',
				'fecha_nacimiento' => $fecha
				);

			$id_persona = $this->Modelo_proyecto->insertar_persona($data_persona);


			$data_usuario = array(
				'usuario' => $this->input->post('correo'),
				'contrasena' => md5($this->input->post('contrasena')),
				'id_persona' => $id_persona,
				'id_privilegio' => ('1'),
				'activo' => '1'
				);


			$this->Modelo_proyecto->insertar_usuario($data_usuario);

			}header('Location:'.base_url('index.php/proyecto/').'');
		}
	
}
	
	function valid_date($str, $params){
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

 function valid_date_part_index($parts, $search){
  for ($i = 0; $i <= count($parts); $i++)
  {
   if ($parts[$i] == $search)
   {
    return $i;
   }
  }
 }

   function check_password($str){
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
    	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    	$data['menu'] = $this->Modelo_proyecto->datos_menu();

    	$this->load->view('templates/panel/header',$data);
    	$this->load->view('templates/panel/menu',$data);
    	$this->load->view('templates/panel/principal');
    	$this->load->view('templates/panel/footer');
    }

    public function salir(){
      $this->Modelo_proyecto->destruye_sesion();
    } 

    public function alta_ninos11(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['centro_a'] = $this->Modelo_proyecto->devuelve_centro();

       // $config['upload_path'] = "./uploadt/"; 
       // $config['allowed_types'] = "jpg|png";
       // $config['max_size'] = "20000";         
       // $config['max_width'] = "1024";               
       // $config['max_height'] = "768"; 

    $this->load->library('form_validation');
    $this->load->helper('form','url');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');
    
    $this->form_validation->set_rules('centro','Centro asistencial','required');
    $this->form_validation->set_rules('fechan','Fecha de ingreso','required');
    $this->form_validation->set_rules('horan','Hora de ingreso','required');
    $this->form_validation->set_rules('nombren','Nombre del usuario','required');
    $this->form_validation->set_rules('apellido_pn','Apellido paterno','required');
    $this->form_validation->set_rules('apellido_mn','Apellido materno','required');
    $this->form_validation->set_rules('generon','Genero','required');
    $this->form_validation->set_rules('fechann','Fecha de nacimiento','required');
    $this->form_validation->set_rules('usuarioni','Usuario','required');
    $this->form_validation->set_rules('lugaron','Lugar de nacimiento','required');
    $this->form_validation->set_rules('municipioon','Municipio de origen','required');
    $this->form_validation->set_rules('carpeta','Número de carpeta', 'required');
    $this->form_validation->set_rules('motivos','Motivos de ingreso','required');
    $this->form_validation->set_rules('observaciones','Observaciones de ingreso','required');
    $this->form_validation->set_rules('persona_trae','Nombre de quién ingresa al niño','required');

    //$fecha_actual = date("Y/m/d/");
    //var_dump($fecha_actual);
    //die();
    
    if($this->form_validation->run()==FALSE){
      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/formulario_ingreso_nino');
      $this->load->view('templates/panel/footer');
    }else{

      $data_ingreso = array(
      'nombres_nino' => $this->input->post('nombren'),
      'apellido_pnino' => $this->input->post('apellido_pn'),
      'apellido_mnino' => $this->input->post('apellido_mn'),
      'fecha_nnino' => $this->input->post('fechann'),
      'genero_nino' => $this->input->post('generon'),
      'hora_ingreso' => $this->input->post('horan'),
      'fecha_ingreso' => $this->input->post('fechan'),
      'lugar_nnino' => $this->input->post('lugaron'),
      'municipio_origen' => $this->input->post('municipioon'),
      'no_carpeta' => $this->input->post('carpeta'),
      'motivos_ingreso' => $this->input->post('motivos'),
      'observaciones_ingreso' => $this->input->post('observaciones'),
      'nombre_per_trae' => $this->input->post('persona_trae')
     );

      $id_ingreso = $this->Modelo_proyecto->insertar_ingreso_nino($data_ingreso);

      $data_expediente = array(
      'id_ingreso' => $id_ingreso,
      'id_incidencia_actual' => '1',
      'id_estadop' => '3',
      'id_centro' => $this->input->post('centro'),
      'id_trabajador' => $this->input->post('usuarioni'),
      );

      $id_expediente=$this->Modelo_proyecto->insertar_expediente($data_expediente);

      $data_expeinci = array(
      'id_incidencia' => '1',
      'id_expediente' => $id_expediente,
      );

      $id_expincidencia=$this->Modelo_proyecto->insertar_expeinci($data_expeinci);

      header('Location:'.base_url('index.php/proyecto/prueba_pertenencias').'/'.$id_ingreso.'');
      }
    }

public function formulario_pertenencias(){
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();
  $data['pert'] = $this->Modelo_proyecto->devuelve_pertenecias($this->uri->segment(3));

		$this->load->library('form_validation');
		$this->load->helper('form','url');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		 <strong>Alerta </strong>','</div>');
    $this->form_validation->set_rules('cantidad','Cantidad','required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('descripcion','Descripción del artículo', 'required|min_length[2]|max_length[25]');

		$this->form_validation->set_rules('aviso', 'Aviso de privacidad', 'required');		
		if($this->form_validation->run()==FALSE){
		  $this->load->view('templates/panel/header',$data);
		  $this->load->view('templates/panel/menu',$data);
		  $this->load->view('templates/panel/formulario_pertenencias');
	    $this->load->view('templates/panel/footer');
		  }else{
			$data_perte = array(
				'cantidad' => $this->input->post('cantidad'),
				'descripcion' => $this->input->post('descripcion')			
				);

		$id_pertenencia=$this->Modelo_proyecto->insertar_pertenencia($data_perte);

		header('Location:'.base_url('index.php/proyecto/panel').'');
		}
	}


	public function formulario_pension(){
	$data['sesion'] = $this->Modelo_proyecto->datos_sesion();
	$data['menu'] = $this->Modelo_proyecto->datos_menu();

		$this->load->library('form_validation');
		$this->load->helper('form','url');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Alerta </strong>','</div>');
     
		$this->form_validation->set_rules('nombres','Nombre','required|min_length[3]|max_length[25]');
		$this->form_validation->set_rules('apellido_pd','Apellido Paterno', 'required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('apellido_md','Apellido Materno', 'required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('generod', 'Género', 'required');
		$this->form_validation->set_rules('parentesco', 'Parentesco', 'required');

		$this->form_validation->set_rules('totaldep','Total depositado', 'required|min_length[2]|max_length[25]');
        $this->form_validation->set_rules('fecha', 'Fecha de retiro', 'required|callback_valid_date[d-m-y,-]');
		

		$this->form_validation->set_rules('aviso', 'Aviso de privacidad', 'required');		

		if($this->form_validation->run()==FALSE){
			

			$this->load->view('templates/panel/header',$data);
		    $this->load->view('templates/panel/menu',$data);
		    $this->load->view('templates/panel/formulario_pension');
		    $this->load->view('templates/panel/footer');

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
				'apellido_pd' => $this->input->post('apellido_p'),
				'apellido_md' => $this->input->post('apellido_m'),
				'parentesco' => $this->input->post('parentesco'),
				'generod' => $this->input->post('generod'),
				'totaldep' => $this->input->post('totaldep'),
				'fecha_nac' => $fecha
				);

			//$this->Modelo_proyecto->insertar_usuario($data_usuario);

			//header('Location:'.base_url('index.php/proyecto/').'');

			}header('Location:'.base_url('index.php/proyecto/').'');
		}
	}

	
public function config_usuario(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $this->load->library('form_validation');
    $this->load->helper('form','url');
    
    $this->form_validation->set_error_delimiters('
    <div class="alert alert-danger alerte-dismissable">
    <a href="#" class="close" data_dismiss="alert" aria_label="alert" aria_label="close"></a> <strong>Alerta</strong>','</div>');

    $this->form_validation->set_rules('usuariou','Correo electrónico','required');
 $this->form_validation->set_rules('contrasenau','Contraseña', 'required|min_length[4]|max_length[25]|callback_check_password');
    
    if($this->form_validation->run()==FALSE){
      
      $data['id_usuario']=$this->uri->segment(3);
      $data['usuario']=$this->Modelo_proyecto->actualizar_usu($data['sesion']['id_usuario']);
$this->load->library('form_validation');

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/config_usuario', $data);
    $this->load->view('templates/panel/footer');
      
    }else{  
      $data_p=array(
          'correo'=>$this->input->post('usuariou')
        );
    $this->Modelo_proyecto->update_persona($this->input->post('id_persona'),$data_p);

      $data_ur=array(
          
         'contrasena' => md5($this->input->post('contrasenau')),
         'usuario'=>$this->input->post('usuariou')
          
        );
    $this->Modelo_proyecto->update_usuario($this->input->post('id_usuario'),$data_ur);

    header('Location:'.base_url('index.php/proyecto').'');
              
    } 
  }
  public function formacion_equipos(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['inte1'] = $this->Modelo_proyecto->devuelve_ab();
      $data['inte2'] = $this->Modelo_proyecto->devuelve_ts();
      $data['inte3'] = $this->Modelo_proyecto->devuelve_ps();

      $this->load->library('form_validation');
    $this->load->helper('form','url');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');

    
    $this->form_validation->set_rules('no_equipo','Nombre equipo','required|min_length[7]|max_length[15]|is_unique[equipos.no_equipo]',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
    $this->form_validation->set_rules('per1','Integrante1','required');
    $this->form_validation->set_rules('per2','Integrante2','required');
    $this->form_validation->set_rules('per3','Integrante3','required');
    
   
    //$this->form_validation->set_rules('carpeta','No. carpeta','required|min_length[2]|max_length[100]|is_unique[ingreso_nino.no_carpeta]',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));

    if($this->form_validation->run()==FALSE){
      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/formacion_equipos');
      $this->load->view('templates/panel/footer');
    }else{

      $data_ingreso = array(
      'no_equipo' => $this->input->post('no_equipo'),
      'integrante1' => $this->input->post('per1'),
      'integrante2' => $this->input->post('per2'),
      'integrante3' => $this->input->post('per3')
     );

      $id_equipo= $this->Modelo_proyecto->insertar_equipo($data_ingreso);

      header('Location:'.base_url('index.php/proyecto/vista_equipos').'');
      }
    }


 public function vista_ninos(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['ninosdif'] = $this->Modelo_proyecto->devuelve_ninos_vista($buscar, $this->session->id_ingreso);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/ninos_vista',$data);
      $this->load->view('templates/panel/footer');
  }

  public function vista_ninos_ts(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['ninosdif'] = $this->Modelo_proyecto->devuelve_ninos_vista($buscar, $this->session->id_ingreso);
      //$data['edad'] = $this->Modelo_proyecto->devuelve_fechanino();

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/vista_ninos_ts',$data);
      $this->load->view('templates/panel/footer');
  }


public function alta_familiar(){
  $this->Modelo_proyecto->valida_sesion();

$segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper('form','url');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');
 
    $this->form_validation->set_rules('nombre_f','Nombre del usuario','required');
    $this->form_validation->set_rules('apellido_pf','Apellido paterno','required');
    $this->form_validation->set_rules('apellido_mf','Apellido materno','required');
   $this->form_validation->set_rules('genero_f','Genero','required');
    $this->form_validation->set_rules('fecha_naf','Fecha de nacimiento','required');
    $this->form_validation->set_rules('relacion','Relación','required');
   $this->form_validation->set_rules('ingreso','Ingreso','required');

    if ($this->form_validation->run() == FALSE){
    $data['id_ingreso'] = $this->uri->segment(3);
    $data['ingreso'] = $this->Modelo_proyecto->ver_ingresos($data['id_ingreso']);

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_familiar',$data);
    $this->load->view('templates/panel/footer');
    
    }else{
      if($this->input->post()){
    
      $data = array(
        'nombre_f'=> $this->input->post('nombre_f'),
        'apellido_pf'=> $this->input->post('apellido_pf'),
        'apellido_mf'=> $this->input->post('apellido_mf'),
        'genero_f'=> $this->input->post('genero_f'),
        'fecha_naf'=> $this->input->post('fecha_naf'),
        'relacion'=> $this->input->post('relacion'),
        'id_ingreso'=>$this->input->post('ingreso'),
        );

      $id_familiar = $this->Modelo_proyecto->insertar_familiar($data);

        header('Location:'.base_url('index.php/proyecto/vista_familiares').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/vista_familiares').'');
  }
}

public function alta_familiar2(){
  $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
  $data['menu'] = $this->Modelo_proyecto->datos_menu();
  
  $this->load->library('form_validation');
    $this->load->helper('form','url');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');

    
    $this->form_validation->set_rules('nombre_f','Nombre del usuario','required');
    $this->form_validation->set_rules('apellido_pf','Apellido paterno','required');
    $this->form_validation->set_rules('apellido_mf','Apellido materno','required');
   $this->form_validation->set_rules('genero_f','Genero','required');
    $this->form_validation->set_rules('fecha_naf','Fecha de nacimiento','required');
    $this->form_validation->set_rules('relacion','Relación','required');
  
      
    if($this->form_validation->run()==FALSE){
            $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/formulario_familiar2',$data);
        $this->load->view('templates/panel/footer');
       }else{
           
        $data_fam = array(
        'nombre_f'=> $this->input->post('nombre_f'),
        'apellido_pf'=> $this->input->post('apellido_pf'),
        'apellido_mf'=> $this->input->post('apellido_mf'),
        'genero_f'=> $this->input->post('genero_f'),
        'fecha_naf'=> $this->input->post('fecha_naf'),
        'relacion'=> $this->input->post('relacion')
        
        );
          $this->Modelo_proyecto->insertar_familiar($data_fam);


        
         header('Location:'.base_url('index.php/proyecto/panel').'');
      }
  
    }


public function vista_equipos(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['equiposdif'] = $this->Modelo_proyecto->devuelve_equipos_vista($buscar, $this->session->id_equipo);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/vista_equipos',$data);
      $this->load->view('templates/panel/footer');
  }

	    public function alta_empleados(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['areas'] = $this->Modelo_proyecto->devuelve_area();
      $data['centro'] = $this->Modelo_proyecto->devuelve_centro();

      $this->load->library('form_validation');
    $this->load->helper('form','url');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');

    $this->form_validation->set_rules('nombrei','Nombre del usuario','required');
    $this->form_validation->set_rules('apellido_pi','Apellido paterno','required');
    $this->form_validation->set_rules('apellido_mi','Apellido materno','required');
    $this->form_validation->set_rules('correoi','Email','required');
    $this->form_validation->set_rules('generoi','Genero','required');
    $this->form_validation->set_rules('fechai','Fecha de nacimiento','required');
    $this->form_validation->set_rules('usuario','Usuario','required');
     $this->form_validation->set_rules('contrasena','Contraseña','required');
      $this->form_validation->set_rules('areas','Area','required');
      $this->form_validation->set_rules('centro','Centro de Asistencia','required');


    if($this->form_validation->run()==FALSE){
    $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/formulario_empleados');
      $this->load->view('templates/panel/footer');
    }else{

      $data_pe = array(
      'nombres' => $this->input->post('nombrei'),
      'apellido_p' => $this->input->post('apellido_pi'),
      'apellido_m' => $this->input->post('apellido_mi'),
      'correo' => $this->input->post('correoi'),
      'genero' => $this->input->post('generoi'),
      'fecha_nacimiento' => $this->input->post('fechai'),
      'id_centro' => $this->input->post('centro'),
      'id_privilegio' => $this->input->post('areas'),
      'activop' => 'Activo'
      );

      $id_persona = $this->Modelo_proyecto->insertar_persona($data_pe);


      $data_usuario = array(
      'usuario' => $this->input->post('correoi'),
      'contrasena' => md5($this->input->post('contrasena')),
      'id_persona' => $id_persona,
      'id_privilegio' => $this->input->post('areas'),
      'activo' => '1'
      );

      $id_usuario=$this->Modelo_proyecto->insertar_usuario($data_usuario);

      $this->index();

      header('Location:'.base_url('index.php/proyecto/vista_empleados').'');

      }
    }

    public function eliminar_pertenencia(){
     $data=array(
    'id_pertenencia'=>$this->uri->segment(3)
    );
    $this->Modelo_proyecto->eliminar_pertenencia($data);
    header('Location:'.base_url('index.php/proyecto/prueba_pertenencias/'));
    }

    public function alta_centro(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();

      $this->load->library('form_validation');
      $this->load->helper('form','url');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');

      $this->form_validation->set_rules('centro','Centro de Asistencia','required');
      $this->form_validation->set_rules('ubicacion','Ubicación del centro asistencial','required');

    if($this->form_validation->run()==FALSE){
      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/formulario_centros_asistenciles');
      $this->load->view('templates/panel/footer');
    }else{

      $data_c = array(
      'nombre_centro' => $this->input->post('centro'),
      'ubicacion' => $this->input->post('ubicacion'),
      );

      $id_centro = $this->Modelo_proyecto->insertar_centro($data_c);

      header('Location:'.base_url('index.php/proyecto/vista_centro').'');

      }
    }

public function vista_empleados(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['estatus'] = $this->Modelo_proyecto->devuelve_estatus();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['residentes'] = $this->Modelo_proyecto->devuelve_empleados_vista($buscar, $this->session->id_usuario);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/empleados_vista',$data);
      $this->load->view('templates/panel/footer');
  }

  public function vista_centro(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      //$data['estatus'] = $this->Modelo_proyecto->devuelve_estatus();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['centros'] = $this->Modelo_proyecto->devuelve_centros_vista($buscar, $this->session->id_centro);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/vista_casa',$data);
      $this->load->view('templates/panel/footer');
  }

  public function vista_expediente_nino(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['estado'] = $this->Modelo_proyecto->devuelve_cambio_estadop();

       $this->load->model('Modelo_proyecto');

         if($_POST){
                $buscar=$this->input->post('busqueda');
          }

         else{
          $buscar='';

          }
      $data['expedientes'] = $this->Modelo_proyecto->devuelve_expedientes_vista($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/vista_expediente_nino',$data);
      $this->load->view('templates/panel/footer');
  }

  public function vista_expediente_nino2(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['estado'] = $this->Modelo_proyecto->devuelve_cambio_estadop();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['expedientes'] = $this->Modelo_proyecto->devuelve_expedientes_vista2($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/vista_expediente_nino2',$data);
      $this->load->view('templates/panel/footer');
  }

  public function expediente_incidencia(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
       $this->load->model('Modelo_proyecto');
         if($_POST){
                $buscar=$this->input->post('busqueda');
          }

         else{
          $buscar='';

          }
      $data['expedientes'] = $this->Modelo_proyecto->devuelve_expedientes_incidencias($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/expediente_incidencias',$data);
      $this->load->view('templates/panel/footer');
  }

public function ingresos_filtrados(){
  $json = array("status" => "500","datos" => null);

  $desde = $this->input->post('fecha_inicial');
  $hasta = $this->input->post('fecha_final');

  $datos = $this->Modelo_proyecto->ingresos($desde, $hasta);

  if(!is_null($datos))
            {
        $json["status"] = "200";
        $json["datos"]  = $datos;
      }
      echo json_encode($json);
}
  public function ingresos(){
    
  $this->Modelo_proyecto->valida_sesion();
  
  $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
  $data['menu'] = $this->Modelo_proyecto->datos_menu();

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/ingresos',$data);
      $this->load->view('templates/panel/footer');
  }

  public function egresos_filtrados(){
  $json = array("status" => "500","datos" => null);

  $desde_e = $this->input->post('fecha_inicial_e');
  $hasta_e = $this->input->post('fecha_final_e');
  
  $datos = $this->Modelo_proyecto->egresos($desde_e, $hasta_e);
  if(!is_null($datos))
            {
        $json["status"] = "200";
        $json["datos"]  = $datos;
      }
      echo json_encode($json);
}
  public function egresos(){
    
  $this->Modelo_proyecto->valida_sesion();
  
  $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
  $data['menu'] = $this->Modelo_proyecto->datos_menu();

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/egresos',$data);
      $this->load->view('templates/panel/footer');
  }

  public function fugas_filtrados(){
  $json = array("status" => "500","datos" => null);

  $desde_f = $this->input->post('fecha_inicial_f');
  $hasta_f = $this->input->post('fecha_final_f');
  
  $datos = $this->Modelo_proyecto->fugas($desde_f, $hasta_f);
  if(!is_null($datos))
            {
        $json["status"] = "200";
        $json["datos"]  = $datos;
      }
      echo json_encode($json);
  }

  public function fugas(){
    
  $this->Modelo_proyecto->valida_sesion();
  
  $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
  $data['menu'] = $this->Modelo_proyecto->datos_menu();

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/fugas',$data);
      $this->load->view('templates/panel/footer');
  }

  public function expediente_nutriologia(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['expedientes_nutriologia'] = $this->Modelo_proyecto->devuelve_expedientes_usuarios($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/expediente_nutriologia',$data);
      $this->load->view('templates/panel/footer');
  }

  public function expediente_pedagogia(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['expedientes_pedagoga'] = $this->Modelo_proyecto->devuelve_expedientes_usuarios($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/expediente_pedagogia',$data);
      $this->load->view('templates/panel/footer');
  }

  public function expediente_medico(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['expedientes_medico'] = $this->Modelo_proyecto->devuelve_expedientes_usuarios($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/expediente_medico',$data);
      $this->load->view('templates/panel/footer');
  }

  public function vista_familiares(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      //$data['estatus'] = $this->Modelo_proyecto->devuelve_estatus();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['fam'] = $this->Modelo_proyecto->devuelve_familiares($buscar, $this->session->id_familiar);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/vista_familiares',$data);
      $this->load->view('templates/panel/footer');
  }

  public function expediente_psicologia(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $this->load->model('Modelo_proyecto');
         if($_POST){
                $buscar=$this->input->post('busqueda');
          }
         else{
          $buscar='';
          }
      $data['expedientes_pscologia'] = $this->Modelo_proyecto->devuelve_expedientes_usuarios_exclusivos_psicologia($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/expediente_psicologia',$data);
      $this->load->view('templates/panel/footer');
  }

  public function expediente_abogado(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['expedientes_abogado'] = $this->Modelo_proyecto->devuelve_expedientes_usuarios_exclusivos_abogado($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/expedientes_abogado',$data);
      $this->load->view('templates/panel/footer');
  }

  public function expediente_trabajo_social(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['expedientes_trabajo_social'] = $this->Modelo_proyecto->devuelve_expedientes_usuarios_exclusivos_trabajos($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/expedientes_trabajo_social',$data);
      $this->load->view('templates/panel/footer');
  }

  public function vista_pensiones(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      //$data['estatus'] = $this->Modelo_proyecto->devuelve_estatus();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['pensiones'] = $this->Modelo_proyecto->devuelve_pensiones($buscar, $this->session->id_pension);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/vista_pensiones',$data);
      $this->load->view('templates/panel/footer');
  }

  public function revisar_expedientes(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();

     $data['expediente'] = $this->Modelo_proyecto->ver_expedientes2($this->uri->segment(3));
     //$data['id_expediente'] = $this->Modelo_proyecto->hermanos('no_carpeta');
     $data['pertenencias'] = $this->Modelo_proyecto->ver_pertenencias($this->uri->segment(4));
     $data['familiar'] = $this->Modelo_proyecto->ver_familiar($this->uri->segment(4));
     $data['pensiones'] = $this->Modelo_proyecto->ver_pension($this->uri->segment(3));
     $data['personas_atiende'] = $this->Modelo_proyecto->ver_trabajador_atiende($this->uri->segment(3));
     $data['valoracion_peda'] = $this->Modelo_proyecto->ver_valoracion_pedagogica($this->uri->segment(3));
     $data['valoracion_nutri'] = $this->Modelo_proyecto->ver_valoracion_nutricional($this->uri->segment(3));
     $data['valoracion_psico'] = $this->Modelo_proyecto->ver_valoracion_psicologica($this->uri->segment(3));
     $data['valoracion_pmenor'] = $this->Modelo_proyecto->ver_valoracion_pmenor($this->uri->segment(3));
     $data['notas'] = $this->Modelo_proyecto->notas($this->uri->segment(3));
     $data['visita'] = $this->Modelo_proyecto->visita_dom($this->uri->segment(3));
     $data['valoracion_medi'] = $this->Modelo_proyecto->ver_valoracion_medica($this->uri->segment(3));

     $carpeta = $this->Modelo_proyecto->devuelve_carpeta($this->uri->segment(4));
     $id_expediente = $this->Modelo_proyecto->devuelve_id_exp($this->uri->segment(3));
     $this->Modelo_proyecto->devuelve_ninos_hermanos($carpeta, $this->uri->segment(3));
     $data['hermanos'] = $this->Modelo_proyecto->devuelve_ninos_hermanos($carpeta, $id_expediente);
     $data['estudio_s'] = $this->Modelo_proyecto->ver_valoracion_trab_soc($this->uri->segment(3));

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/expediente',$data);
      $this->load->view('templates/panel/footer');
    }

    public function formulario_ingreso_nino(){ 
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
  
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/formulario_ingreso_nino');
        $this->load->view('templates/panel/footer');
    }

 public function do_upload(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['centro_a'] = $this->Modelo_proyecto->devuelve_centro();

      $this->load->library('form_validation');
      $this->load->helper('form','url');

       $this->load->library('form_validation');
    $this->load->helper('form','url');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');
    
    $this->form_validation->set_rules('centro','Centro asistencial','required');
    $this->form_validation->set_rules('fechan','Fecha de ingreso','required');
    $this->form_validation->set_rules('horan','Hora de ingreso','required');
    $this->form_validation->set_rules('nombren','Nombre del usuario','required');
    $this->form_validation->set_rules('apellido_pn','Apellido paterno','required');
    $this->form_validation->set_rules('apellido_mn','Apellido materno','required');
    $this->form_validation->set_rules('generon','Genero','required');
    $this->form_validation->set_rules('fechann','Fecha de nacimiento','required');
    $this->form_validation->set_rules('usuarioni','Usuario','required');
    $this->form_validation->set_rules('lugaron','Lugar de nacimiento','required');
    $this->form_validation->set_rules('municipioon','Municipio de origen','required');
    $this->form_validation->set_rules('carpeta','Número de carpeta', 'required');
    $this->form_validation->set_rules('motivos','Motivos de ingreso','required');
    $this->form_validation->set_rules('observaciones','Observaciones de ingreso','required');
    $this->form_validation->set_rules('persona_trae','Nombre de quién ingresa al niño','required');

        $config['upload_path'] = "./uploadt/"; 
        $config['allowed_types'] = "gif|jpg|png|pdf";
        $config['max_size'] = "20000";         
        $config['max_width'] = "1024";               
        $config['max_height'] = "768";    
    
    $this->load->library('upload', $config);    
         $this->upload->initialize($config);         
    if ( ! $this->upload->do_upload())
    {
      $error = array('error' => $this->upload->display_errors()); 
      $this->load->view('templates/panel/formulario_archivo', $error);     
      header('Location:'.base_url('index.php/proyecto/formulario_ingreso_nino/').'');  
    }
    else
    {
      $file_info = $this->upload->data();  
      $data = array('upload_data' => $this->upload->data());   
      $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/formulario_exito', $data);  
        $this->load->view('templates/panel/footer');
    
      $data_ingreso = array(
      'foto_nino' => $file_info['file_name'],
      'extension' => $file_info['full_path'],
      'nombres_nino' => $this->input->post('nombren'),
      'apellido_pnino' => $this->input->post('apellido_pn'),
      'apellido_mnino' => $this->input->post('apellido_mn'),
      'fecha_nnino' => $this->input->post('fechann'),
      'genero_nino' => $this->input->post('generon'),
      'hora_ingreso' => $this->input->post('horan'),
      'fecha_ingreso' => $this->input->post('fechan'),
      'lugar_nnino' => $this->input->post('lugaron'),
      'municipio_origen' => $this->input->post('municipioon'),
      'no_carpeta' => $this->input->post('carpeta'),
      'motivos_ingreso' => $this->input->post('motivos'),
      'observaciones_ingreso' => $this->input->post('observaciones'),
      'nombre_per_trae' => $this->input->post('persona_trae'),
     );

      $id_ingreso = $this->Modelo_proyecto->insertar_ingreso_nino($data_ingreso);

      $data_expediente = array(
      'id_ingreso' => $id_ingreso,
      'id_centro' => $this->input->post('centro'),
      'id_trabajador' => $this->input->post('usuarioni'),
      );

      $id_expediente=$this->Modelo_proyecto->insertar_expediente($data_expediente);

      $data_expeinci = array(
      'id_incidencia' => '1',
      'id_expediente' => $id_expediente,
      );

      $id_expincidencia=$this->Modelo_proyecto->insertar_expeinci($data_expeinci);

header('Location:'.base_url('index.php/proyecto/prueba_pertenencias').'/'.$id_ingreso.'');
      }
    }

  public function cambio_estatust(){ 
   $this->Modelo_proyecto->valida_sesion();

  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
  
  $this->load->library('form_validation');
  $this->load->helper('form','url');
  $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alerta </strong>','</div>');

  $this->form_validation->set_rules('estatus','Estatus','required');

     if ($this->form_validation->run()==FALSE){

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      //$this->load->view('templates/panel/vista_empleados',$data);
      $this->load->view('templates/panel/footer');
        }else{
          
         $data = array(
          'activop' => $this->input->post('estatus')
         );
         $this->Modelo_proyecto->actualiza_estatus($this->input->post('id_persona'),$data);
         header('Location:'.base_url('index.php/proyecto/vista_empleados').'');

}
}else{
  header('Location:'.base_url('index.php/proyecto/vista_empleados').'');
}
}

public function actualiza(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();


  $data=array(
    'id_persona' => $this->uri->segment(3));
    $this->Modelo_proyecto->actualiza_estatus($this->input->post('id_persona'),$data);

  header('Location:'.base_url('index.php/proyecto/vista_empleados').'');
}

public function edita_expediente(){
  $this->Modelo_proyecto->valida_sesion();

  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();
    $data['inte1'] = $this->Modelo_proyecto->devuelve_ab();
    $data['inte2'] = $this->Modelo_proyecto->devuelve_ts();
    $data['inte3'] = $this->Modelo_proyecto->devuelve_ps();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('id_persona1','Abogado');
    $this->form_validation->set_rules('id_persona2','Trabajo Social');
    $this->form_validation->set_rules('id_persona3','Psicologs');
    $this->form_validation->set_rules('expediente','No. Expediente','required');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_edita_expediente');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

      $data1 = array(
          'no_expediente' => $this->input->post('expediente'),
      );

     $this->Modelo_proyecto->actualiza_expediente($this->input->post('id_expediente'),$data1);
  
      $datae1 = array(
          'id_persona' => $this->input->post('id_persona1'),
          'fk_expediente' => $this->input->post('id_expediente'),
      );

      $id_equipo = $this->Modelo_proyecto->insertar_equipo($datae1);

      $datae2 = array(
          'id_persona' => $this->input->post('id_persona2'),
          'fk_expediente' => $this->input->post('id_expediente'),
          'id_equipo' => $id_equipo
      );

      $id_equipo = $this->Modelo_proyecto->insertar_equipo($datae2);

      $datae3 = array(
          'id_persona' => $this->input->post('id_persona3'),
          'fk_expediente' => $this->input->post('id_expediente'),
          'id_equipo' => $id_equipo
      );

      $id_equipo = $this->Modelo_proyecto->insertar_equipo($datae3);

        header('Location:'.base_url('index.php/proyecto/vista_expediente_nino').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/edita_expediente').'');
  }
}

public function edita_expediente1(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();
    $data['inte1'] = $this->Modelo_proyecto->devuelve_ab();
    $data['inte2'] = $this->Modelo_proyecto->devuelve_ts();
    $data['inte3'] = $this->Modelo_proyecto->devuelve_ps();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('id_persona1','Abogado');
    $this->form_validation->set_rules('id_persona2','Trabajo Social');
    $this->form_validation->set_rules('id_persona3','Psicologs');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_edita_expediente1');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){
  
      $datae1 = array(
          'id_persona' => $this->input->post('id_persona1'),
      );

      $this->Modelo_proyecto->actualiza_expequ($this->input->post('id_persona'),$datae1);

      $datae2 = array(
          'id_persona' => $this->input->post('id_persona2'),
      );

      $this->Modelo_proyecto->actualiza_expequ($this->input->post('id_persona'),$datae2);

      $datae3 = array(
          'id_persona' => $this->input->post('id_persona3'),
      );

      $this->Modelo_proyecto->actualiza_expequ($this->input->post('id_persona'),$datae3);

        header('Location:'.base_url('index.php/proyecto/vista_expediente_nino').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/edita_expediente1').'');
  }
}

public function prueba_pertenencias(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
  $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
  $data['menu'] = $this->Modelo_proyecto->datos_menu();
  $data['pert'] = $this->Modelo_proyecto->ver_pertenecias2($this->uri->segment(3));
    
  $this->load->library('form_validation');
  $this->load->helper(array('form', 'url'));

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('cantidad','Cantidad','required');
    $this->form_validation->set_rules('descripcion','Descripción del artículo', 'required');

  if($this->form_validation->run()==FALSE){

  $data['id_ingreso'] = $this->uri->segment(3);
  $data['ingreso'] = $this->Modelo_proyecto->datos_ingreso($this->uri->segment(3));

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_pertenencias',$data);
    $this->load->view('templates/panel/footer');

    }else{ 
      if($this->input->post()){
      $data = array(
      'cantidad' => $this->input->post('cantidad'),
      'descripcion' => $this->input->post('descripcion'),
      'id_ingreso' => $this->input->post('id_ingreso'),
      );

      $id_pertenencia=$this->Modelo_proyecto->insertar_pertenencia($data);
    
      header('Location:'.base_url('index.php/proyecto/prueba_pertenencias/').$this->input->post('id_ingreso').'');
    }
  }
  }else{
    header('Location:'.base_url('index.php/proyecto/prueba_pertenencias').'');
  }
}

public function edita_familiar(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('nombre_f','Nombre del usuario','required');
    $this->form_validation->set_rules('apellido_pf','Apellido paterno','required');
    $this->form_validation->set_rules('apellido_mf','Apellido materno','required');
    $this->form_validation->set_rules('genero_f','Genero','required');
    $this->form_validation->set_rules('fecha_naf','Fecha de nacimiento','required');
    $this->form_validation->set_rules('relacion','Relación','required');
    $this->form_validation->set_rules('ingreso','Ingreso','required');

    if ($this->form_validation->run() == FALSE){
    $data['ingreso'] = $this->Modelo_proyecto->ver_ingresos($this->uri->segment(3));
    
    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_edita_familiar');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data = array(
        'nombre_f'=> $this->input->post('nombre_f'),
        'apellido_pf'=> $this->input->post('apellido_pf'),
        'apellido_mf'=> $this->input->post('apellido_mf'),
        'genero_f'=> $this->input->post('genero_f'),
        'fecha_naf'=> $this->input->post('fecha_naf'),
        'relacion'=> $this->input->post('relacion'),
        'id_ingreso'=>$this->input->post('ingreso'),
        );

      $id_familiar = $this->Modelo_proyecto->insertar_familiar($data);

        header('Location:'.base_url('index.php/proyecto/vista_familiares').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/formulario_edita_familiar').'');
  }
}

public function edita_pension(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('cuaderno','Cuaderno','required');
    $this->form_validation->set_rules('familiar','Nombre del familiar','required');
    $this->form_validation->set_rules('monto','Monto','required');
    $this->form_validation->set_rules('expediente','Nombre del niño','required');
    $this->form_validation->set_rules('fechad','Fecha del deposito','required');

    //$monto = $this->input->post('monto'); 

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));
    $data['familiar'] = $this->Modelo_proyecto->ver_familiar($this->uri->segment(4));

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_edita_pension');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data = array(
        'cuaderno'=> $this->input->post('cuaderno'),
        'id_familiar'=> $this->input->post('familiar'),
        'id_expediente'=> $this->input->post('expediente'),
        'fecha_pension'=> $this->input->post('fechad'),
        'monto'=> $this->input->post('monto'),
        );

      $id_pension = $this->Modelo_proyecto->insertar_pension($data);

        header('Location:'.base_url('index.php/proyecto/vista_pensiones').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/formulario_edita_pension').'');
  }
}

public function retiro_monto(){
  $this->Modelo_proyecto->valida_sesion();

$segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();
   
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('monto','Monto','required');

    if ($this->form_validation->run() == FALSE){
    $data['id_pension'] = $this->uri->segment(3);
    $data['pension'] = $this->Modelo_proyecto->ver_monto($data['id_pension']);
     
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/retiro_monto',$data);
        $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

      $data_m = array(
       'retiro' => $this->input->post('monto'),
      );

      $this->Modelo_proyecto->actualiza_monto($this->input->post('id_pension'),$data_m);
      
        header('Location:'.base_url('index.php/proyecto/vista_pensiones').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/retiro_monto').'');
  }
}

public function valoracion_pedagogica(){
  $this->Modelo_proyecto->valida_sesion();

  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();
    $data['nivel'] = $this->Modelo_proyecto->datos_niveles();
    $data['estudios'] = $this->Modelo_proyecto->datos_educacion();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('rango','Rango de edad','required');
    $this->form_validation->set_rules('estudios','Estudios','required');
    $this->form_validation->set_rules('lectura','Conocimientos en lectura','required');
    $this->form_validation->set_rules('transcripcion','Conocimientos en transcripcion','required');
    $this->form_validation->set_rules('matematico','Conocimientos en matematicas','required');
    $this->form_validation->set_rules('espanol','Conocimientos en español','required');
    $this->form_validation->set_rules('ortografico','Conocimientos en escritura y ortografia','required');
    $this->form_validation->set_rules('canalizacion','Canalización educativa','required');
    $this->form_validation->set_rules('observaciones1','Observaciones','required');
    $this->form_validation->set_rules('observaciones2','Observaciones','required');
    $this->form_validation->set_rules('observaciones3','Observaciones','required');
    $this->form_validation->set_rules('observaciones4','Observaciones','required');
    $this->form_validation->set_rules('observaciones5','Observaciones','required');
    $this->form_validation->set_rules('expediente','Expediente','required');
    $this->form_validation->set_rules('observaciones6','Observaciones','required');
    $this->form_validation->set_rules('comp_lectura','Comprensión lectora','required');
    $this->form_validation->set_rules('fecha_actual','Fecha actual','required');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));    

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_valoracion_pedagogica');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data = array(
        'rango_edad'=> $this->input->post('rango'),
        'nivel_estudios'=> $this->input->post('estudios'),
        'con_lectura'=> $this->input->post('lectura'),
        'con_comp_lectora'=> $this->input->post('comp_lectura'),
        'con_transcripcion'=> $this->input->post('transcripcion'),
        'con_matematico'=> $this->input->post('matematico'),
        'con_espanol'=> $this->input->post('espanol'),
        'con_escritura'=>$this->input->post('ortografico'),
        'id_educacion'=> $this->input->post('canalizacion'),
        'obs_lectoras'=> $this->input->post('observaciones1'),
        'obs_transcripcion'=> $this->input->post('observaciones2'),
        'obs_matematicas'=> $this->input->post('observaciones3'),
        'obs_espanol'=> $this->input->post('observaciones4'),
        'obs_escritura'=> $this->input->post('observaciones5'),
        'obs_comp_lectora'=> $this->input->post('observaciones6'),
        'fk_expediente'=>$this->input->post('expediente'),
        'fecha_valped'=>$this->input->post('fecha_actual'),
        );

      $id_valpedagogica = $this->Modelo_proyecto->insertar_valoracion_pedagoga($data);

        header('Location:'.base_url('index.php/proyecto/panel').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/valoracion_pedagogica').'');
  }
}

public function valoracion_psicologica(){
  $this->Modelo_proyecto->valida_sesion();

  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('motivos','Motivos de ingreso','required');
    $this->form_validation->set_rules('fecha_vis','Fecha visita','required');
    $this->form_validation->set_rules('nombre_vis','Nombre visitante','required');
    $this->form_validation->set_rules('relacion','Parentesco','required');
    $this->form_validation->set_rules('antecedentes','Antecedentes en matematicas','required');
    $this->form_validation->set_rules('actitud','Actitud del niño','required');
    $this->form_validation->set_rules('dinamica','Dinamica de convivencia','required');
    $this->form_validation->set_rules('recomendaciones','Recomendaciones','required');
    $this->form_validation->set_rules('fecha_actual','Fecha actual','required');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));    

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_valoracion_psicologica');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data = array(
        'motivos_ing'=> $this->input->post('motivos'),
        'fecha_visita'=> $this->input->post('fecha_vis'),
        'nombre_visitante'=> $this->input->post('nombre_vis'),
        'parentesco'=> $this->input->post('relacion'),
        'antecedentes'=> $this->input->post('antecedentes'),
        'actitud_nino'=> $this->input->post('actitud'),
        'dinamica_convivencias'=> $this->input->post('dinamica'),
        'recomendaciones'=>$this->input->post('recomendaciones'),
        'fk_expediente'=>$this->input->post('expediente'),
        'fecha_valpsi'=>$this->input->post('fecha_actual'),
        );

      $id_valpsicologia = $this->Modelo_proyecto->insertar_valoracion_psicologia($data);

        header('Location:'.base_url('index.php/proyecto/panel').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/valoracion_psicologica').'');
  }
}

public function valoracion_nutriologica(){
  $this->Modelo_proyecto->valida_sesion();

  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('peso','Peso','required');
    $this->form_validation->set_rules('talla','Talla','required');
    $this->form_validation->set_rules('pesoi','Peso ideal','required');
    $this->form_validation->set_rules('diagnostico','Diagnostico nutricional','required');
    $this->form_validation->set_rules('dieta','Dieta','required');
    $this->form_validation->set_rules('plan','Plan alimenticio','required');
    $this->form_validation->set_rules('rasgos','Rasgos fisicos','required');
    $this->form_validation->set_rules('comedor','Datos de comedor','required');
    $this->form_validation->set_rules('enfermedad','Enfermedad','required');
    $this->form_validation->set_rules('trato','Trato especial','required');
    $this->form_validation->set_rules('expediente','Expediente','required');
    $this->form_validation->set_rules('fecha_actual','Fecha actual','required');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));    

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_valoracion_nutriologica');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data = array(
        'peso'=> $this->input->post('peso'),
        'talla'=> $this->input->post('talla'),
        'peso_ideal'=> $this->input->post('pesoi'),
        'diagnostico_nutricional'=> $this->input->post('diagnostico'),
        'dieta'=> $this->input->post('dieta'),
        'plan_alimenticio'=> $this->input->post('plan'),
        'rasgos_fisicos'=> $this->input->post('rasgos'),
        'datos_comedor'=>$this->input->post('comedor'),
        'enfermedad'=> $this->input->post('enfermedad'),
        'trato_especial'=> $this->input->post('trato'),
        'fk_expediente'=> $this->input->post('expediente'),
        'fecha_valnut'=>$this->input->post('fecha_actual'),
        );

      $id_valnutricion = $this->Modelo_proyecto->insertar_valoracion_nutriologa($data);

        header('Location:'.base_url('index.php/proyecto/panel').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/valoracion_nutriologica').'');
  }
}

public function evaluacion_medico(){
  $this->Modelo_proyecto->valida_sesion();

  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
   $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
   $data['menu'] = $this->Modelo_proyecto->datos_menu();

  $this->load->library('form_validation');
  $this->load->helper('form','url');

  $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Alerta </strong>','</div>');
     
  $this->form_validation->set_rules('des_ini','Descripción Inicial','required');
  $this->form_validation->set_rules('peso','Peso', 'required');
  $this->form_validation->set_rules('talla','Talla', 'required');
  $this->form_validation->set_rules('cabeza', 'Descripción de Cabeza', 'required');
  $this->form_validation->set_rules('ojos', 'Descripción de Ojos', 'required');
  $this->form_validation->set_rules('nariz','Descripción de Nariz','required');
  $this->form_validation->set_rules('boca','Descripción de Boca', 'required');
  $this->form_validation->set_rules('cuello','Descripción de Cuello', 'required');
  $this->form_validation->set_rules('torax', 'Descripción de Torax', 'required');
  $this->form_validation->set_rules('abdomen', 'Descripción de Abdomen', 'required');
  $this->form_validation->set_rules('genitales','Descripción de Genitales','required');
  $this->form_validation->set_rules('columna','Descripción de Columna', 'required');
  $this->form_validation->set_rules('extremidades','Descripción de Extremidades', 'required');
  $this->form_validation->set_rules('tes', 'Descripción de Tes', 'required');
  $this->form_validation->set_rules('condicion', 'Condiciones', 'required');
  $this->form_validation->set_rules('expediente', 'Expediente', 'required');
  $this->form_validation->set_rules('fecha_actual','Fecha actual','required');

  if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3)); 

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/formulario_valoracion_medica',$data);
        $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

      $data_m = array(
      'des_ini' => $this->input->post('des_ini'),
      'peso' => $this->input->post('peso'),
      'talla' => $this->input->post('talla'),
      'cabeza' => $this->input->post('cabeza'),
      'ojos' => $this->input->post('ojos'),
      'nariz' => $this->input->post('nariz'),
      'boca' => $this->input->post('boca'),
      'cuello' => $this->input->post('cuello'),
      'torax' => $this->input->post('torax'),
      'abdomen' => $this->input->post('abdomen'),
      'genitales' => $this->input->post('genitales'),
      'columna' => $this->input->post('columna'),
      'extremidades' => $this->input->post('extremidades'),
      'tes' => $this->input->post('tes'),
      'condicion' => $this->input->post('condicion'),
      'fk_expediente' => $this->input->post('expediente'),
      'fecha_valmed'=>$this->input->post('fecha_actual'),
     ); 
      
      $id_valmedica = $this->Modelo_proyecto->insertar_vmedico($data_m);

        header('Location:'.base_url('index.php/proyecto/panel').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/valoracion_medica').'');
  }
}

public function edita_ingreso(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('nombren','Nombre del niño', 'required');
    $this->form_validation->set_rules('apellido_pn','Apellido paterno', 'required');
    $this->form_validation->set_rules('apellido_mn','Apellido materno', 'required');
    $this->form_validation->set_rules('fechann','Fecha de nacimiento', 'required');
    $this->form_validation->set_rules('generon','Género', 'required');
    $this->form_validation->set_rules('origen','Lugar de origen', 'required');
    $this->form_validation->set_rules('municipio','Municipio', 'required');
    $this->form_validation->set_rules('fechain','Fecha de ingreso', 'required');
    $this->form_validation->set_rules('horain','Hora de ingreso', 'required');
    $this->form_validation->set_rules('motivos','Motivos de ingreso', 'required');
    $this->form_validation->set_rules('carpeta','No. Carpeta', 'required');
    //$this->form_validation->set_rules('responsable','Responsable', 'required');
    $this->form_validation->set_rules('observaciones','Observaciones', 'required');

    if ($this->form_validation->run() == FALSE){
    $data['id_ingreso'] = $this->uri->segment(3);
    $data['ingreso'] = $this->Modelo_proyecto->datos_innino($data['id_ingreso']);
    //$data['casas'] = $this->Modelo_proyecto->devuelve_centrosss('id_privilegio');

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_edita_ingreso',$data);
    $this->load->view('templates/panel/footer');
    }else{
      $data = array(
          'nombres_nino' => $this->input->post('nombren'),
          'apellido_pnino' => $this->input->post('apellido_pn'),
          'apellido_mnino' => $this->input->post('apellido_mn'),
          'fecha_nnino' => $this->input->post('fechann'),
          'genero_nino' => $this->input->post('generon'),
          'lugar_nnino' => $this->input->post('origen'),
          'municipio_origen' => $this->input->post('municipio'),
          'fecha_ingreso' => $this->input->post('fechain'),
          'hora_ingreso' => $this->input->post('horain'),
          'motivos_ingreso' => $this->input->post('motivos'),
          'no_carpeta' => $this->input->post('carpeta'),
          'nombre_per_trae' => $this->input->post('responsable'),
          'observaciones_ingreso' => $this->input->post('observaciones'),
          );
        $this->Modelo_proyecto->actualiza_ingreso_nino($this->input->post('id_ingreso'),$data);
        header('Location:'.base_url('index.php/proyecto/vista_ninos_ts').'');
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/vista_ninos').'');
  }
}

public function edita_centro(){
  $this->Modelo_proyecto->valida_sesion();

  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('centro','Nombre centro', 'required');
    $this->form_validation->set_rules('ubicacion','Ubicación', 'required');

    if ($this->form_validation->run() == FALSE){
    $data['id_centro'] = $this->uri->segment(3);
    $data['centro'] = $this->Modelo_proyecto->datos_centro($data['id_centro']);

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_edita_centro',$data);
    $this->load->view('templates/panel/footer');
    }else{
      $data = array(
          'nombre_centro' => $this->input->post('centro'),
          'ubicacion' => $this->input->post('ubicacion'),
          );
        $this->Modelo_proyecto->actualiza_centro($this->input->post('id_centro'),$data);
        header('Location:'.base_url('index.php/proyecto/vista_centro').'');
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/vista_centro').'');
  }
}

public function edita_fam(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('nombref','Nombre del familiar', 'required');
    $this->form_validation->set_rules('apellido_pf','Apellido paterno', 'required');
    $this->form_validation->set_rules('apellido_mf','Apellido materno', 'required');
    $this->form_validation->set_rules('generof','Género', 'required');
    $this->form_validation->set_rules('fechaf','Fecha nacimiento', 'required');
    $this->form_validation->set_rules('relacion','Relación', 'required');

    if ($this->form_validation->run() == FALSE){
    $data['id_familiar'] = $this->uri->segment(3);
    $data['familiar'] = $this->Modelo_proyecto->datos_familiares($data['id_familiar']);

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_edita_datos_familiar',$data);
    $this->load->view('templates/panel/footer');
    }else{
      $data = array(
          'nombre_f' => $this->input->post('nombref'),
          'apellido_pf' => $this->input->post('apellido_pf'),
          'apellido_mf' => $this->input->post('apellido_mf'),
          'genero_f' => $this->input->post('generof'),
          'fecha_naf' => $this->input->post('fechaf'),
          'relacion' => $this->input->post('relacion'),
          );
        $this->Modelo_proyecto->actualiza_fam($this->input->post('id_familiar'),$data);
        header('Location:'.base_url('index.php/proyecto/vista_familiares').'');
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/vista_familiares').'');
  }
}

public function edita_personal(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('nombrep','Nombre centro', 'required');
    $this->form_validation->set_rules('apellido_mp','Apellido paterno', 'required');
    $this->form_validation->set_rules('apellido_pp','Apellido materno', 'required');
    $this->form_validation->set_rules('generop','Género', 'required');
    $this->form_validation->set_rules('correop','Correo', 'required');
    $this->form_validation->set_rules('id_privilegio','Área', 'required');
    $this->form_validation->set_rules('id_centro','Centro asistencial', 'required');

    if ($this->form_validation->run() == FALSE){
    $data['id_persona'] = $this->uri->segment(3);
    $data['persona'] = $this->Modelo_proyecto->datos_personal($data['id_persona']);
    $data['areas'] = $this->Modelo_proyecto->devuelve_privilegios('id_privilegio');
    $data['centrot'] = $this->Modelo_proyecto->devuelve_centrosss('id_centro');
     
    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_edita_personal',$data);
    $this->load->view('templates/panel/footer');
    }else{
      $data = array(
          'nombres' => $this->input->post('nombrep'),
          'apellido_p' => $this->input->post('apellido_pp'),
          'apellido_m' => $this->input->post('apellido_mp'),
          'genero' => $this->input->post('generop'),
          'correo' => $this->input->post('correop'),
          'id_privilegio' => $this->input->post('id_privilegio'),
          'id_centro' => $this->input->post('id_centro'),
          );

        $this->Modelo_proyecto->actualiza_personal($this->input->post('id_persona'),$data);
        header('Location:'.base_url('index.php/proyecto/vista_empleados').'');
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/vista_empleados').'');
  }
}

public function edita_estatus_personal(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();
    $data['estatusp'] = $this->Modelo_proyecto->estatusp();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('id_estado','Área', 'required');
    //$this->form_validation->set_rules('id_centro','Centro asistencial', 'required');

    if ($this->form_validation->run() == FALSE){
    $data['id_persona'] = $this->uri->segment(3);
    $data['persona'] = $this->Modelo_proyecto->datos_personal($data['id_persona']);

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/edita_estatus_personal',$data);
    $this->load->view('templates/panel/footer');
    }else{
      $data = array(
          'activop' => $this->input->post('id_estado'),
          );

        $this->Modelo_proyecto->actualiza_personal($this->input->post('id_persona'),$data);
        header('Location:'.base_url('index.php/proyecto/vista_empleados').'');
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/edita_estatus_personal').'');
  }
}

public function edita_estado_procesal(){
  $this->Modelo_proyecto->valida_sesion();

$segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('procesal','Estado procesal', 'required');
    //$this->form_validation->set_rules('id_centro','Centro asistencial', 'required');

    if ($this->form_validation->run() == FALSE){
    $data['id_expediente'] = $this->uri->segment(3);
    $data['expediente_nino'] = $this->Modelo_proyecto->datos_estadop_expediente($data['id_expediente']);
    $data['estado_procesal'] = $this->Modelo_proyecto->devuelve_procesal('id_estadop');

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/edita_estado_procesal',$data);
    $this->load->view('templates/panel/footer');

    }else{
      $data = array(
        'id_estadop' => $this->input->post('procesal'),
      );

      $this->Modelo_proyecto->actualiza_estado_procesal($this->input->post('id_expediente'),$data);

      header('Location:'.base_url('index.php/proyecto/expediente_incidencia').'');
   }
  }else{
    header('Location:'.base_url('index.php/proyecto/edita_estado_procesal').'');
  }
}

public function busqueda_estado(){
  $this->Modelo_proyecto->valida_sesion();

  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['calificaciones'] =$this->Modelo_proyecto->devuelve_busqueda_estado();

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/busqueda_estado');
    $this->load->view('templates/panel/footer');
 }

 public function formulario_incidencias_menu(){
  $this->Modelo_proyecto->valida_sesion();

  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['expediente'] = $this->Modelo_proyecto->ver_expedientes2($this->uri->segment(3));

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_incidencias_menu');
    $this->load->view('templates/panel/footer');
 }

 public function formulario_traslados(){
  $this->Modelo_proyecto->valida_sesion();

  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['expediente'] = $this->Modelo_proyecto->ver_expedientes2($this->uri->segment(3));

    $this->load->library('form_validation');
    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_traslados', array('error' => ' '));
    $this->load->view('templates/panel/footer');
 }

 public function formulario_egresos(){
  $this->Modelo_proyecto->valida_sesion();

  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['expediente'] = $this->Modelo_proyecto->ver_expedientes2($this->uri->segment(3));

    $this->load->library('form_validation');
    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_egresos', array('error' => ' '));
    $this->load->view('templates/panel/footer');
 }

 public function formulario_fugas(){
  $this->Modelo_proyecto->valida_sesion();

  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['expediente'] = $this->Modelo_proyecto->ver_expedientes2($this->uri->segment(3));

    $this->load->library('form_validation');
    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_fugas', array('error' => ' '));
    $this->load->view('templates/panel/footer');
 }

 public function ninos_ingresos(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['calificaciones'] =$this->Modelo_proyecto->devuelve_ninos_ingresos();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_ingresos');
        $this->load->view('templates/panel/footer');
 }

 public function ninos_traslados(){
 $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['calificaciones'] =$this->Modelo_proyecto->devuelve_ninos_traslados();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_traslados');
        $this->load->view('templates/panel/footer');
 }

 public function ninos_egresos(){
 $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['calificaciones'] =$this->Modelo_proyecto->devuelve_ninos_egresos();
  
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_egresos');
        $this->load->view('templates/panel/footer');
 }

 public function ninos_fugas(){
 $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['calificaciones'] =$this->Modelo_proyecto->devuelve_ninos_fugas();
  
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_fugas');
        $this->load->view('templates/panel/footer');
 }

 public function formulario_ninos_traslados(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();
   
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('fecha_traslado','Fecha de egreso','required');
    $this->form_validation->set_rules('motivos_traslado','Motivos de egreso','required');
    $this->form_validation->set_rules('autoriza','Persona que autoriza el egreso','required');
    $this->form_validation->set_rules('id_expediente','Expediente','required');
    $this->form_validation->set_rules('id_centro','Centro Asistencial de¨Procedencia','required');
    $this->form_validation->set_rules('id_centroe','Centro Asistencial de Destino','required');

  if ($this->form_validation->run() == FALSE){
    $data['id_expediente'] = $this->uri->segment(3);
    $data['expediente_n'] = $this->Modelo_proyecto->datos_exptras($data['id_expediente']);
    $data['cen'] = $this->Modelo_proyecto->devuelve_centro_tras('id_centro'); 
    $data['centro_tras'] = $this->Modelo_proyecto->casitas();
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3)); 
     
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/formulario_traslados',$data);
        $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data_camb = array(
        'id_expediente'=> $this->input->post('id_expediente'),
        'id_centro'=> $this->input->post('id_centro'),
        'id_centroe'=> $this->input->post('id_centroe'),
        'id_incidencia' => '4',
        'fecha_traslado'=> $this->input->post('fecha_traslado'),
        'motivos_traslado'=> $this->input->post('motivos_traslado'),
        'autoriza'=> $this->input->post('autoriza'),
        );

      $id_expincidencia = $this->Modelo_proyecto->insertar_incidencia_expediente($data_camb);

      $data_edtras = array(
       'id_incidencia_actual' => '1',
       'id_centro' => $this->input->post('id_centroe'),
      );

      $this->Modelo_proyecto->actualiza_incidencia_expediente($this->input->post('id_expediente'),$data_edtras);
      
        header('Location:'.base_url('index.php/proyecto/expediente_incidencia').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/formulario_ninos_traslados').'');
  }
}

public function formulario_ninos_egresos(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();
   
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('fecha_egreso','Fecha de egreso','required');
    $this->form_validation->set_rules('motivos_egreso','Motivos de egreso','required');
    $this->form_validation->set_rules('autoriza','Persona que autoriza el egreso','required');
    $this->form_validation->set_rules('responsable','Persona responsable del niño','required');
    $this->form_validation->set_rules('id_expediente','Expediente','required');
    $this->form_validation->set_rules('id_centro','Centro Asistencial','required');
    $this->form_validation->set_rules('id_centrod','Centro Asistencial','required');

    if ($this->form_validation->run() == FALSE){
    $data['id_expediente'] = $this->uri->segment(3);
    $data['expediente_n'] = $this->Modelo_proyecto->datos_exptras($data['id_expediente']);
    $data['cent'] = $this->Modelo_proyecto->devuelve_centro_tras('id_centro'); 
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3)); 

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_egresos', $data);
    $this->load->view('templates/panel/footer');

    }else{
      if($this->input->post()){

        $data = array(
        'id_expediente'=> $this->input->post('id_expediente'),
        'id_centro'=> $this->input->post('id_centro'),
        'id_centroe'=> $this->input->post('id_centrod'),
        'id_incidencia'=> '2',
        'fecha_egreso'=> $this->input->post('fecha_egreso'),
        'motivos_egreso'=> $this->input->post('motivos_egreso'),
        'autoriza'=> $this->input->post('autoriza'),
        'persona_responsable'=> $this->input->post('responsable'),
        );

      $id_expincidencia = $this->Modelo_proyecto->insertar_incidencia_expediente($data);

      $data_ed = array(
       'id_incidencia_actual' => '2',
       'id_centro' => $this->input->post('id_centrod'),
      );

      $this->Modelo_proyecto->actualiza_incidencia_expediente($this->input->post('id_expediente'),$data_ed);

        header('Location:'.base_url('index.php/proyecto/expediente_incidencia').'');
     } 
    }
  }else{
   header('Location:'.base_url('index.php/proyecto/formulario_ninos_egresos').'');
  }
}

public function formulario_ninos_fugas(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('fucha_fuga','Fecha de egreso','required');
    $this->form_validation->set_rules('motivos_fuga','Motivos de egreso','required');
    $this->form_validation->set_rules('localizado','Persona que autoriza el egreso','required');
     $this->form_validation->set_rules('responsable','Estancia actual del niño','required');
    $this->form_validation->set_rules('id_expediente','Expediente','required');
    $this->form_validation->set_rules('id_centro','Centro Asistencial','required');
    $this->form_validation->set_rules('id_centrod','Centro Asistencial','required');

    if ($this->form_validation->run() == FALSE){
    $data['id_expediente'] = $this->uri->segment(3);
    $data['expediente_n'] = $this->Modelo_proyecto->datos_exptras($data['id_expediente']);
    $data['centr'] = $this->Modelo_proyecto->devuelve_centro_tras('id_centro'); 
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));    

    
    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/formulario_fugas', $data);
    $this->load->view('templates/panel/footer');

    }else{
      if($this->input->post()){

        $data = array(
        'id_expediente'=> $this->input->post('id_expediente'),
        'id_centro'=> $this->input->post('id_centro'),
        'id_centroe'=> $this->input->post('id_centrod'),
        'id_incidencia'=> '3',
        'fecha_fuga'=> $this->input->post('fucha_fuga'),
        'motivos_fuga'=> $this->input->post('motivos_fuga'),
        'localizado'=> $this->input->post('localizado'),
        'estancia_nino'=> $this->input->post('responsable'),
        );

      $id_expincidencia = $this->Modelo_proyecto->insertar_incidencia_expediente($data);

      $data_ed = array(
       'id_incidencia_actual' => '3',
       'id_centro'=> $this->input->post('id_centrod'),
      );

      $this->Modelo_proyecto->actualiza_incidencia_expediente($this->input->post('id_expediente'),$data_ed);

        header('Location:'.base_url('index.php/proyecto/expediente_incidencia').'');
     } 
    }
  }else{
   header('Location:'.base_url('index.php/proyecto/formulario_ninos_fugas').'');
  }
}

 public function registros_por_casa(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();

      $data['expedientes_por_casa'] = $this->Modelo_proyecto->exp_casa($this->uri->segment(3));
      $data['estado_p'] = $this->Modelo_proyecto->estadop();
      $data['estado_nino'] = $this->Modelo_proyecto->exp_estado($this->uri->segment(4));
      

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/registros_por_casa',$data);
      $this->load->view('templates/panel/footer');
  }


public function privilegios_secciones(){
$this->Modelo_proyecto->valida_sesion();
  //$this->Modelo_proyecto->Estar_aqui();
 $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
  $data['privilegios'] =$this->Modelo_proyecto->devuelve_privilegios_seccion();

 $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/privilegios_secciones',$data);
    $this->load->view('templates/panel/footer');
}

public function ingresar_secciones(){
   $this->Modelo_proyecto->valida_sesion();
  //$this->Modelo_proyecto->Estar_aqui();
  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
    $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();   
    $data['secciones'] = $this->Modelo_proyecto->secciones_privilegio($this->uri->segment(3));
     $data['secciones_faltan'] = $this->Modelo_proyecto->drop_secciones_faltantes($this->uri->segment(3));
     $data['id_privilegio'] = $this->uri->segment(3);
   $this->load->library('form_validation');
    $this->load->helper('form','url');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong>','</div>');

     $this->form_validation->set_rules('campo_seccion','seccion','required');
    if($this->form_validation->run()==FALSE){
     $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/ingresar_secciones',$data);
    $this->load->view('templates/panel/footer');

    }else{
      $data = array(
        'id_seccion' => $this->input->post('campo_seccion'),
        'id_privilegio' => $this->input->post('id_privilegio'),
        'menu' => '1'
        );
      $this->Modelo_proyecto->inserta_privilegio_seccion($data);
      header('Location:'.base_url('index.php/proyecto/ingresar_secciones/'.$this->input->POST('id_privilegio').'').'');
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/privilegio_seccion').'');  
  }
}

public function elimina_seccion(){
  $data = array(
    'id_privilegio'=> $this->uri->segment(3),
    'id_seccion'   => $this->uri->segment(4)
    );
  $this->Modelo_proyecto->elimina_privilegio_seccion($data);
  header('Location:'.base_url('index.php/proyecto/ingresar_secciones/'.$this->uri->segment(3).'').'');  
 
}


  public function vista_expediente_medico(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      //$data['estatus'] = $this->Modelo_proyecto->devuelve_estatus();

       $this->load->model('Modelo_proyecto');

         if($_POST){

                $buscar=$this->input->post('busqueda');

          }

         else{
          $buscar='';

          }
      $data['expedientes_m'] = $this->Modelo_proyecto->devuelve_expedientes_medico($buscar, $this->session->id_expediente);

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/vista_expediente_medico',$data);
      $this->load->view('templates/panel/footer');
  }

  

 public function grafica()
  {
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
 
  
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/charts');
        $this->load->view('templates/panel/footer');
 
  }

  public function get(){
  $result = $this->Modelo_proyecto->get();
  echo json_encode($result);
  }


  public function grafica2()
  {
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
 
  
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/charts2');
        $this->load->view('templates/panel/footer');
 
  }

  public function get2(){
  $result = $this->Modelo_proyecto->get2();
  echo json_encode($result);
  }


  public function grafica3()
  {
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
 
  
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/charts3');
        $this->load->view('templates/panel/footer');
 
  }

  public function get3(){
  $result = $this->Modelo_proyecto->get3();
  echo json_encode($result);
  }

  public function alta_ninos(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['centro_a'] = $this->Modelo_proyecto->devuelve_centro();

    $this->load->library('form_validation');    
    $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
$this->load->view('templates/panel/formulario_ingreso_nino', array('error' => ' ' )); 
      $this->load->view('templates/panel/footer');
  }

    public function do_upload_img(){
      $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      $data['centro_a'] = $this->Modelo_proyecto->devuelve_centro();

       // $config['upload_path'] = "./uploadt/"; 
       // $config['allowed_types'] = "jpg|png";
       // $config['max_size'] = "20000";         
       // $config['max_width'] = "1024";               
       // $config['max_height'] = "768"; 

    $this->load->library('form_validation');
    $this->load->helper('form','url');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta </strong> ','</div');
    
    $this->form_validation->set_rules('centro','Centro asistencial','required');
    $this->form_validation->set_rules('fechan','Fecha de ingreso','required');
    $this->form_validation->set_rules('horan','Hora de ingreso','required');
    $this->form_validation->set_rules('nombren','Nombre del usuario','required');
    $this->form_validation->set_rules('apellido_pn','Apellido paterno','required');
    $this->form_validation->set_rules('apellido_mn','Apellido materno','required');
    $this->form_validation->set_rules('generon','Genero');
    $this->form_validation->set_rules('fechann','Fecha de nacimiento','required');
    $this->form_validation->set_rules('usuarioni','Usuario','required');
    $this->form_validation->set_rules('lugaron','Lugar de nacimiento','required');
    $this->form_validation->set_rules('municipioon','Municipio de origen','required');
    $this->form_validation->set_rules('carpeta','Número de carpeta', 'required|min_length[3]|max_length[100]|is_unique[ingreso_nino.no_carpeta],',array( 'required' => 'No has proporcionado %s.', 'is_unique' => 'Este %s ya existe.' ));
    $this->form_validation->set_rules('motivos','Motivos de ingreso','required');
    $this->form_validation->set_rules('observaciones','Observaciones de ingreso','required');
    $this->form_validation->set_rules('discapacidad','Tiene alguna iscapacidad','required');
    $this->form_validation->set_rules('hermanos','Cuenta con hermanos','required');
    $this->form_validation->set_rules('persona_trae','Nombre de quién ingresa al niño','required');
    $config['upload_path'] = "./uploadt/";
        $config['allowed_types'] = "gif|jpg|png|pdf|jpeg|"; 
        $config['max_size'] = "2000000000"; 
        $config['max_width'] = "102400000"; 
        $config['max_height'] = "7680000";            
    
    $this->load->library('upload', $config); 

         $this->upload->initialize($config);

     if ( ! $this->upload->do_upload()){
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/formulario_ingreso_nino', $error);
      $this->load->view('templates/panel/footer');

      }else

      $file_info = $this->upload->data();                  
      $data = array('upload_data' => $this->upload->data());   
       $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
       $data['centro_a'] = $this->Modelo_proyecto->devuelve_centro();
    $this->load->library('form_validation');    
    $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
    header('Location:'.base_url('index.php/proyecto/prueba_pertenencias').'');
       $this->load->view('templates/panel/footer');   

      $data_ingreso = array(
      'nombres_nino' => $this->input->post('nombren'),
      'apellido_pnino' => $this->input->post('apellido_pn'),
      'apellido_mnino' => $this->input->post('apellido_mn'),
      'fecha_nnino' => $this->input->post('fechann'),
      'genero_nino' => $this->input->post('generon'),
      'hora_ingreso' => $this->input->post('horan'),
      'fecha_ingreso' => $this->input->post('fechan'),
      'lugar_nnino' => $this->input->post('lugaron'),
      'municipio_origen' => $this->input->post('municipioon'),
      'no_carpeta' => $this->input->post('carpeta'),
      'motivos_ingreso' => $this->input->post('motivos'),
      'observaciones_ingreso' => $this->input->post('observaciones'),
       'motivos_ingreso' => $this->input->post('motivos'),
      'hermanos' => $this->input->post('hermanos'),
      'discapacidad' => $this->input->post('discapacidad'),
      'foto_nino'=>$file_info['file_name']
     );

      $id_ingreso = $this->Modelo_proyecto->insertar_ingreso_nino($data_ingreso);


      $data_expediente = array(
      'id_ingreso' => $id_ingreso,
      'id_centro' => $this->input->post('centro'),
      'id_trabajador' => $this->input->post('usuarioni'),
      'id_incidencia_actual' => '1',
      'id_estadop' => '3',
      );

      $id_expediente=$this->Modelo_proyecto->insertar_expediente($data_expediente);

      $data_expeinci = array(
      'id_incidencia' => '1',
      'id_expediente' => $id_expediente,
      );

      $id_expincidencia=$this->Modelo_proyecto->insertar_expeinci($data_expeinci);

      header('Location:'.base_url('index.php/proyecto/prueba_pertenencias').'/'.$id_ingreso.'');     
  }
   
  public function ver_hermanos(){
  $this->Modelo_proyecto->valida_sesion();

$segmento = $this->uri->segment(3); 

  if(!empty($segmento)){
    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('carpeta','No. Carpeta', 'required');
    
    if ($this->form_validation->run() == FALSE){

    $carpeta = $this->Modelo_proyecto->devuelve_carpeta($this->uri->segment(3));
    $id_expediente = $this->Modelo_proyecto->devuelve_id_exp($this->uri->segment(4));
    $this->Modelo_proyecto->devuelve_ninos_hermanos($carpeta, $this->uri->segment(4));

    $data['ingreso'] = $this->Modelo_proyecto->datos_innino($this->uri->segment(3));
    $data['hermanos'] = $this->Modelo_proyecto->devuelve_ninos_hermanos($carpeta, $id_expediente);

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/ver_hermanos',$data);
    $this->load->view('templates/panel/footer');
    }else{
      $data = array(
          'no_carpeta' => $this->input->post('carpeta')
          );
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/vista_ninos').'');
  }
}


      public function ejemplo(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_hermanos1();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ejemplo');
        $this->load->view('templates/panel/footer');
 }

  public function busqueda_estadop(){
  $this->Modelo_proyecto->valida_sesion();

  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_busqueda_estadop();

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/busqueda_estadopenal');
    $this->load->view('templates/panel/footer');
 }
  public function estado_juicio(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_ninos_juicio();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_juicio');
        $this->load->view('templates/panel/footer');
 }
   public function estado_resuelto(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
   $data['busqueda'] =$this->Modelo_proyecto->devuelve_ninos_resueltos();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_resueltos',$data);
        $this->load->view('templates/panel/footer');
 }

   public function hermanos1(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_hermanos();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_hermanos1');
        $this->load->view('templates/panel/footer');
 }

    public function hermanos2(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_hermanos2();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_hermanos2');
        $this->load->view('templates/panel/footer');
 }

    public function discapacidad1(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_discapacidad1();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_discapacidad1');
        $this->load->view('templates/panel/footer');
 }
     public function discapacidad2(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_discapacidad2();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_discapacidad2');
        $this->load->view('templates/panel/footer');
 }


      public function opcion1(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_opcion1();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_opcion1');
        $this->load->view('templates/panel/footer');
 }

      public function opcion2(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_opcion2();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_opcion2');
        $this->load->view('templates/panel/footer');
 }

      public function opcion3(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_opcion3();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_opcion3');
        $this->load->view('templates/panel/footer');
 }

      public function opcion4(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda'] =$this->Modelo_proyecto->devuelve_opcion4();

        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/ninos_opcion4');
        $this->load->view('templates/panel/footer');
 }

 public function estadisticas(){
  $this->Modelo_proyecto->valida_sesion();
      $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
      $data['menu'] = $this->Modelo_proyecto->datos_menu();
      
      $total_f = $this->Modelo_proyecto->genero_femenino();
      $total_m = $this->Modelo_proyecto->genero_masculino();
      $data['ju'] = $this->Modelo_proyecto->en_juicio();
      //$data['residentes'] = $this->Modelo_proyecto->devuelve_empleados_vista();
      //$data['residentes'] = $this->Modelo_proyecto->devuelve_empleados_vista();
      //$data['residentes'] = $this->Modelo_proyecto->devuelve_empleados_vista();

      $this->load->view('templates/panel/header',$data);
      $this->load->view('templates/panel/menu',$data);
      $this->load->view('templates/panel/estadisticas',$data);
      $this->load->view('templates/panel/footer');
  }

      public function carpeta_hermanos(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda1'] =$this->Modelo_proyecto->devuelve_carpeta_hermanos();

  $data['busqueda'] =$this->Modelo_proyecto->devuelve_carpeta_hermanos();
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/carpeta_hermanos');
        $this->load->view('templates/panel/footer');
 }

     public function todos(){
  $this->Modelo_proyecto->valida_sesion();
  $data['sesion'] =$this->Modelo_proyecto->datos_sesion();
  $data['menu'] =$this->Modelo_proyecto->datos_menu();
  $data['busqueda1'] =$this->Modelo_proyecto->devuelve_carpeta_hermanos();
 $data['busqueda'] =$this->Modelo_proyecto->devuelve_carpeta_hermanostodos();
        $this->load->view('templates/panel/header',$data);
        $this->load->view('templates/panel/menu',$data);
        $this->load->view('templates/panel/carpeta_hermanos');
        $this->load->view('templates/panel/footer');
 }

public function visita_domiciliaria(){
  $this->Modelo_proyecto->valida_sesion();

  $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('fecha_e','Peso','required');
    $this->form_validation->set_rules('nombre_r','Nombre de quien realiza','required');
    $this->form_validation->set_rules('nombre_e','Nombre del entrevistado','required');
    $this->form_validation->set_rules('domicilio','Domicilio','required');
    $this->form_validation->set_rules('antec_caso','Antecedentes del caso','required');
    $this->form_validation->set_rules('metod','Metodologia','required');
    $this->form_validation->set_rules('pariente','Parentesco','required');
    $this->form_validation->set_rules('edad','Edad','required');
    $this->form_validation->set_rules('fecha_n','Fecha de nacimiento','required');
    $this->form_validation->set_rules('lugar_n','Lugar de nacimiento','required');
    $this->form_validation->set_rules('estado_c','Estado civil','required');
    $this->form_validation->set_rules('escol','Escolaridad','required');
    $this->form_validation->set_rules('religion','Religión','required');
    $this->form_validation->set_rules('ocupacion','Ocupacion','required');
    $this->form_validation->set_rules('p_enfer','Enfermedad','required');
    $this->form_validation->set_rules('antec_penal','Antecedentes penales','required');
    $this->form_validation->set_rules('adiccion',' Adicciones','required');

    $this->form_validation->set_rules('hechos','Relacion con los hechos','required');
    $this->form_validation->set_rules('nuc_p','Núcluo primario','required');
    $this->form_validation->set_rules('dinamica_p','Dinámica primaria','required');
    $this->form_validation->set_rules('nuc_s','Núcleo secundario penales','required');
    $this->form_validation->set_rules('dinamica_s',' Dinámica secundaria','required');

    $this->form_validation->set_rules('situacion_e','Situación económica','required');
    $this->form_validation->set_rules('agua','Agua','required');
    $this->form_validation->set_rules('luz','Luz','required');
    $this->form_validation->set_rules('alimentos','Alimentos','required');
    $this->form_validation->set_rules('transporte','Transporte','required');
    $this->form_validation->set_rules('tel','Teléfono','required');
    $this->form_validation->set_rules('g_medicos','Gastos médicos','required');
    $this->form_validation->set_rules('tot_i','total de ingresos','required');
    $this->form_validation->set_rules('tot_e','total de egresos','required');
    $this->form_validation->set_rules('bienes_i','Bienes inmuebles','required');
    $this->form_validation->set_rules('nivel_s','Nivel socioeconomico','required');
    $this->form_validation->set_rules('clase','Clase','required');

    $this->form_validation->set_rules('materiales','Materiales de la vivienda','required');
    $this->form_validation->set_rules('ubicacion','Ubicación de la casa','required');
    $this->form_validation->set_rules('diagnostico',' Diagnostio social','required');
    $this->form_validation->set_rules('expediente',' Exp','required');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));    

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/visitacasa');
    $this->load->view('templates/panel/footer');
    } else{
    if($this->input->post()){

        $data = array(
        'fecha_e'=> $this->input->post('fecha_e'),
        'nombre_r'=> $this->input->post('nombre_r'),
        'nombre_e'=> $this->input->post('nombre_e'),
        'domicilio'=> $this->input->post('domicilio'),
        'antec_caso'=> $this->input->post('antec_caso'),
        'metod'=> $this->input->post('metod'),
        'pariente'=> $this->input->post('pariente'),
        'edad'=>$this->input->post('edad'),
        'fecha_n'=> $this->input->post('fecha_n'),
        'lugar_n'=> $this->input->post('lugar_n'),
         'estado_c'=> $this->input->post('estado_c'),
        'escol'=> $this->input->post('escol'),
        'religion'=> $this->input->post('religion'),
        'ocupacion'=>$this->input->post('ocupacion'),
        'p_enfer'=> $this->input->post('p_enfer'),
        'antec_penal'=> $this->input->post('antec_penal'),
        'adiccion'=> $this->input->post('adiccion'),
        'hechos'=> $this->input->post('hechos'),
        'nuc_p'=>$this->input->post('nuc_p'),
        'dinamica_p'=> $this->input->post('dinamica_p'),
        'nuc_s'=> $this->input->post('nuc_s'),
        'dinamica_s'=> $this->input->post('dinamica_s'),
        'situacion_e'=> $this->input->post('situacion_e'),
        'agua'=> $this->input->post('agua'),
        'luz'=> $this->input->post('luz'),
        'alimentos'=> $this->input->post('alimentos'),
        'transporte'=> $this->input->post('transporte'),
        'tel'=>$this->input->post('tel'),
        'g_medicos'=> $this->input->post('g_medicos'),
        'tot_i'=> $this->input->post('tot_i'),
        'tot_e'=> $this->input->post('tot_e'),
        'bienes_i'=> $this->input->post('bienes_i'),
        'nivel_s'=>$this->input->post('nivel_s'),
        'clase'=> $this->input->post('clase'),
        'materiales'=> $this->input->post('materiales'),
        'ubicacion'=>$this->input->post('ubicacion'),
        'diagnostico'=> $this->input->post('diagnostico'),
        'fk_expediente'=> $this->input->post('expediente')
        );

      $id_visitad = $this->Modelo_proyecto->insertar_visitad($data);

        header('Location:'.base_url('index.php/proyecto/panel').'');
     }
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/vista_ninos').'');
  }
}

public function informe_familiar(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('nombre_cp','Nombre completo de la entrevistada','required');
    $this->form_validation->set_rules('edad_e','Edad entrevistada','required');
    $this->form_validation->set_rules('sexo','Género','required');
    $this->form_validation->set_rules('parent_m','Parentesco con el menor','required');
    $this->form_validation->set_rules('escolaridad','Escolaridad','required');
    $this->form_validation->set_rules('ecivil','Estado civil','required');
    $this->form_validation->set_rules('n_hijos','Numero de hijos','required');
    $this->form_validation->set_rules('ocupacione','Ocupacion del entrevistado','required');
    $this->form_validation->set_rules('fechae','Fecha del estudio','required');
    $this->form_validation->set_rules('direccione','Direccion','required');
    $this->form_validation->set_rules('tele','Telefono','required');
    $this->form_validation->set_rules('ant','Antecedentes','required');
    $this->form_validation->set_rules('insc','Instrumentos clinicos','required');
    $this->form_validation->set_rules('conclu','Conclusiones','required');
    $this->form_validation->set_rules('rec','Recomendaciones','required');
    $this->form_validation->set_rules('expediente','Expediente','required');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));    

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/informe_familiar');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data = array(
        'nombre_cp'=> $this->input->post('nombre_cp'),
        'edad_e'=> $this->input->post('edad_e'),
        'sexo'=> $this->input->post('sexo'),
        'parent_m'=> $this->input->post('parent_m'),
        'escolaridad'=> $this->input->post('escolaridad'),
        'ecivil'=> $this->input->post('ecivil'),
        'n_hijos'=> $this->input->post('n_hijos'),
        'ocupacione'=>$this->input->post('ocupacione'),
        'fechae'=> $this->input->post('fechae'),
        'direccione'=> $this->input->post('direccione'),
        'tele'=> $this->input->post('tele'),
        'ant'=> $this->input->post('ant'),
        'insc'=> $this->input->post('insc'),
        'conclu'=> $this->input->post('conclu'),
        'rec'=> $this->input->post('rec'),
        'fk_expediente'=>$this->input->post('expediente')
        );

      $id_infamiliar = $this->Modelo_proyecto->insertar_informefa($data);

        header('Location:'.base_url('index.php/proyecto/panel').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/valoracion_psicologica').'');
  }
}


public function notas(){
  $this->Modelo_proyecto->valida_sesion();

 $segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('actividad','Nombre de la actividad','required');
    $this->form_validation->set_rules('coment','Comentarios','required');
    $this->form_validation->set_rules('fecha_n','Fecha de elaboración de nota','required');
    
    $this->form_validation->set_rules('expediente','Expediente','required');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));    

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/notas_ps');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data = array(
        'actividad'=> $this->input->post('actividad'),
        'coment'=> $this->input->post('coment'),
        'fecha_n'=> $this->input->post('fecha_n'),
        'fk_expediente'=>$this->input->post('expediente')
        );

      $id_infamiliar = $this->Modelo_proyecto->insertar_nota($data);

        header('Location:'.base_url('index.php/proyecto/panel').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/valoracion_psicologica').'');
  }
}


public function informe_menor(){
  $this->Modelo_proyecto->valida_sesion();

$segmento = $this->uri->segment(3); 

  if(!empty($segmento)){

    $data['sesion'] = $this->Modelo_proyecto->datos_sesion();
    $data['menu'] = $this->Modelo_proyecto->datos_menu();

    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Alerta </strong>','</div>');

    $this->form_validation->set_rules('familiograma','Familiograma','required');
    $this->form_validation->set_rules('antec_m','Antecedentes del menor','required');
    $this->form_validation->set_rules('instrumentos','Instrumentos clinicos','required');
    $this->form_validation->set_rules('resul','Resultados de la valoración','required');
    $this->form_validation->set_rules('impresion','impresion diagnostica','required');
    $this->form_validation->set_rules('recomen','Recomendaciones','required');
  
    $this->form_validation->set_rules('expediente','Expediente','required');

    if ($this->form_validation->run() == FALSE){
    $data['expediente'] = $this->Modelo_proyecto->ver_expedientes($this->uri->segment(3));    

    $this->load->view('templates/panel/header',$data);
    $this->load->view('templates/panel/menu',$data);
    $this->load->view('templates/panel/informe_menor');
    $this->load->view('templates/panel/footer');
    }else{
      if($this->input->post()){

        $data = array(
        'familiograma'=> $this->input->post('familiograma'),
        'antec_m'=> $this->input->post('antec_m'),
        'instrumentos'=> $this->input->post('instrumentos'),
        'resul'=> $this->input->post('resul'),
        'impresion'=> $this->input->post('impresion'),
        'recomen'=> $this->input->post('recomen'),
        'fk_expediente'=>$this->input->post('expediente'),
        );

      $id_menor = $this->Modelo_proyecto->insertar_menor($data);

        header('Location:'.base_url('index.php/proyecto/panel').'');
     } 
    }
  }else{
    header('Location:'.base_url('index.php/proyecto/valoracion_psicologica').'');
  }
}



}
