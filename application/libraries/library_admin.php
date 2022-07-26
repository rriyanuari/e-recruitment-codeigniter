<?php

  class Library_admin{

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    function get_alamat($id_alamat)
    {
      $this->CI->load->model(['Model_customer']);
      
      $provinsi = $this->CI->Model_customer->provinsi(substr($id_alamat,-10,-8))->row_array();
      $provinsi = strtolower($provinsi['nama']); $provinsi = ucwords($provinsi);
  
      $kota = $this->CI->Model_customer->kota(substr($id_alamat,-10,-6))->row_array();
      $kota = strtolower($kota['nama']); $kota = ucwords($kota);  
      
      $kecamatan = $this->CI->Model_customer->kecamatan(substr($id_alamat,-10,-4))->row_array();
      $kecamatan = strtolower($kecamatan['nama']); $kecamatan = ucwords($kecamatan);
      
      $kelurahan = $this->CI->Model_customer->kelurahan($id_alamat)->row_array();
      $kelurahan = strtolower($kelurahan['nama']); $kelurahan = ucwords($kelurahan);
      
      return "Kel. ".$kelurahan.", Kec. ".$kecamatan.", ".$kota." - ".$provinsi;
    }    

  }

?>