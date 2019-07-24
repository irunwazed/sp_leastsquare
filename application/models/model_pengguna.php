<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengguna extends CI_model {

    private $jumlah;
	function __construct() {
        parent::__construct();
        $this->jumlah = 10;
    }


    public function input($data) {
        $this->db->insert('user', $data);
    }

    public function fetch_countries($limit, $start) {
            $this->db->limit($limit, $start);
            $query = $this->db->get("user");

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
       }

    public function tampil_user() {
        $query  = $this->db->query("select * from user");
        return $query->result();
    }
    public function tampil_user_kategori() {
        $query  = $this->db->query("select * from user_kategori");
        return $query->result();
    }   

	public function tampil_user1($page = 1, $search = '', $print = false) {

        $jumlah = $this->jumlah;
        $awal = ($page-1)*$jumlah;
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_kategori', 'user_kategori.id_user_kategori = user.id_user_kategori');
        
        if(!$print){
            $this->db->limit($jumlah,$awal);
        }

        $query = $this->db->get();
        return $query->result();
    }

   public function jumlah_page($search = ''){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_kategori', 'user_kategori.id_user_kategori = user.id_user_kategori');

        $query  = $this->db->get();
        $jumlah_data = count($query->result());
        $jumlah_page = ceil($jumlah_data/$this->jumlah);
        return $jumlah_page;
    }

    public function batas_muncul_data(){
        return $this->jumlah;
    }


	public function edit($data) {
        $this->db->update('user', $data, array('id_user'=>$data['id_user']));
    }

    public function delete($id) {
        $this->db->delete('user', array('id_user' => $id));
    }

}
