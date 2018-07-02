<?php 

if(! defined("BASEPATH")) exit("No direct script access allowed");

class Cektagihan extends CI_Controller {
    private $api_url = 'http://localhost/bayarlistrik/server/index.php/bayarlistrik'; 
    function __construct(){
        parent::__construct();
        $this->load->library("Nusoap_library");
        $this->nusoap_client = new nusoap_client($this->api_url.'?wsdl', 'wsdl'); 
    }
    function index(){
        $data[] = 0;
        $post=$_POST;
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
                      		echo '<h2>Error</h2><pre>' . $err . '</pre>';
                       	}else{
                      		if (!empty($result)) {
                	               //echo "<pre>"; print_r($result); echo "</pre>";
                                $data['result'] = $result;
                                //echo $result;

                            }else{
                                    echo "Tidak Ada Tagihan";
                            }
                       	}
                }
             }
        }
    $this->load->view('cektagihan', $data);
	}

    

}

?>
