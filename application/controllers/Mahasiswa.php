<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
  public $form_config = [
    [
      'field' => 'nim',
      'label' => 'NIM',
      'type' => 'text',
      'rules' => 'required'
    ],
    [
      'field' => 'mhs_nama',
      'label' => 'Nama Mahasiswa',
      'type' => 'text',
      'rules' => 'required'
    ]
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mahasiswa_model');
    // load library 'Form'
    $this->load->library('form');
  }

  /**
   * Fungsi untuk mengambil view
   *
   * @param string $page
   * @return void
   */
  public function index()
  {
    $page = 'data_mahasiswa';

    if (!file_exists(APPPATH . 'views/mahasiswa/' . $page . '.php')) {
      show_404();
    }

    $data['title'] = ucwords(str_replace('_', ' ', $page));

    $data['all_mahasiswa'] = $this->mahasiswa_model->select_all();

    $this->template->generate_view('index', 'mahasiswa/' . $page, $data);
  }

  public function form_mahasiswa()
  {
    $form = new Form();
    $form->setConfig($this->form_config);
    $form->setAction(base_url('mahasiswa/form_mahasiswa'));

    foreach ($this->form_config as $value) :
      echo $this->input->post($value['field']);
    endforeach;

    $data['form_config'] = $form->getConfig();
    $data['action'] = $form->getAction();
    $data['title'] = 'Menambah Data Mahasiswa';

    $this->template->generate_view('index', 'form_template', $data);
  }

}

/* End of file Controllername.php */
