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
		if ($provincia){
			$reg = ['nombre'=>$provincia];
			$this->provincia_model->agregar($reg);
			redirect('/admin/provincia/index');
		}else{
			$this->load->view('admin/provincia/formulario', $data);	
		}
	}
	public function editar($id = null) {
		$provincia 	= $this->input->post('provincia');
		$data 		= ['accion' => 'Editar', 'id' => $id];
		if($id){
			$data['reg'] = $this->provincia_model->get($id);
		}
		if(empty($data['reg'])){
			redirect('/admin/provincia/index');
		} 
		if ($provincia and $id){
			$reg = ['nombre' => $provincia];
			//se guardan los datos que editamos
			$this->provincia_model->actualizar($id, $reg);
			redirect('/admin/provincia/index');
		}else{
			// cuando le paso un id me debe dar los datos que tengo
			$this->load->view('admin/provincia/formulario', $data);	
		}
		
	}
	public function eliminar($id = null) {
		if($id){
			$data['reg'] = $this->provincia_model->get($id);
		}
		if(empty($data['reg'])){
			echo 0;
		} else{
			$this->provincia_model->eliminar($id);
			echo 1;
		}
		//pone 1 o 0 para eliminar o no
	}
}
