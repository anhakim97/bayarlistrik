<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDeposit extends CI_Model {

 public function tambah($data) {
  return $this->db->insert('deposit', $data);
 }
 function view_data($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function hapus_data($where, $table){		
		$this->db->where($where);
	$this->db->delete($table);
	}
	function select_where($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function updatestatus($id){
 	$this->db->set('status', "sukses");
 	$this->db->where('id_deposit', $id);
	$this->db->update('deposit');
	}

}
