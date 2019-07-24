<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_model {

    private $jumlah;
	function __construct() {
        parent::__construct();
        $this->jumlah = 10;
    }


    public function input($data) {
        $this->db->insert('produk', $data);
    }

    public function TotalProducts()
    {
        $query =  $this->db->count_all('produk');
        return $query;
    }


    public function fetch_countries($limit, $start) {
            $this->db->limit($limit, $start);
            $query = $this->db->get("produk");

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
       }

	public function tampil_produk($page = 1, $search = '', $print = false) {
        $jumlah = $this->jumlah;
        $awal = ($page-1)*$jumlah;
        if($print){
            $query  = $this->db->query("select * from produk where produk like '%$search%'");
        }else{
            $query  = $this->db->query("select * from produk where produk like '%$search%' limit $awal,$jumlah");
        }
        
        return $query->result();
    }

    public function jumlah_page($search = ''){
        $query  = $this->db->query("select * from produk where produk like '%$search%'");
        $jumlah_data = count($query->result());
        $jumlah_page = ceil($jumlah_data/$this->jumlah);
        return $jumlah_page;
    }

    public function batas_muncul_data(){
        return $this->jumlah;
    }


	public function edit($data) {
        $this->db->update('produk', $data, array('id_produk'=>$data['id_produk']));
    }

    public function delete($id) {
        $this->db->delete('produk', array('id_produk' => $id));
    }

}
