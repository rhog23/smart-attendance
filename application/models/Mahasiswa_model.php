<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

  private $table = 'mahasiswa';

  public function select_all($nim = '', $columns = [], $limit = '', $start = '')
  {
    if (sizeof($columns) === 0) {
      $this->db->select('*');
    } else {
      $this->db->select("'" . implode(', ', $columns) . "'");
    }
    $this->db->from($this->table);
    if ($nim != null) {
      $this->db->where('nim', $nim);
    }
    if ($limit != null && $start != null) {
      $this->db->limit($limit, $start);
    }

    return $this->db->get()->result_array();
  }

}

/* End of file ModelName.php */
