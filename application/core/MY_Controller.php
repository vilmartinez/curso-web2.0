<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class MY_Controller extends CI_Controller {
	// se define aca para que este cuando llame a los constructores
	public $modelo = "";
	public $a = 0;

	public function __construct($nuevoValor = 0) {
		//cuando creo algo de my controler asigna el valor 10

		//una variable aque no la puedo ver afuera de esta
		//funciòn,
		//$a = 0;
		$this->a = $nuevoValor;
		parent::__construct();
		//evalua si tiene datos y si esta vacio es
		//falso
		//el alcance de las variables es sobre en que 
		//momento viven o no.
		if ($this->modelo) {
			$this->load->model($this->modelo);
		}
	}
	public function carga() {
		echo $this->a;
	}

}