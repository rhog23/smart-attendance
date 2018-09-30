<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
  public $form_config = [
    [
      'field' => 'kode_matakuliah',
      'label' => 'Kode Matakuliah',
      'type' => 'text',
      'form_value' => true,
      'id' => true
    ],
    [
      'field' => 'nama_matakuliah',
      'label' => 'Nama Matakuliah',
      'type' => 'text',
      'form_value' => true
    ],
    [
      'field' => 'sks',
      'label' => 'SKS',
      'type' => 'number',
      'form_value' => true
    ]
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model('matakuliah_model');
    $this->load->library('form');
  }

  public function index()
  {
    $page = 'data_matakuliah';

    if (!file_exists(APPPATH . 'views/matakuliah/' . $page . '.php')) {
      show_404();
    }

    $data['title'] = ucwords(str_replace('_', ' ', $page));

    $data['all_matakuliah'] = $this->matakuliah_model->get_data();
    $data['jumlah_matakuliah'] = $this->matakuliah_model->count();

    $this->template->generate_view('index', 'matakuliah/' . $page, $data);
  }

  public function form_matakuliah()
  {
    $data['status'] = 'insert';
    $data['title'] = 'Menambah Data Matakuliah';
    $form = new Form();
    $form->set_config($this->form_config);
    $form->set_action(base_url('matakuliah/form_matakuliah'));

    $form->set_title('Tambah Matakuliah');

    if (preg_match('/[A-Z0-9]{5}/', $this->uri->segment(3)) == true) {
      $data['status'] = 'update';
      $data['title'] = 'Ubah Data Matakuliah';
      $form->set_title('Update Matakuliah');
      $form->set_action(base_url('matakuliah/form_matakuliah/' . $this->uri->segment(3)));
      if (sizeof($this->matakuliah_model->get_data($kode_matakuliah = $this->uri->segment(3))) != 0) {
        $query = $this->matakuliah_model->get_data($kode_matakuliah = $this->uri->segment(3));
        foreach ($this->form_config as $value) :
          $data[$value['field']] = $query[$value['field']];
        endforeach;
      } else {
        show_404();
      }
    }

    if ($this->input->post('submit') == 'Submit') {

      $this->form_validation->set_message($form->get_form_error());

      if ($this->form_validation->run('matakuliah') == true) {
        foreach ($this->form_config as $value) :
          $matakuliah[$value['field']] = $this->input->post($value['field']);
        endforeach;

        if (!empty($this->uri->segment(3))) {
          $this->matakuliah_model->update($matakuliah['kode_matakuliah'], $matakuliah);
        } else {
          $this->matakuliah_model->insert($matakuliah);
        }

        redirect(base_url('matakuliah'));
      }
    } elseif ($this->input->post('submit') == 'Cancel') {
      redirect(base_url('matakuliah'));
    }

    $data['form_config'] = $form->get_config();
    $data['action'] = $form->get_action();
    $data['form_title'] = $form->get_title();

    $this->template->generate_view('index', 'form_template', $data);
  }

}

/* End of file Matakuliah.php */
