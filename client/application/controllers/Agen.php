<?php 
 
class Agen extends CI_Controller{
 private $api_url = 'http://localhost/bayarlistrik/server/index.php/serversoap';
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('MDeposit');
  		$this->load->helper('form');

	}
	function index(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("agen/login"));
		}
		$this->load->view('agen/header');
		$this->load->view('agen/index');
		$this->load->view('agen/footer'); 
	}
	function login(){
    	$this->load->view('agen/login');
  	}

  	function aksi_login(){
	    $username = $this->input->post('username');
	    $password = $this->input->post('password');
	    $where = array(
	      'username' => $username,
	      'password' => $password
	      );
	    $cek = $this->m_login->cek_login("agen",$where)->num_rows();
	    $agen = $this->m_login->cek_login("agen",$where)->row();
	    if($cek > 0){
	      $data_session = array(
	        'id_agen' => $agen->id_agen,
	        'nama' => $agen->nama,
	        'username' => $username,
	        'status' => "login"
	        );

	      $this->session->set_userdata($data_session);

	      redirect(base_url("agen/index"));

    	}else{
      	echo "Username dan password salah !<br>";
     // echo "<a href='".base_url()."agen/login'> login lagi </a>";
    	}
  	}

	function pascabayar(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("agen/login"));
		}
		$this->load->view('agen/header');
		$this->load->view('agen/pascabayar');
		$this->load->view('agen/footer'); 

	}
	function transaksi(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("agen/login"));
		}
		$this->load->view('agen/header');
		$this->load->view('agen/transaksi');
		$this->load->view('agen/footer'); 
	}
	  
	function logout(){
    	$this->session->sess_destroy();
    	redirect(base_url('agen/login'));
  	}
  	public function deposit(){
  		if($this->session->userdata('status') != "login"){
			redirect(base_url("agen/login"));
		}
	  if ($this->input->post('submit')) {

	            $a = $this->input->post('nominal');
	            $b = $this->input->post('bank');
	            $c = $this->session->userdata("id_agen");

	            $objek = array(
	            	'id_agen' => $c,
	                'nominal' => $a,
	                'bank' => $b
	                 );

	            $query = $this->MDeposit->tambah($objek);

	            if ($query) {
	                redirect(base_url('agen/deposit#collapse3'));
	            }

	        } else {
	             $id_a = $this->session->userdata("id_agen");
	             $x['depositproses'] = $this->MDeposit->view_data('deposit', array('id_agen' => $id_a, 'status' => "sedang diproses"));
	             $x['depositsukses'] = $this->MDeposit->view_data('deposit', array('id_agen' => $id_a, 'status' => "sukses"));
	             $this->load->view('agen/header');
				       $this->load->view('agen/deposit', $x);
				       $this->load->view('agen/footer');
				       if($this->session->userdata('status') != "login"){
				             redirect(base_url("agen/login"));
			          }
	        }
	 }
	  function hapus_deposit($id){
	  	if($this->session->userdata('status') != "login"){
			redirect(base_url("agen/login"));
		}
	    $where = array('id_deposit' => $id);
	    $this->MDeposit->hapus_data($where,'deposit');
	    redirect('agen/deposit#collapse3');
	}
}
?>