<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAgen extends CI_Model {

 public function view_all(){
 	return $this->db->get('agen');
 }
 function updatesaldo($id, $saldo){
 	$this->db->set('saldo', $saldo);
 	$this->db->where('id_agen', $id);
	$this->db->update('agen');

 }
 function select_where($table,$where){		
		return $this->db->get_where($table,$where);
	}

}