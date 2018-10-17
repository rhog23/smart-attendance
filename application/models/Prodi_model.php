<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{

  private $table = 'program_studi';

  public function get_data($kode_prodi = '', $columns = "", $limit = '', $start = '')
  {
    if (empty($columns)) {
      $this->db->select('*');
    } else {
      $this->db->select($columns);
    }
    $this->db->from($this->table);
    if ($kode_prodi != null) {
      $this->db->where('kode_prodi', $kode_prodi);
    }
    if ($limit != null && $start != null) {
      $this->db->limit($limit, $start);
    }
    if ($kode_prodi != null) {
      return $this->db->get()->row_array();
    } else {
      return $this->db->get()->result_array();
    }
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function update($kode_prodi, $data)
  {
    $this->db->where('kode_prodi', $kode_prodi);
    $this->db->update($this->table, $data);
  }

  public function count()
  {
    return $this->db->count_all_results($this->table);
  }

}

/* End of file Prodi_model.php */
