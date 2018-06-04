<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MTagihan extends CI_Model{
    
    function cekTagihan($where){		
		return $this->db->get_where('tagihan_listrik',$where);
	}
	 function cekPelanggan($where){		
		return $this->db->get_where('pelanggan',$where);
	}
	function pelanggan(){		
		return $this->db->get('pelanggan');
	}
}
