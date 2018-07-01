<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MTagihan extends CI_Model{
    private $table = "tagihan_listrik";   
    function cekTagihan($id_pelanggan){		
	   // $query = $this->db->query("SELECT * FROM tagihan_listrik WHERE id_pelanggan = $id_pelanggan");
    //    return $query->result();
    return $this->db->get_where('tagihan_listrik', array('id_pelanggan' => $id_pelanggan));
	 }
	 function cekPelanggan($where){		
		return $this->db->get_where('pelanggan',$where);
	}
	function pelanggan(){		
		return $this->db->get('pelanggan');
	}

    
    function getProduk(){        
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    function getProdukById($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);
        return $query->result();
    }

}
