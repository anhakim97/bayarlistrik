<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_agen extends CI_Model{
    private $table = "agen";
    
    function getAgen(){        
        $query = $this->db->get($this->table);
        return $query->result();
    }
    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
}
