<?php

  class Model_pelanggan extends CI_Model {

      public function semua(){
          $query = $this->db  ->select('*')
                              ->get('t_pelanggan');
          return $query;
      }

      public function by_id($id){
        $query = $this->db  ->select('*')
                            ->where('id_pelanggan', $id)
                            ->get('t_pelanggan');
        return $query;
      }

      public function by_user($user){
        $query = $this->db  ->select('*')
                            ->where('pelanggan', $user)
                            ->get('t_pelanggan');
        return $query;
      }

      public function semua_join_user_by_id($id){
        $this->db->select('*');
        $this->db->from('t_pelanggan a'); 
        $this->db->join('t_user b', 'b.username=a.pelanggan', 'left');
        $this->db->where('a.id_pelanggan',$id);
        $query = $this->db->get(); 

        return $query;
      }

      public function tambah($data, $table){
        $query = $this->db->insert($table, $data);
        return $query;
        }

      public function hapus_by_id($id){
        $query = $this->db->delete('t_pelanggan', array('id_pelanggan' => $id));
        return $query;
      }

      public function update_by_id($where,$data,$table){
        $query =    $this->db->where($where)
                            ->update($table,$data);
        return $query;
      }	
    }