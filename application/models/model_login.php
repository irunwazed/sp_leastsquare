<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_model {

	public function getlogin($u,$p,$ktg)
	{
		$pwd = md5($p);
		$this->db->where('username',$u);
		$this->db->where('password',$pwd);
		$this->db->where('id_user_kategori',$ktg);
		$query = $this->db->get('user');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$sess = array('username' => $row->username,
							  'nama_lengkap' => $row->nama_lengkap,
							  'email' => $row->email,
							  'id_user_kategori' => $row->id_user_kategori);
				$this->session->set_userdata($sess);
				redirect('home');
			}
		}
		else
		{
			$this->session->set_flashdata('info', ' Maaf Username, Password atau Kategori Salah ');
			redirect('login');		}


	}

}
