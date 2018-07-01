<?php 

if(! defined("BASEPATH")) exit("No direct script access allowed");

class Bayarlistrik extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Mtagihan');
        $ns = 'http://'.$_SERVER['HTTP_HOST'].'bayarlistrik/server/index.php/bayarlistrik/';
        $this->load->library("Nusoap_library"); 
        $this->nusoap_server = new soap_server(); 
        $this->nusoap_server->configureWSDL("Server SOAP BayarListik.com", $ns);
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns;

          $this->nusoap_server->register('getTransaksi',
                array('id_transaksi' => 'xsd:int', 'id_tagihan' => 'xsd:int'),
                array('return' =>'xsd:string'),
                $ns,
                "urn:".$ns."getTransaksi",
                "rpc",
                "encoded",
                "Melihat data transaksi"
            );

          $this->nusoap_server->register('cekTagihan',
                array('id_tagihan' => 'xsd:int'),
                array('return' =>'xsd:string'),
                $ns,
                "urn:".$ns."cekTagihan",
                "rpc",
                "encoded",
                "Cek Tagihan "
            );
          $this->nusoap_server->register('cekPElanggan',
                array('id_tagihan' => 'xsd:int'),
                array('return' =>'xsd:string'),
                $ns,
                "urn:".$ns."cekPElanggan",
                "rpc",
                "encoded",
                "Cek PElanggan "
            );
  

    }

    public function index(){
        function getTransaksi($id_transaksi, $id_tagihan){
            $res = array(
                'id_transaksi' => $id_transaksi,
                'id_tagihan' => $id_tagihan,
            );
            $req = $id_transaksi + $id_tagihan;
            return $req;
            //return json_encode($res);

        }

        function cektagihan($id_pelanggan){
            $result = $this->MTagihan->cekTagihan(array('id_pelanggan' => $id_pelanggan));
            foreach($result as $row => $value){                 
                $return_value[] = array(
                    'id_tagihan'=> $value->id_tagihan,
                    'id_pelanggan'=> $value->id_pelanggan,
                    'bulan'=> $value->bulan,
                    'jumlah_tagihan'=> $value->jumlah_tagihan,
                    'status'=> $value->status
                );
                return $return_value;
    }
    function cekpelanggan($id_pelanggan){
            $result = $this->MTagihan->cekPelanggan(array('id_pelanggan' => $id_pelanggan));
            foreach($result as $row => $value){
            $return_value[] = array(                 
                    'id_pelanggan'=> $value->id_pelanggan,
                    'nama'=> $value->nama,
                    'alamat'=> $value->alamat
                );
                return $return_value;
    }
    function pelanggan(){
            $result = $this->MTagihan->pelanggan();
            foreach($result as $row => $value){  
            $return_value[] = array(               
                    'id_pelanggan'=> $value->id_pelanggan,
                    'nama'=> $value->nama,
                    'alamat'=> $value->alamat
                );
                return $return_value;
    }
    
    return $return_value;
        }


     $this->nusoap_server->service(file_get_contents("php://input"));

    }


    }
?>
