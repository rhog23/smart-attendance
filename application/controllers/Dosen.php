<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
  public $form_config = [
    [
      'field' => 'nid',
      'label' => 'NID',
      'type' => 'text',
      'value' => true,
      'id' => true
    ],
    [
      'field' => 'dosen_nama',
      'label' => 'Nama Dosen',
      'type' => 'text',
      'value' => true
    ]
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model('dosen_model');
    $this->load->library('form');
  }

  public function index()
  {
    $page = 'data_dosen';

    if (!file_exists(APPPATH . 'views/dosen/' . $page . '.php')) {
      show_404();
    }

    $data['title'] = ucwords(str_replace('_', ' ', $page));

    $data['all_dosen'] = $this->dosen_model->get_data();
    $data['jumlah_dosen'] = $this->dosen_model->count();

    $this->template->generate_view('index', 'dosen/' . $page, $data);
  }

  public function form_dosen()
  {
    $data['status'] = 'insert';
    $data['title'] = 'Menambah Data Dosen';
    $form = new Form();
    $form->set_config($this->form_config);
    $form->set_action(base_url('dosen/form_dosen'));

    $form->set_title('Tambah Dosen');

    if (!empty($this->uri->segment(3))) {
      $data['status'] = 'update';
      $data['title'] = 'Ubah Data Dosen';
      $form->set_title('Update Dosen');
      $form->set_action(base_url('dosen/form_dosen/' . $this->uri->segment(3)));
      if (sizeof($this->dosen_model->get_data($nid = $this->uri->segment(3))) != 0) {
        $query = $this->dosen_model->get_data($nid = $this->uri->segment(3));
        foreach ($this->form_config as $value) :
          $data[$value['field']] = $query[$value['field']];
        endforeach;
      } else {
        show_404();
      }
    }

    if ($this->input->post('submit') == 'Submit') {

      $this->form_validation->set_message($form->get_form_error());

      if ($this->form_validation->run('dosen') == true) {
        foreach ($this->form_config as $value) :
          if ($value['field'] == 'dosen_nama') {
          $dosen[$value['field']] = preg_replace('/\d*/', '', $this->input->post($value['field']));
        } else {
          $dosen[$value['field']] = $this->input->post($value['field']);
        }
        endforeach;

        if (!empty($this->uri->segment(3))) {
          $this->dosen_model->update($dosen['nid'], $dosen);
        } else {
          $this->dosen_model->insert($dosen);
        }

        redirect(base_url('dosen'));
      }
    } elseif ($this->input->post('submit') == 'Cancel') {
      redirect(base_url('dosen'));
    }

    $data['form_config'] = $form->get_config();
    $data['action'] = $form->get_action();
    $data['form_title'] = $form->get_title();

    $this->template->generate_view('index', 'form_template', $data);
  }

}

/* End of file Dosen.php */
