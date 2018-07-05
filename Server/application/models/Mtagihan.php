<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MTagihan extends CI_Model{
   
    function cekTagihan($id_pelanggan){	
        $this->db->select('*');
        $this->db->from('tagihan_listrik');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=tagihan_listrik.id_pelanggan');
        $this->db->where('tagihan_listrik.id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
        return $query->result();
	 }

     function bayarTagihan($id){
        date_default_timezone_set("Asia/Bangkok");
        $data= date("H:i:s d-m-Y");
    $this->db->set('status', "sudah dibayar");
    $this->db->set('tanggal_bayar', $data);
    $this->db->where('id_pelanggan', $id);
    $this->db->update('tagihan_listrik');
     }


}
