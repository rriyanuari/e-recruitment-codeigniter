<?php

    class Model_pemesanan extends CI_Model {

        public function semua(){
            $query = $this->db  ->select('*')
                                ->get('t_pemesanan');
            return $query;
        }

        public function semua_proses(){
          $query = $this->db  ->select('*')
                              ->where('status', 'proses')
                              ->get('t_pemesanan');
          return $query;
        }

        public function where_success_by_tanggal($tanggal1, $tanggal2){
          $query = $this->db  ->select('*')
                              ->from('t_pemesanan a')
                              ->where('a.status', 'success')
                              ->where('a.tanggal_jam >=', $tanggal1)
                              ->where('a.tanggal_jam <=', $tanggal2)
                              ->get();
          return $query;
      }

        public function where_success_by_tanggal_join_pelanggan($tanggal1, $tanggal2){
          $query = $this->db  ->select('*')
                              ->from('t_pemesanan a')
                              ->join('t_pelanggan b', 'b.id_pelanggan=a.id_pelanggan', 'left')
                              ->where('a.status', 'success')
                              ->where('a.tanggal_jam >=', $tanggal1)
                              ->where('a.tanggal_jam <=', $tanggal2)
                              ->get();
          return $query;
        }

        public function semua_join_pelanggan(){
          $this->db->select('*');
          $this->db->from('t_pemesanan a'); 
          $this->db->join('t_pelanggan b', 'b.id_pelanggan=a.id_pelanggan', 'left');
          $query = $this->db->get(); 

          return $query;
        }

        public function by_id($id){
          $query = $this->db  ->select('*')
                              ->where('id_pemesanan', $id)
                              ->get('t_pemesanan');
          return $query;
        }

        public function by_lapangan($lapangan){
          $query = $this->db  ->select('*')
                              ->where('lapangan', $lapangan)
                              ->get('t_pemesanan');
          return $query;
        }

        public function tambah($data, $table){
            $query = $this->db->insert($table, $data);
            if($query){
              return TRUE;
            }
        }

        public function by_pelanggan($pelanggan){
          $query = $this->db  ->select('*')
                              ->where('id_pelanggan', $pelanggan)
                              ->get('t_pemesanan');
          return $query;
        }

        public function by_pelanggan_pending($pelanggan){
          $query = $this->db  ->select('*')
                              ->where('id_pelanggan', $pelanggan)
                              ->where('status', "pending")
                              ->get('t_pemesanan');
          return $query;
        }

        public function hapus_by_id($id){
          $query = $this->db->delete('t_pemesanan', array('id_pemesanan' => $id));
          return $query;
        }

        public function update_by_id($where,$data,$table){
          $query =    $this->db->where($where)
                              ->update($table,$data);
          return $query;
        }	
    }