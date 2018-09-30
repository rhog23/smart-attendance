<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

  private $table = 'mahasiswa';

  public function get_data($nim = '', $columns = "", $limit = '', $start = '')
  {
    if (sizeof($columns) === 0) {
      $this->db->select('*');
    } else {
      $this->db->select($columns);
    }
    $this->db->from($this->table);
    if ($nim != null) {
      $this->db->where('nim', $nim);
    }
    if ($limit != null && $start != null) {
      $this->db->limit($limit, $start);
    }
    if ($nim != null) {
      return $this->db->get()->row_array();
    } else {
      return $this->db->get()->result_array();
    }
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function update($nim, $data)
  {
    $this->db->where('nim', $nim);
    $this->db->update($this->table, $data);
  }

  public function count()
  {
    return $this->db->count_all_results($this->table);
  }

}

/* End of file Mahasiswa_model.php */
