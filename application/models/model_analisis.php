<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_analisis extends CI_model {
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

}
