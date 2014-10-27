<?php
class provincia_model extends CI_Model {
	private $tabla = 'provincia';

	public function get($id, $idName = null) {
		if ($idName)// Si obtenemos el nombre del campo
		{ $this->db->where($idName, $id);
		} else {
			// Campo ID por defecto
			$this->db->where('id', $id);
		}

		$this->db->from($this->tabla);
		$q = $this->db->get();
		return current($q->result_array());
		#return $q->result_array();
	}

	public function getList() {
		$this->db->from($this->tabla);
		$q = $this->db->get();
		return $q->result_array();
	}
	public function agregar($data = array()) {
		//inserta en la tabla lo que se agrego
		$this->db->insert($this->tabla, $data);
	}  //inserta en la tabla lo que se agrego
	public function actualizar($id, $data = array()) {
		$this->db->where('id',$id);
		$this->db->update($this->tabla, $data);
	}
	public function eliminar($id) {
		$this->db->where('id',$id);
		//va a provincia.php
		$this->db->delete($this->tabla);
	}
}
