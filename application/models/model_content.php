<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_content extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function TotalProducts()
    {
        $query =  $this->db->count_all('produk');
        return $query;
    }
    public function TotalUser()
    {
        $query =  $this->db->count_all('user');
        return $query;
    }
    public function TotalPenjualan()
    {
        $query =  $this->db->count_all('penjualan');
        return $query;
    }
}
?>