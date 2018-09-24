<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
  public $form_config = [
    [
      'field' => 'nim',
      'label' => 'NIM',
      'type' => 'text',
      'value' => true,
      'id' => true
    ],
    [
      'field' => 'mhs_nama',
      'label' => 'Nama Mahasiswa',
      'type' => 'text',
      'value' => true
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

    $data['all_mahasiswa'] = $this->mahasiswa_model->get_data();

    $this->template->generate_view('index', 'mahasiswa/' . $page, $data);
  }

  public function form_mahasiswa()
  {
    $status = 'insert';
    $form = new Form();
    $form->set_config($this->form_config);
    $form->set_action(base_url('mahasiswa/form_mahasiswa'));

    $form->set_title('Tambah Mahasiswa');

    if (preg_match('/\d{10}/', $this->uri->segment(3)) == true) {
      $form->set_title('Update Mahasiswa');
      $form->set_action(base_url('mahasiswa/form_mahasiswa/'.$this->uri->segment(3)));
      if (sizeof($this->mahasiswa_model->get_data($nim = $this->uri->segment(3))) != 0) {
        $query = $this->mahasiswa_model->get_data($nim = $this->uri->segment(3));
        foreach ($this->form_config as $value) :
          $data[$value['field']] = $query[$value['field']];
        endforeach;
      }
    }

    if ($this->input->post('submit') == 'Submit') {

      $this->form_validation->set_message($form->get_form_error());

      if ($this->form_validation->run('mahasiswa') == true) {
        foreach ($this->form_config as $value) :
          $mhs[$value['field']] = $this->input->post($value['field']);
        endforeach;

        if (!empty($this->uri->segment(3))) {
          $this->mahasiswa_model->update($mhs['nim'], $mhs);
        } else {
          $this->mahasiswa_model->insert($mhs);
        }

        redirect(base_url('mahasiswa'));
      }
    }

    $data['form_config'] = $form->get_config();
    $data['action'] = $form->get_action();
    $data['form_title'] = $form->get_title();
    $data['title'] = 'Menambah Data Mahasiswa';

    $this->template->generate_view('index', 'form_template', $data);
  }

  function test()
  {
    $result = $this->mahasiswa_model->get_data($nim = '2015131012');
    echo $result['nim'];
  }

}

/* End of file Controllername.php */
