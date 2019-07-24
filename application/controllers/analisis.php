<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends CI_Controller {
	function __construct() {
    parent::__construct();
    $this->load->model("model_analisis");
    $this->load->model("model_prediksi");
    $this->load->helper(array('form', 'url'));
    $this->load->library('LeastSquare');

  }
	public function index(){
        	
          $data['id_user']=$this->session->userdata('id_user_kategori');
          $data['produk']=$this->model_analisis->tampil_produk();
          $data['tahun']=$this->model_analisis->tampil_tahun();

          $get = $this->input->get();
          // print_r($get);
          if(@$get['tombol']){
            $data['produkX']=$this->model_prediksi->jumlah_produk_per_bulan(@$get['produkX'],@$get['tahun']);
            $data['produkY']=$this->model_prediksi->jumlah_produk_per_bulan(@$get['produkY'],@$get['tahun']);
          }

          $this->model_keamanan->getkeamanan();
          $this->load->view("attribut/header",$data);
        	$this->load->view("tampilan_analisis",$data);
        	$this->load->view("attribut/sidebar",$data);
        	$this->load->view("attribut/footer");
        
    }

	
}
