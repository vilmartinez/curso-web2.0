<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}
//una variable aqui solo tiene vida aquie en esta clase
class Provincia extends MY_Controller {
	//modifica el contenido de modelo por provincia model
	public $modelo = "provincia_model";
	// luego llama al constructor
	public function index() {
		$data               = array();
		$data['provincias'] = $this->provincia_model->getList();
		$data['titulo']     = "Listado de provincias";
		$this->load->view('admin/provincia/index', $data);
	}

	public function agregar() {
		$provincia 	= $this->input->post('provincia');
		$data 		= ['accion' => 'Agregar'];
		//data la clave = el valor
		//capturamos la variable que recibimos por el post de 
		// views admin provincia agregar
		if ($provincia){
			// si tiene un valor lo muestro y corto sino posee 
			//valor muestra la vista.
			$data['nombre'] = $provincia;
			//$data = array('provincia' => $provincia);
			//se puede usar de las 2 formas anteriores pero la ultima
			//versiòn de php viene como está la primer linea que es
			//la que esta fuera de comentario.
			$this->provincia_model->agregar($data);
			redirect('/admin/provincia/index');
		}else{
			$this->load->view('admin/provincia/formulario', $data);	
		}
	}
	public function editar($id = null) {
		$provincia 	= $this->input->post('provincia');
		$data 		= ['accion' => 'Editar'];
		if($id){
			$data['reg'] = $this->provincia_model->get($id);
			//busca en la bd y trae el registro
		}
		if(empty($data['reg'])){
			// si el reg no existe lo manda de vuelta al index
			redirect('/admin/provincia/index');
		} 

		if ($provincia and $id){
			$data['nombre'] = $provincia;
			//se guardan los datos que editamos
			$this->provincia_model->guardar($data, $id);
			redirect('/admin/provincia/index');
		}else{
			// cuando le paso un id me debe dar los datos que tengo
			$this->load->view('admin/provincia/formulario', $data);	
		}
		
	}
}
