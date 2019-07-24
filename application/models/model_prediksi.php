<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_prediksi extends CI_model {
	function __construct() {
        parent::__construct();
    }
    public function tampil_produk() {
        $query  = $this->db->query("select * from produk");
        return $query->result();
    }
    public function tampil_tahun() {
        $query  = $this->db->query("select * from tahun");
        return $query->result();
    }

    public function jumlah_produk_per_bulan($produk, $tahun = 1){
        
        $query  = $this->db->query("SELECT pro.id_produk, pro.produk, SUM(p.penjualan_produk) as jumlah FROM penjualan p, produk pro WHERE p.`id_produk` = pro.id_produk AND `id_tahun`  = ".$tahun." AND pro.`id_produk` = ".$produk." GROUP BY `id_bulan`");
        return $query->result();
    }

}
