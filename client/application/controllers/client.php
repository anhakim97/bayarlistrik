<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function index(){
		require_once APPPATH. 'libraries/lib/nusoap.php';
		$client = new nusoap_client('http://localhost/bayarlistrik/server/index.php/bayarlistrik?wsdl');
		$error = $client->getError();
			if($error){
				echo $error;
			}
		$res = $client->call("getTransaksi", array(
			'id_transaksi' => 10, 
			'id_tagihan' => 110));	
		$req = $client->call("getTransaksi", array(
			'id_transaksi' => 10, 
			'id_tagihan' => 110));

						if($client->fault){
							echo $client->fault;
						}else{
							//echo $data = json_encode($res);
							//var_dump($data);
							echo $req;

						}

		}
	}

?>