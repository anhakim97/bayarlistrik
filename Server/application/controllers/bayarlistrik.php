<?php 

if(! defined("BASEPATH")) exit("No direct script access allowed");

class bayarlistrik extends CI_Controller {
    
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


          //viewbyid tagihan
        $input_viewbyid_tagihan = array('id_pelanggan' => 'xsd:string');
        $return_viewbyid_tagihan = array('hasil' => 'xsd:Array');
        $this->nusoap_server->register(
          'viewbyid_tagihan',
          $input_viewbyid_tagihan,
          $return_viewbyid_tagihan,
          $ns,
          "urn:".$ns."viewbyid_tagihan",
          "rpc",
          "encoded",
          "Melihat informasi tagihan berdasarkan id");
    
    //bayar_tagihan_listrik
        $input_bayar_tagihan_listrik = array('id_pelanggan' => 'xsd:string');
        $return_bayar_tagihan_listrik = array('hasil' => 'xsd:string');
        $this->nusoap_server->register(
          'bayar_tagihan_listrik',
          $input_bayar_tagihan_listrik,
          $return_bayar_tagihan_listrik,
          $ns,
          "urn:".$ns."bayar_tagihan_listrik",
          "rpc",
          "encoded",
          "operasi update data + bayar listrik pelanggan");

     }
   public function index(){

       function penjumlahan($a,$b){
       $c = $a + $b;
       return $c;
      }
      function viewbyid_tagihan($id){
        $ci =&get_instance();
        $result = $ci->Mtagihan->cekTagihan($id);

        foreach($result as $row => $value){
          $return_value[] = array(
            'id_tagihan' => $value->id_tagihan,
            'id_pelanggan' => $value->id_pelanggan,
            'bulan' => $value->bulan,
            'jumlah_tagihan' => $value->jumlah_tagihan,
            'status' => $value->status,
            'nama_pelanggan' => $value->nama_pelanggan,
            'alamat' => $value->alamat,
            'daya_listrik' => $value->daya_listrik,
            'tanggal_bayar' => $value->tanggal_bayar
          );
        }
        return $return_value;
      }

      function bayar_tagihan_listrik($id){
        $ci =&get_instance();
        $result = $ci->Mtagihan->bayarTagihan($id);
        return $return_value = "sukses";
      }
    $this->nusoap_server->service(file_get_contents("php://input"));

}
}
?>
