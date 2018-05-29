<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
 public function __construct()
 {
  parent::__construct();
  $this->load->model('MDaftar');
  $this->load->helper('form');
 }

 public function index()
 {

  if ($this->input->post('submit')) {

            $a = $this->input->post('nama');
            $b = $this->input->post('email');
            $c = $this->input->post('username');
            $d = $this->input->post('password');

            $objek = array(
                'nama' => $a,
                'email' => $b,
                'username' => $c,
                'password' => $d
                 );

            $query = $this->MDaftar->simpan($objek);

            if ($query) {
                $this->session->set_flashdata('berhasil_simpan', 'sukses');
                redirect(base_url('agen/login'));
            }

        } else {
            //$data['konten_public'] = "daftar";
          $this->load->view('daftar');
        }
 }


}