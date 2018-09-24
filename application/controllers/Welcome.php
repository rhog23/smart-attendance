<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  public function index()
  {
    $data['title'] = 'Welcome Page';
    $this->template->generate_view('index', 'welcome_message');
  }

  public function get_mahasiswa()
  {

  }
}
