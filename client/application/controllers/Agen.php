<?php 
 
class Agen extends CI_Controller{
 private $api_url = 'http://localhost/bayarlistrik/server/index.php/bayarlistrik'; 
	function __construct(){
		parent::__construct();
        $this->load->library("Nusoap_library");
        $this->nusoap_client = new nusoap_client($this->api_url.'?wsdl', 'wsdl'); 		
        $this->load->model('m_login');
		$this->load->model('MDeposit');
		$this->load->model('MAgen');
		$this->load->model('MTransaksi');
  		$this->load->helper('form');

	}
	function index(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("agen/login"));
		}
		$id_a = $this->session->userdata("id_agen");
	    $x['jumlah_deposit'] = $this->MDeposit->view_data('agen', array('id_agen' => $id_a));
		$this->load->view('agen/header');
		$this->load->view('agen/index', $x);
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
		$id_agen = $this->session->userdata("id_agen");
		$data['transaksi_all'] = $this->MTransaksi->view_all(array('id_agen' => $id_agen));
		$this->load->view('agen/header');
		$this->load->view('agen/pascabayar', $data);
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

	function cekTagihan(){
		$data[] = 0;
        $post=$_POST;
        $data['id_pelanggan'] = $post['idpelanggan'];
        $data['id_agen'] = $this->session->userdata("id_agen");
        $data['jumlah_deposit'] = $this->MDeposit->view_data('agen', array('id_agen' => $data['id_agen']));
        if(!empty($post)){
            // pengecekan error
            $error = $this->nusoap_client->getError();
            if ($error) {
                $data['error'] = '<h2>Constructor error</h2><pre>' . $error . '</pre>';
            }else{
                $param = array('id_pelanggan' => $post['idpelanggan']);
                $result = $this->nusoap_client->call('viewbyid_tagihan',$param);
                       
                if($this->nusoap_client->fault){
                    $data['fault'] = '<h2>Fault (Expect - The request contains an invalid SOAP body)</h2><pre>'; print_r($result); echo '</pre>';
                }else{
                        $err = $this->nusoap_client->getError();
                        if ($err) {
                      		//echo '<h2>Error</h2><pre>' . $err . '</pre>';
                       	}else{
                      		if (!empty($result)) {
                	               //echo "<pre>"; print_r($result); echo "</pre>";
                                $data['result'] = $result;
                                //echo $result;

                            }else{
                                    $data['nodata'] = 0;
                            }
                       	}
                }
            }
        }
        $id_agen = $this->session->userdata("id_agen");
        $data['transaksi_all'] = $this->MTransaksi->view_all(array('id_agen' => $id_agen));
    $this->load->view('agen/header');
    $this->load->view('agen/pascabayar', $data);
    $this->load->view('agen/footer');
	
	}
	function bayarlistrik(){
		$data[] = 0;
        $post=$_POST;
        $id_agen = $this->session->userdata("id_agen");
        $data['id_pelanggan'] = $post['id_pelanggan'];
        $tagihan = $post['tagihan'];
        $id_tagihan = $post['id_tagihan'];
        $saldoSekarang = $post['saldo'] - $tagihan;
    	$param = array('id_pelanggan' => $post['id_pelanggan']);
		$keterangan = $this->nusoap_client->call('viewbyid_tagihan',$param); 
		$ket = serialize($keterangan); 	
    	$transaksi = array('id_tagihan' => $id_tagihan, 'id_agen' => $id_agen, 'keterangan' => $ket);
    	


        $data['id_agen'] = $this->session->userdata("id_agen");
        $data['jumlah_deposit'] = $this->MDeposit->view_data('agen', array('id_agen' => $data['id_agen']));
        if(!empty($post)){
            // pengecekan error
            $error = $this->nusoap_client->getError();
            if ($error) {
                $data['error'] = '<h2>Constructor error</h2><pre>' . $error . '</pre>';
            }else{
                $param = array('id_pelanggan' => $post['id_pelanggan']);
                $result = $this->nusoap_client->call('bayar_tagihan_listrik',$param);
                       
                if($this->nusoap_client->fault){
                    $data['fault'] = '<h2>Fault (Expect - The request contains an invalid SOAP body)</h2><pre>'; print_r($result); echo '</pre>';
                }else{
                        $err = $this->nusoap_client->getError();
                        if ($err) {
                      		//echo '<h2>Error</h2><pre>' . $err . '</pre>';
                       	}else{
                      		if (!empty($result)) {
                	               //echo "<pre>"; print_r($result); echo "</pre>";
                                $data['bayarlistrik'] = $result;
                                $this->MAgen->updatesaldo($id_agen, $saldoSekarang);
                                $this->MTransaksi->transaksi($transaksi);
                                //echo $result;

                            }else{
                                    echo "Tidak Ada Tagihan";
                            }
                       	}
                }
            }
        }
        $id_agen = $this->session->userdata("id_agen");
        $data['transaksi_all'] = $this->MTransaksi->view_all(array('id_agen' => $id_agen));
    $this->load->view('agen/header');
    $this->load->view('agen/pascabayar', $data);
    $this->load->view('agen/footer');
		
	}
}
?>