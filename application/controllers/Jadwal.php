<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('jadwal_model');
    $this->load->model('prodi_model');
    $this->load->model('matakuliah_model');
    $this->load->model('dosen_model');
    $this->load->library('form');
  }

  public function index()
  {
    $page = 'data_jadwal';

    if (!file_exists(APPPATH . 'views/jadwal/' . $page . '.php')) {
      show_404();
    }

    $data['title'] = ucwords(str_replace('_', ' ', $page));
    $data['all_dosen'] = array_column($this->dosen_model->get_data(), 'dosen_nama', 'nid');
    $data['all_prodi'] = array_column($this->prodi_model->get_data(), 'nama_prodi', 'kode_prodi');
    $data['all_matakuliah'] = $this->matakuliah_model->get_data();
    $data['all_jadwal'] = $this->jadwal_model->get_data();
    $this->template->generate_view('index', 'jadwal/' . $page, $data);
  }

  public function form_jadwal()
  {
    $data['status'] = 'insert';
    $data['title'] = 'Menambah Data Mahasiswa';
    // Mengubah hasil dari model ke dalam bentuk array
    $data['matakuliah'] = array_column($this->matakuliah_model->get_data('', 'kode_matakuliah, nama_matakuliah', '', ''), 'nama_matakuliah', 'kode_matakuliah');
    $data['prodi'] = array_column($this->prodi_model->get_data('', 'kode_prodi, nama_prodi', '', ''), 'nama_prodi', 'kode_prodi');
    $data['dosen'] = array_column($this->dosen_model->get_data(), 'dosen_nama', 'nid');

    $form = new Form();

    $form_config = [
      [
        'field' => 'kode_matakuliah',
        'label' => 'Matakuliah',
        'type' => 'text',
        'form_value' => true,
        'options' => $data['matakuliah']
      ],
      [
        'field' => 'kode_prodi',
        'label' => 'Program Studi',
        'type' => 'text',
        'form_value' => true,
        'options' => $data['prodi']
      ],
      [
        'field' => 'nid',
        'label' => 'Dosen',
        'type' => 'text',
        'form_value' => true,
        'options' => $data['dosen']
      ],
      [
        'field' => 'semester',
        'label' => 'Semester',
        'type' => 'number',
        'form_value' => true
      ],
      [
        'field' => 'hari',
        'label' => 'Hari',
        'type' => 'number',
        'form_value' => true,
        'options' => [
          'Senin' => 'Senin',
          'Selasa' => 'Selasa',
          'Rabu' => 'Rabu',
          'Kamis' => 'Kamis',
          'Jumat' => 'Jumat',
          'Sabtu' => 'Sabtu',
        ]
      ],
      [
        'field' => 'ruang',
        'label' => 'Ruang',
        'type' => 'text',
        'form_value' => true
      ],
      [
        'field' => 'waktu_mulai',
        'label' => 'Waktu Mulai',
        'type' => 'time',
        'form_value' => true
      ],
      [
        'field' => 'waktu_selesai',
        'label' => 'Waktu Selesai',
        'type' => 'time',
        'form_value' => true
      ]
    ];

    $form->set_action(base_url('jadwal/form_jadwal'));

    $form->set_title('Tambah Jadwal');

    if (preg_match('/\d{10}/', $this->uri->segment(3)) == true) {
      $data['status'] = 'update';
      $data['title'] = 'Ubah Data Jadwal';
      $form->set_title('Update Jadwal');
      $form->set_action(base_url('jadwal/form_jadwal/' . $this->uri->segment(3)));
      if (sizeof($this->jadwal_model->get_data($id_jadwal = $this->uri->segment(3))) != 0) {
        $query = $this->jadwal_model->get_data($id_jadwal = $this->uri->segment(3));
        foreach ($form_config as $value) :
          $data[$value['field']] = $query[$value['field']];
        endforeach;
      } else {
        show_404();
      }
    }

    if ($this->input->post('submit') == 'Submit') {

      $this->form_validation->set_message($form->get_form_error());

      if ($this->form_validation->run('jadwal') == true) {
        foreach ($form_config as $value) :
          $jadwal[$value['field']] = $this->input->post($value['field']);
        endforeach;

        if (!empty($this->uri->segment(3))) {
          $this->jadwal_model->update($jadwal['id_jadwal'], $jadwal);
        } else {
          $this->jadwal_model->insert($jadwal);
        }

        redirect(base_url('jadwal'));
      }
    } elseif ($this->input->post('submit') == 'Cancel') {
      redirect(base_url('jadwal'));
    }

    $form->set_config($form_config);
    $data['form_config'] = $form->get_config();
    $data['action'] = $form->get_action();
    $data['form_title'] = $form->get_title();

    $this->template->generate_view('index', 'form_template', $data);
  }

  function test()
  {
    print_r($this->matakuliah_model->get_data());
  }

}

/* End of file Jadwal.php */
