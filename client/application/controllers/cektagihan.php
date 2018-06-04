<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cektagihan extends CI_Controller {

	public function index()
	{
		$data['info'] = 'info';
		$idpelanggan = $this->input->post('idpelanggan');
		require_once APPPATH. 'libraries/lib/nusoap.php';
		$client = new nusoap_client('http://localhost/bayarlistrik/server/index.php/bayarlistrik?wsdl');
		$error = $client->getError();
			if($error){
				echo $error;
			}
		$res = $client->call("cekTagihan", array( 'id_pelanggan' => $idpelanggan));	

						if($client->fault){
							echo $client->fault;
						}else{
							$data['hasil'] = $res;
							echo '<pre>'.$res.'</pre>';


						}

		$this->load->view('cektagihan', $data);
		}
		public function cekpelanggan($idpelanggan)
	{
		require_once APPPATH. 'libraries/lib/nusoap.php';
		$client = new nusoap_client('http://localhost/bayarlistrik/server/index.php/bayarlistrik?wsdl');
		$error = $client->getError();
			if($error){
				echo $error;
			}
		$res = $client->call("cekPelanggan", array( 'id_pelanggan' => $idpelanggan));	

						if($client->fault){
							echo $client->fault;
						}else{
							$data['hasil'] = $res;
							echo '<pre>'.$res.'</pre>';
							$this->load->view('cekpelanggan', $data);

						}

		
		}
}
