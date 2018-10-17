<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{

  private $table = 'jadwal';

  public function get_data($id_jadwal = '', $columns = "", $limit = '', $start = '')
  {
    if (empty($columns)) {
      $this->db->select('*');
    } else {
      $this->db->select($columns);
    }
    $this->db->from($this->table);
    if ($id_jadwal != null) {
      $this->db->where('id_jadwal', $id_jadwal);
    }
    if ($limit != null && $start != null) {
      $this->db->limit($limit, $start);
    }
    if ($id_jadwal != null) {
      return $this->db->get()->row_array();
    } else {
      return $this->db->get()->result_array();
    }
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function count()
  {
    return $this->db->count_all_results($this->table);
  }

}

/* End of file Jadwal_model.php */
