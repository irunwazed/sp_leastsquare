<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prediksi extends CI_Controller {
	function __construct() {
    parent::__construct();
    $this->load->model("model_prediksi");
    $this->load->helper(array('form', 'url'));
    $this->load->library('LeastSquare');

  }
	public function index(){
        	
          $data['id_user']=$this->session->userdata('id_user_kategori');
          $data['produk']=$this->model_prediksi->tampil_produk();
          $data['tahun']=$this->model_prediksi->tampil_tahun();
          
          for($i = 0; $i < count($data['produk']); $i++){
            $data['produkX'][$i]=$this->model_prediksi->jumlah_produk_per_bulan($data['produk'][$i]->id_produk,1);
          }
          
          $this->model_keamanan->getkeamanan();
          $this->load->view("attribut/header",$data);
        	$this->load->view("tampilan_prediksi",$data);
        	$this->load->view("attribut/sidebar",$data);
        	$this->load->view("attribut/footer");
        
    }

	
}
