<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penjualan extends CI_model {

    private $jumlah;
	function __construct() {
        parent::__construct();
        $this->jumlah = 10;
    }


    public function input($data) {
        $this->db->insert('penjualan', $data);
    }

    public function fetch_countries($limit, $start) {
            $this->db->limit($limit, $start);
            $query = $this->db->get("penjualan");

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
       }

	public function tampil_penjualan() {
        $query  = $this->db->query("select * from penjualan");
        return $query->result();
    }
    public function tampil_produk() {
        $query  = $this->db->query("select * from produk");
        return $query->result();
    }
    public function tampil_bulan() {
        $query  = $this->db->query("select * from bulan");
        return $query->result();
    }
    public function tampil_tahun() {
        $query  = $this->db->query("select * from tahun");
        return $query->result();
    }

    public function tampil_penjualan1($page = 1, $search = '', $print = false) {

        $jumlah = $this->jumlah;
        $awal = ($page-1)*$jumlah;
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'produk.id_produk = penjualan.id_produk');
        $this->db->join('bulan', 'bulan.id_bulan = penjualan.id_bulan');
        $this->db->join('tahun', 'tahun.id_tahun = penjualan.id_tahun');
        $this->db->or_like('produk.produk', $search);
        $this->db->or_like('bulan.bulan', $search);
        $this->db->or_like('tahun.tahun', $search);
        $this->db->or_like('penjualan.penjualan_produk', $search);
        
        if(!$print){
            $this->db->limit($jumlah,$awal);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function jumlah_page($search = ''){
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'produk.id_produk = penjualan.id_produk');
        $this->db->join('bulan', 'bulan.id_bulan = penjualan.id_bulan');
        $this->db->join('tahun', 'tahun.id_tahun = penjualan.id_tahun');
        $this->db->or_like('produk.produk', $search);
        $this->db->or_like('bulan.bulan', $search);
        $this->db->or_like('tahun.tahun', $search);
        $this->db->or_like('penjualan.penjualan_produk', $search);

        $query  = $this->db->get();
        $jumlah_data = count($query->result());
        $jumlah_page = ceil($jumlah_data/$this->jumlah);
        return $jumlah_page;
    }

    public function batas_muncul_data(){
        return $this->jumlah;
    }



	public function edit($data) {
        $this->db->update('penjualan', $data, array('id_penjualan'=>$data['id_penjualan']));
    }

    public function delete($id) {
        $this->db->delete('penjualan', array('id_penjualan' => $id));
    }


	

}
