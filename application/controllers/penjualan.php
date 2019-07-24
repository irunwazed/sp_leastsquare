<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model("model_penjualan");
        $this->load->helper(array('form', 'url'));

    }

    public function index($page = 1)
	{
        if(@$this->input->get('search')){
          $search = $this->input->get('search');
        }else{
          $search = '';
        }   
        $data['id_user']=$this->session->userdata('id_user_kategori');
        $data['penjualan']=$this->model_penjualan->tampil_penjualan();
        $data['penjualan1']=$this->model_penjualan->tampil_penjualan1($page, $search);
        $data['produk']=$this->model_penjualan->tampil_produk();
        $data['bulan']=$this->model_penjualan->tampil_bulan();
        $data['tahun']=$this->model_penjualan->tampil_tahun();

        $data['page'] = $page;
        $data['search'] = $search;
        $data['jumlahPage'] = $this->model_penjualan->jumlah_page($search);
        $data['batas'] = $this->model_penjualan->batas_muncul_data();
        
        $this->model_keamanan->getkeamanan();
        $this->load->view("attribut/header",$data);
        $this->load->view("attribut/sidebar",$data);
        $this->load->view("tampilan_penjualan",$data);
        $this->load->view("attribut/footer");
    }
#Insert Data
  public function input() {
    #get data
    $data['id_produk']     = $this->input->post('id_produk');
    $data['id_bulan']     = $this->input->post('id_bulan');
    $data['id_tahun']     = $this->input->post('id_tahun');
    $data['penjualan_produk']     = $this->input->post('penjualan_produk');
    
    #call function input from model
    $this->model_penjualan->input($data);
    redirect('penjualan');
  }
  
  #Update Data
  public function edit() {
    $data['id_penjualan']     = $this->input->post('id_penjualan');
    $data['id_produk']     = $this->input->post('id_produk');
    $data['id_bulan']     = $this->input->post('id_bulan');
    $data['id_tahun']     = $this->input->post('id_tahun');
    $data['penjualan_produk']     = $this->input->post('penjualan_produk');
    #call function edit from model
    $this->model_penjualan->edit($data);
    redirect('penjualan');
  }
  
  #Delete Data
  public function delete() {
    $this->model_penjualan->delete($this->input->post('id_penjualan'));
    redirect('penjualan');
  }

  #save to pdf
  public function save($page = 1)
  { 
    //load mPDF library
    $this->load->library('m_pdf');

    #pencarian
    if(@$this->input->get('search')){
      $search = $this->input->get('search');
    }else{
      $search = '';
    }
    
    #load data
    $data['penjualan']=$this->model_penjualan->tampil_penjualan1($page, $search, true);

    $this->model_keamanan->getkeamanan();
 
    //load the pdf_output.php by passing our data and get all data in $html varriable.
    $html = $this->load->view('save_pdf/penjualan',$data, true); 
   
    //this the the PDF filename that user will get to download
    $pdfFilePath ="penjualan-".time()."-download.pdf";
 
    
    //actually, you can pass mPDF parameter on this load() function
    $pdf = $this->m_pdf->load();

    $pdf->AddPage('', // L - landscape, P - portrait 
        '', '', '', '',
        10, // margin_left
        10, // margin right
       20, // margin top
       20, // margin bottom
        0, // margin header
        0
    );

    //generate the PDF!
    $pdf->WriteHTML($html,2);

    //offer it to user via browser download! (The PDF won't be saved on your server HDD)
    $pdf->Output($pdfFilePath, "D");
     
      
  }
  
	
}
