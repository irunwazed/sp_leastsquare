<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model("model_produk");
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
        $data['produk']=$this->model_produk->tampil_produk($page, $search);
        $data['page'] = $page;
        $data['search'] = $search;
        $data['jumlahPage'] = $this->model_produk->jumlah_page($search);
        $data['batas'] = $this->model_produk->batas_muncul_data();

        $this->model_keamanan->getkeamanan();
        $this->load->view("attribut/header",$data);
        $this->load->view("attribut/sidebar",$data);
        $this->load->view("tampilan_produk",$data);
        $this->load->view("attribut/footer");
    }
#Insert Data
  public function input() {
    #get data
    $data['produk']     = $this->input->post('produk');
    
    #call function input from model
    $this->model_produk->input($data);
    redirect('produk');
  }
  
  #Update Data
  public function edit() {
    $data['id_produk']  = $this->input->post('id_produk');
    $data['produk']     = $this->input->post('produk');
    #call function edit from model
    $this->model_produk->edit($data);
    redirect('produk');
  }
  
  #Delete Data
  public function delete() {
    $this->model_produk->delete($this->input->post('id_produk'));
    redirect('produk');
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
    $data['produk']=$this->model_produk->tampil_produk($page, $search, true);

    $this->model_keamanan->getkeamanan();
 
    //load the pdf_output.php by passing our data and get all data in $html varriable.
    $html = $this->load->view('save_pdf/produk',$data, true); 
   
    //this the the PDF filename that user will get to download
    $pdfFilePath ="produk-".time()."-download.pdf";
 
    
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
