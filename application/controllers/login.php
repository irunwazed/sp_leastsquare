<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('tampilan_login');
	}

	public function getlogin(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$ktg = $this->input->post('id_user_kategori');
		$this->load->model('model_login');
		$this->model_login->getlogin($u,$p,$ktg);
	}
}
