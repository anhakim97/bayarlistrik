<?php 

if(! defined("BASEPATH")) exit("No direct script access allowed");

class Serversoap extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        //load M_produk model
        $this->load->model(array('Mtagihan'));
        $ns = 'http://'.$_SERVER['HTTP_HOST'].'/bayarlistrik/server/index.php/serversoap/';
        // load nusoap toolkit library in controller
        $this->load->library("Nusoap_library");  
        // create soap server object
        $this->nusoap_server = new soap_server(); 
        // wsdl configuration
        $this->nusoap_server->configureWSDL("Membuat Server SOAP", $ns);
        // server namespace
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns;
        $this->nusoap_server->wsdl->addComplexType("kategoriData","complexType","struct","all","",
    array(
    "id_pelanggan"=>array("name"=>"id_pelanggan","type"=>"xsd:string"),
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

  //viewbyid pelanggan
  $input_viewbyid_pelanggan = array('id_pelanggan' => "xsd:string");
  $return_viewbyid_pelanggan = array("return" => "xsd:string");
  $this->nusoap_server->register('viewbyid_pelanggan',
    $input_viewbyid_pelanggan,
    $return_viewbyid_pelanggan,
    $ns,
    "urn:".$ns."viewbyid",
    "rpc",
    "encoded",
    "Melihat informasi pelanggan berdasarkan id");
    //viewbyid tagihan
  $input_viewbyid_tagihan = array('id_tagihan' => "xsd:string");
  $return_viewbyid_tagihan = array("return" => "xsd:string");
  $this->nusoap_server->register('viewbyid_tagihan',
    $input_viewbyid_tagihan,
    $return_viewbyid_tagihan,
    $ns,
    "urn:".$ns."viewbyid",
    "rpc",
    "encoded",
    "Melihat informasi tagihan berdasarkan id");

//parameter pada fungsi penjumlahan berserta tipe datanya
$input_array = array ('a' => "xsd:string", 'b' => "xsd:string"); 

//nilai kembalian beserta tipe datanya
$return_array = array ("hasil" => "xsd:string");

$this->nusoap_server->register(
    'produk',                          // method name
    array('input' => 'xsd:string'),    // input parameters
    array('output' => 'xsd:Array'),    // output parameters
    'urn:SOAPServerWSDL',              // namespace
    'urn:'.$ns.'produk',               // soapaction
    'rpc',                             // style
    'encoded',                         // use
    'Daftar Produk'                    // documentation
);


    }
public function index(){
   function penjumlahan($a,$b){
       $c = $a + $b;
       return $c;
   }
   // read raw data from request body
   
    function viewbyid_tagihan($id){
        
    }
 $this->nusoap_server->service(file_get_contents("php://input"));

}


    }
?>
