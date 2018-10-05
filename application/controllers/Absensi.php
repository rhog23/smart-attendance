<?php
header('Access-Control-Allow-Origin: *');
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
    echo $_POST['name'];
  }

  public function take_picture()
  {
    $src = $_FILES['file']['tmp_name'];
    // $targ = base_url() . "images/" . $_FILES['file']['name'];
    $targ = $_SERVER['DOCUMENT_ROOT'] . "/smart-attendance/images/" . $_FILES['file']['name'];
    move_uploaded_file($src, $targ);
    $data = 'success';
    echo json_encode($data);
  }

}

/* End of file Controllername.php */
