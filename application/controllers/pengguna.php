<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model("model_pengguna");
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
        $data['user']=$this->model_pengguna->tampil_user();
        $data['pengguna']=$this->model_pengguna->tampil_user1($page, $search);
        $data['user_kategori']=$this->model_pengguna->tampil_user_kategori();

        $data['page'] = $page;
        $data['search'] = $search;
        $data['jumlahPage'] = $this->model_pengguna->jumlah_page($search);
        $data['batas'] = $this->model_pengguna->batas_muncul_data();

        $this->model_keamanan->getkeamanan();
        $this->load->view("attribut/header",$data);
        $this->load->view("attribut/sidebar",$data);
        $this->load->view("tampilan_pengguna",$data);
        $this->load->view("attribut/footer");
    }

  #Insert Data
  public function input() {
    #get data
    $data['id_user']      = "";
    $data['username']     = $this->input->post('username');
    $data['password']     = md5($this->input->post('password'));
    $data['nama_lengkap'] = $this->input->post('nama_lengkap');
    $data['email']        = $this->input->post('email');
    $data['id_user_kategori']= $this->input->post('id_user_kategori');
    $this->model_pengguna->input($data);
    #redirect to page
    redirect('pengguna');
  }

  #Update Data
  public function edit() {
    $data['id_user']            = $this->input->post('id_user');
         $data['username']      = $this->input->post('username');
         $data['password']      = md5($this->input->post('password'));
         $data['nama_lengkap']  = $this->input->post('nama_lengkap');
         $data['email']         = $this->input->post('email');
         $data['id_user_kategori']= $this->input->post('id_user_kategori');
        //call function
       $this->model_pengguna->edit($data);
       //redirect to page
       redirect('pengguna');
  }

  #Delete Data
  public function delete() {
    $this->model_pengguna->delete($this->input->post('id_user'));
    redirect('pengguna');
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
    $data['pengguna']=$this->model_pengguna->tampil_user($page, $search, true);
 
    //load the pdf_output.php by passing our data and get all data in $html varriable.
    $html = $this->load->view('save_pdf/pengguna',$data, true); 
   
    //this the the PDF filename that user will get to download
    $pdfFilePath ="pengguna-".time()."-download.pdf";
 
    
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
