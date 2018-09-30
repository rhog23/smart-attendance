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

    $form->set_action(base_url('mahasiswa/form_mahasiswa'));

    $form->set_title('Tambah Mahasiswa');

    if (preg_match('/\d{10}/', $this->uri->segment(3)) == true) {
      $data['status'] = 'update';
      $data['title'] = 'Ubah Data Mahasiswa';
      $form->set_title('Update Mahasiswa');
      $form->set_action(base_url('mahasiswa/form_mahasiswa/' . $this->uri->segment(3)));
      if (sizeof($this->mahasiswa_model->get_data($nim = $this->uri->segment(3))) != 0) {
        $query = $this->mahasiswa_model->get_data($nim = $this->uri->segment(3));
        foreach ($this->form_config as $value) :
          $data[$value['field']] = $query[$value['field']];
        endforeach;
      } else {
        show_404();
      }
    }

    if ($this->input->post('submit') == 'Submit') {

      $this->form_validation->set_message($form->get_form_error());

      if ($this->form_validation->run('mahasiswa') == true) {
        foreach ($this->form_config as $value) :
          if ($value['field'] == 'mhs_nama') {
          $mhs[$value['field']] = preg_replace('/\d*/', '', $this->input->post($value['field']));
        } else {
          $mhs[$value['field']] = $this->input->post($value['field']);
        }
        endforeach;

        if (!empty($this->uri->segment(3))) {
          $this->mahasiswa_model->update($mhs['nim'], $mhs);
        } else {
          $this->mahasiswa_model->insert($mhs);
        }

        redirect(base_url('mahasiswa'));
      }
    } elseif ($this->input->post('submit') == 'Cancel') {
      redirect(base_url('mahasiswa'));
    }

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
          '1' => 'Senin',
          '2' => 'Selasa',
          '3' => 'Rabu',
          '4' => 'Kamis',
          '5' => 'Jumat',
          '6' => 'Sabtu',
        ]
      ],
      [
        'field' => 'ruang',
        'label' => 'Ruang',
        'type' => 'text',
        'form_value' => true
      ],
      [
        'field' => 'waktu',
        'label' => 'Waktu',
        'type' => 'time',
        'form_value' => true
      ]
    ];

    $form->set_config($form_config);
    $data['form_config'] = $form->get_config();
    $data['action'] = $form->get_action();
    $data['form_title'] = $form->get_title();

    $this->template->generate_view('index', 'form_template', $data);
  }

  function test()
  {
    $data['matakuliah'] = $this->matakuliah_model->get_data('', 'kode_matakuliah, nama_matakuliah', '', '');
    print_r($data['matakuliah']);
    /* $column = ["kode_matakuliah", "nama_matakuliah"];
    $select = "'" . implode(', ', $column) . "'";
    echo count($column);
    print_r($select);
    echo gettype($select); */
  }

}

/* End of file Jadwal.php */
