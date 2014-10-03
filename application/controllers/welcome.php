<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
		/* le paso el nombre de la vista*/
		#echo "Hola mundo";;
	}

	public function provincias()
	{
		$this->load->model('provincia_model');
		/*carga el modelo provincia*/
		$data = array();
		/*defino un contenedor vacio*/
		$data['provincias'] = $this->provincia_model->getList();
		/*para poder llamar al modelo le doy this*/
		/*mando el mensaje listado*/
		$data['titulo'] = "Listado de provincias";
		/*cargo un primer campo del arrglo*/
		/*por cada contenedor crea una variable*/
		/*print_r($data);*/
		$this->load->view('provincias', $data);
	}

	public function provincia($id=null) {
		//mandamos un id, cargamos un modelo y ver si el id
		//es > 0 para ver si es numero o letra
		$this->load->model('provincia_model');
		if( $id ){
			$p = $this->provincia_model->get($id);
			//guardamos la consulta en la var p
			//get id este id lo recibe la fn provincia-model
			// en provincias y luego se imprime lo que trae
			print_r($p);
		}
		else
			echo "Debe especificar un numero entero";
	}
	public function provincia_nombre($nombre=null) {
		//mandamos un id, cargamos un modelo y ver si el id
		//es > 0 para ver si es numero o letra
		$this->load->model('provincia_model');
		if( $nombre ){
			$p = $this->provincia_model->get( urldecode($nombre), 'nombre');
			//guardamos la consulta en la var p
			//get id este id lo recibe la fn provincia-model
			// en provincias y luego se imprime lo que trae
			print_r($p);
		}
		else
			echo "Debe especificar un nombre de provincia";
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */