<?php 

if(! defined("BASEPATH")) exit("No direct script access allowed");

class Pelangan extends CI_Controller {
    private $api_url = 'http://localhost/bayarlistrik/server/index.php/bayarlistrik';
    
    function __construct(){
        parent::__construct();
        
        // load nusoap toolkit library in controller
        $this->load->library("Nusoap_library");
        
        // create soap server object
        $this->nusoap_client = new nusoap_client($this->api_url.'?wsdl', 'wsdl'); 
    }
    
    function index(){
        
        $error = $this->nusoap_client->getError();
        
        if ($error) {
        	echo '<h2>Constructor error</h2><pre>' . $error . '</pre>';
        }else{
            $param = '';
           	$result = $this->nusoap_client->call('pelanggan',$param);
            
            if($this->nusoap_client->fault){
                echo '<h2>Fault (Expect - The request contains an invalid SOAP body)</h2><pre>'; print_r($result); echo '</pre>';
            }else{
                $err = $this->nusoap_client->getError();
                if ($err) {
              		echo '<h2>Error</h2><pre>' . $err . '</pre>';
               	}else{
              		if (!empty($result)) {
        	               echo "<pre>"; print_r($result); echo "</pre>";
                           echo "hai";
                    }else{
                            echo "Data is empty";
                    }
               	}
            }
        }
    }
}
?>
