<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
  public $form_config = [
    [
      'field' => 'kode_prodi',
      'label' => 'Kode Prodi',
      'type' => 'text',
      'value' => true,
      'id' => true
    ],
    [
      'field' => 'nama_prodi',
      'label' => 'Nama Prodi',
      'type' => 'text',
      'value' => true
    ]
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model('prodi_model');
    $this->load->library('form');
  }

  public function index()
  {
    $page = 'data_prodi';

    if (!file_exists(APPPATH . 'views/prodi/' . $page . '.php')) {
      show_404();
    }

    $data['title'] = ucwords(str_replace('_', ' ', $page));

    $data['all_prodi'] = $this->prodi_model->get_data();
    $data['jumlah_prodi'] = $this->prodi_model->count();

    $this->template->generate_view('index', 'prodi/' . $page, $data);
  }

  public function form_prodi()
  {
    $data['status'] = 'insert';
    $data['title'] = 'Menambah Data Prodi';
    $form = new Form();
    $form->set_config($this->form_config);
    $form->set_action(base_url('prodi/form_prodi'));

    $form->set_title('Tambah Prodi');

    // Show data if Update
    if (preg_match('/[A-Z]{2,5}/', $this->uri->segment(3)) == true) {
      $data['status'] = 'update';
      $data['title'] = 'Ubah Data Prodi';
      $form->set_title('Update Prodi');
      $form->set_action(base_url('prodi/form_prodi/' . $this->uri->segment(3)));
      if (sizeof($this->prodi_model->get_data($kode_prodi = $this->uri->segment(3))) != 0) {
        $query = $this->prodi_model->get_data($kode_prodi = $this->uri->segment(3));
        foreach ($this->form_config as $value) :
          $data[$value['field']] = $query[$value['field']];
        endforeach;
      } else {
        show_404();
      }
    }

    if ($this->input->post('submit') == 'Submit') {

      $this->form_validation->set_message($form->get_form_error());

      if ($this->form_validation->run('prodi') == true) {
        foreach ($this->form_config as $value) :
          $prodi[$value['field']] = $this->input->post($value['field']);
        endforeach;

        if (!empty($this->uri->segment(3))) {
          $this->prodi_model->update($prodi['kode_prodi'], $prodi);
        } else {
          $this->prodi_model->insert($prodi);
        }

        redirect(base_url('prodi'));
      }
    } elseif ($this->input->post('submit') == 'Cancel') {
      redirect(base_url('prodi'));
    }

    $data['form_config'] = $form->get_config();
    $data['action'] = $form->get_action();
    $data['form_title'] = $form->get_title();

    $this->template->generate_view('index', 'form_template', $data);
  }

}

/* End of file Prodi.php */
