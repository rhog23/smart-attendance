<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

  public function index()
  {
    $page = 'data_absensi';

    if (!file_exists(APPPATH . 'views/absensi/' . $page . '.php')) {
      show_404();
    }

    $data['title'] = ucwords(str_replace('_', ' ', $page));


    $this->template->generate_view('index', 'absensi/' . $page, $data);
  }

  public function detail_absensi()
  {
    $nim = $this->uri->segment(3);

  }

  public function absensi_mahasiswa()
  {
    $this->load->view('absensi_mahasiswa');
  }

  public function take_picture()
  {
    shell_exec("python asset/take_picture.py");
  }

}

/* End of file Controllername.php */
