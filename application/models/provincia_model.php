<?php
class provincia_model extends CI_Model {
	public function listado(){
		$this->db->from('provincia');
		$q = $this->db->get();
		return $q->result_array();
	}
}