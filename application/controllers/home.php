<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
    parent::__construct();
    $this->load->model("model_content");
    $this->load->model("model_keamanan");

  }
	public function index(){
        	
          $this->model_keamanan->getkeamanan();
          $data['id_user']=$this->session->userdata('id_user_kategori');
          $data['produk'] = $this->model_content->TotalProducts();
      		$data['user'] = $this->model_content->TotalUser();
      		$data['penjualan'] = $this->model_content->TotalPenjualan();
          $this->load->view("attribut/header",$data);
        	$this->load->view("attribut/content",$data);
        	$this->load->view("attribut/sidebar",$data);
        	$this->load->view("attribut/footer");
        
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	
}
