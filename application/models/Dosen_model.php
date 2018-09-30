<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
  private $table = 'dosen';

  public function get_data($nid = '', $columns = '', $limit = '', $start = '')
  {
    if (sizeof($columns) === 0) {
      $this->db->select('*');
    } else {
      $this->db->select($columns);
    }
    $this->db->from($this->table);
    if ($nid != null) {
      $this->db->where('nid', $nid);
    }
    if ($limit != null && $start != null) {
      $this->db->limit($limit, $start);
    }
    if ($nid != null) {
      return $this->db->get()->row_array();
    } else {
      return $this->db->get()->result_array();
    }
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function update($nid, $data)
  {
    $this->db->where('nid', $nid);
    $this->db->update($this->table, $data);
  }

  public function count()
  {
    return $this->db->count_all_results($this->table);
  }

}

/* End of file Dosen_model.php */
