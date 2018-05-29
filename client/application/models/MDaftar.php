<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDaftar extends CI_Model {

 public function simpan($data) {
  return $this->db->insert('agen', $data);
 }

}