<?php 

if(! defined("BASEPATH")) exit("No direct script access allowed");

class Serversoap extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        //load M_agen model
        $this->load->model(array('m_agen'));

        $ns = 'http://'.$_SERVER['HTTP_HOST'].'bayarlistrik.com/server/index.php/serversoap/';
        
        // load nusoap toolkit library in controller
        $this->load->library("Nusoap_library"); 
          
        // create soap server object
        $this->nusoap_server = new soap_server(); 
        
        // wsdl configuration
        $this->nusoap_server->configureWSDL("Server SOAP BayarListik.com", $ns);
        
        // server namespace
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns;

        $this->nusoap_server->wsdl->addComplexType("kategoriData","complexType","struct","all","",
    array(
    "id_agen"=>array("name"=>"id_agen","type"=>"xsd:string"),
    )
  );
        
  $this->nusoap_server->wsdl->addComplexType("kategoriArray","complexType","array","","SOAP-ENC:Array",
    array(),
    array(
      array(
        "ref"=>"SOAP-ENC:arrayType",
        "wsdl:arrayType"=>"tns:kategoriData[]"
      )
    ),
    "kategoriData"
  );

  //viewbyid tiket pesawat
  $input_viewbyid_agen = array('id_agen' => "xsd:string");
  $return_viewbyid_agen = array("return" => "tns:kategoriArray");
  $this->nusoap_server->register('viewbyid_agen',
    $input_viewbyid_agen,
    $return_viewbyid_agen,
    $ns,
    "urn:".$ns."viewbyid_agen",
    "rpc",
    "encoded",
    "Melihat Agen Berdasarkan ID");

  //update saldo agen
  $input_update_saldo = array('id_agen' => "xsd:string","saldo"=>"xsd:int"); // parameter update kategori
  $return_update_saldo = array("return" => "xsd:string");
  $this->nusoap_server->register('updatebyid_saldo',
    $input_update_saldo,
    $return_update_saldo,
    $ns,
    "urn:".$ns."updatebyid_saldo",
    "rpc",
    "encoded",
    "Mengupdate Saldo Agen Berdasarkan ID");

  //Hapus Tiket Pesawat
  $input_delete_agen = array('id_agen' => "xsd:string");
  $return_delete_agen = array("return" => "xsd:string");
  $this->nusoap_server->register('deletebyid_agen',
    $input_delete_agen,
    $return_delete_agen,
    $ns,
    "urn:".$ns."deletebyid",
    "rpc",
    "encoded",
    "Menghapus Tiket Berdasarkan ID");


$this->nusoap_server->register(
    'agen',                          // method name
    array('input' => 'xsd:string'),    // input parameters
    array('output' => 'xsd:Array'),    // output parameters
    'urn:SOAPServerWSDL',              // namespace
    'urn:'.$ns.'agen',               // soapaction
    'rpc',                             // style
    'encoded',                         // use
    'Daftar agen'                    // documentation
);
    $input_array_login = array ('a' => "xsd:string", 'b' => "xsd:string"); 

    //nilai kembalian beserta tipe datanya
    $return_array = array ("hasil" => "xsd:string");

    //proses registrasi fungsi login
    $this->nusoap_server->register(
        'agenlogin',                  // method name
        $input_array,                   // input parameters
        $return_array,                  // output parameters    
        "urn:SOAPServerWSDL",           // namespace
        "urn:".$ns."penjumlahan",       // soap action
        "rpc",                          // style
        "encoded",                      // use
        "fungsi login"         // documentation 
    );


    }
public function index(){

   function penjumlahan($a,$b){
       $c = $a + $b;
       return $c;
   }

   // read raw data from request body
   
   function agen() {
    $ci =&get_instance();
    $result = $ci->m_agen->getAgen();

    foreach($result as $row => $value){                 
        $return_value[] = array(
            'id_agen' => $value->id_agen,
            'nama'=> $value->nama,
            'username'=> $value->username,
            'email'=> $value->email,
            'saldo' => $value->saldo,
        );
    }
    
    return $return_value;
    }

    function login($a, $b){
        // $username = $a;
        // $password = $b;
        // $where = array(
        //   'username' => $username,
        //   'password' => $password
        //   );
        // $cek = $this->m_agen->cek_login("agen",$where)->num_rows();
        // $agen = $this->m_agen->cek_login("agen",$where)->row();
        // if($cek > 0){
        //   $data_session[] = array(
        //     'id_agen' => $agen->id_agen,
        //     'nama' => $agen->nama,
        //     'username' => $username,
        //     'status' => "login"
        //     );

        //   return $data_session;
      echo $a.$b;

    }

 $this->nusoap_server->service(file_get_contents("php://input"));

}


    }
?>
