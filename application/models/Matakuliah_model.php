<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah_model extends CI_Model
{

  private $table = 'matakuliah';

  public function get_data($kode_matakuliah = '', $columns = [], $limit = '', $start = '')
  {
    if (sizeof($columns) === 0) {
      $this->db->select('*');
    } else {
      $this->db->select("'" . implode(', ', $columns) . "'");
    }
    $this->db->from($this->table);
    if ($kode_matakuliah != null) {
      $this->db->where('kode_matakuliah', $kode_matakuliah);
    }
    if ($limit != null && $start != null) {
      $this->db->limit($limit, $start);
    }
    if ($kode_matakuliah != null) {
      return $this->db->get()->row_array();
    } else {
      return $this->db->get()->result_array();
    }
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function update($kode_matakuliah, $data)
  {
    $this->db->where('kode_matakuliah', $kode_matakuliah);
    $this->db->update($this->table, $data);
  }

  public function count()
  {
    return $this->db->count_all_results($this->table);
  }

}

/* End of file Matakuliah_model.php */
