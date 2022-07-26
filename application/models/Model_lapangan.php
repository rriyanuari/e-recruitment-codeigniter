<?php

  class Model_lapangan extends CI_Model {

      public function semua(){
          $query = $this->db  ->select('*')
                              ->get('t_lapangan');
          return $query;
      }

      public function by_id($id){
        $query = $this->db  ->select('*')
                            ->where('id_lapangan', $id)
                            ->get('t_lapangan');
        return $query;
      }

      public function by_lapangan($lapangan){
        $query = $this->db  ->select('*')
                            ->where('lapangan', $lapangan)
                            ->get('t_lapangan');
        return $query;
      }

      public function tambah($data, $table){
        $query = $this->db->insert($table, $data);
        return $query;
        }

      public function hapus_by_id($id){
        $query = $this->db->delete('t_lapangan', array('id_lapangan' => $id));
        return $query;
      }

      public function update_by_id($where,$data,$table){
        $query =    $this->db->where($where)
                            ->update($table,$data);
        return $query;
    }	
    }