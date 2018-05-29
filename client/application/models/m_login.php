<?php 
 
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	public function view() {
  	$hasil=$this->db->query("SELECT id_agen FROM agen WHERE username='$username' AND password='$password'");
	return $hasil;
 }
}