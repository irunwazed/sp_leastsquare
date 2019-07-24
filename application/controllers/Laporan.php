<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct() {
    parent::__construct();
    $this->load->model("model_prediksi");
    $this->load->helper(array('form', 'url'));

  }
	public function index(){
        	
          $data['id_user']=$this->session->userdata('id_user_kategori');
          $data['produk']=$this->model_prediksi->tampil_produk();

          if(@$this->input->get('produk')){
            $data['produk_pilihan']=$this->model_prediksi->tampil_produk_pilihan($this->input->get('produk'));
          }

          $this->model_keamanan->getkeamanan();
          $this->load->view("attribut/header",$data);
        	$this->load->view("tampilan_laporan",$data);
        	$this->load->view("attribut/sidebar",$data);
        	$this->load->view("attribut/footer");
        
    }

	
}
