<?php
class provincia_model extends CI_Model {
	/*devuelve un solo registro de la tabla. 
	Las clases usan la llave para contener el codigo*/
	public function get($id, $idName=null){
		if($idName) // Si obtenemos el nombre del campo
			$this->db->where($idName, $id);
		else // campo ID por defecto
			$this->db->where('id', $id);
		$this->db->from('provincia');
		$q = $this->db->get();
		/*devuelve un arreglo*/
		return current($q->result_array());
		//trae un registro
	}
	//llaves se usan cuando se escribe más de una linea
	public function getList(){
	/*devuelve un conjunto de registros*/
		$this->db->from('provincia');
		$q = $this->db->get();
		/*devuelve un arreglo*/
		return $q->result_array();
	}
}
#$provincia_model->get(1); $id=1, $idName=null
#$provincia_model->get(1,'dni'); $id=1, $idName='dni'