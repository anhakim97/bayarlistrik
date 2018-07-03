<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MTransaksi extends CI_Model {

 public function transaksi($data) {
  return $this->db->insert('transaksi', $data);
 }
  public function view_all($where){
 	return $this->db->get_where('transaksi',$where);
 }


}
