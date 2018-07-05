<?php 
 
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('MDeposit');
		$this->load->model('MAgen');
  		$this->load->helper('form');

	}
	function login(){
      $title['judul'] = 'Halaman Login Admin';
    	$this->load->view('admin/login', $title);
  	}
  	function aksi_login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'username' => $username,
      'password' => md5($password)
      );
    $cek = $this->m_login->cek_login("admin",$where)->num_rows();
    if($cek > 0){

      $data_session = array(
        'nama' => $username,
        'status' => "login"
        );

      $this->session->set_userdata($data_session);

      redirect(base_url("admin/index"));

    }else{
      echo "Username dan password salah !";
    }
  }
	function agen(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$data['tampil_data'] = $this->MAgen->view_all();
    $data['judul'] = 'Halaman Daftar Agen';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/agen', $data);
		$this->load->view('admin/footer'); 
	}
	function index(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/login"));}
      $data['judul'] = 'Halaman Dasboard Admin';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index');
		$this->load->view('admin/footer'); 
	}
	function deposit(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/login"));}
		$x['depositproses'] = $this->MDeposit->view_data('deposit', array('status' => "sedang diproses"));
        $x['depositsukses'] = $this->MDeposit->view_data('deposit', array('status' => "sukses"));
        $data['judul'] = 'Halaman Manajemen Deposit';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/deposit',$x);
		$this->load->view('admin/footer'); 
		}
	function hapus_deposit($id){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/login"));}
    $where = array('id_deposit' => $id);
    $this->MDeposit->hapus_data($where,'deposit');
    redirect('admin/deposit#collapse3');
    
  		}
  function konfirmasideposit($id){
  	if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/login"));}
  	$where = array('id_deposit' => $id);
  	$agen = $this->MDeposit->select_where('deposit',$where)->row();
  	$id_agen = $agen->id_agen;
  	$deposit = $agen->nominal;
  	$saldo = $this->MDeposit->select_where('agen',array('id_agen' => $id_agen))->row();
  	$saldoAwal = $saldo->saldo;
  	$saldoSekarang = $saldoAwal + $deposit; 
    $this->MAgen->updatesaldo($id_agen, $saldoSekarang, $id);
    $this->MDeposit->updatestatus($id);
    redirect('admin/deposit#collapse3');
    
  }
  function logout(){
    $this->session->sess_destroy();
    redirect(base_url('admin/login'));
  }
}
?>