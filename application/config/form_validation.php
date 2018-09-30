<?php
$config = [
  'mahasiswa' => [
    [
      'field' => 'nim',
      'label' => 'NIM',
      'rules' => 'required|numeric'
    ],
    [
      'field' => 'mhs_nama',
      'label' => 'Nama Mahasiswa',
      'rules' => 'required|alpha_numeric_spaces'
    ]
  ],
  'dosen' => [
    [
      'field' => 'nid',
      'label' => 'Nomor Induk Dosen',
      'rules' => 'required|alpha_numeric'
    ],
    [
      'field' => 'dosen_nama',
      'label' => 'Nama Dosen',
      'rules' => 'required|alpha_numeric_spaces'
    ]
  ],
  'matakuliah' => [
    [
      'field' => 'kode_matakuliah',
      'label' => 'Kode Matakuliah',
      'rules' => 'required|alpha_numeric'
    ],
    [
      'field' => 'nama_matakuliah',
      'label' => 'Nama Matakuliah',
      'rules' => 'required|alpha_numeric_spaces'
    ],
    [
      'field' => 'sks',
      'label' => 'SKS',
      'rules' => 'required|integer'
    ]
  ],
  'prodi' => [
    [
      'field' => 'kode_prodi',
      'label' => 'Kode Prodi',
      'rules' => 'required|alpha'
    ],
    [
      'field' => 'nama_prodi',
      'label' => 'Nama Prodi',
      'rules' => 'required|alpha_numeric_spaces'
    ]
  ],
  'jadwal' => [
    [
      'field' => 'kode_matakuliah',
      'label' => 'Matakuliah',
      'rules' => 'required'
    ],
    [
      'field' => 'kode_prodi',
      'label' => 'Prodi',
      'rules' => 'required',
    ],
    [
      'field' => 'nid',
      'label' => 'Dosen',
      'rules' => 'required'
    ],
    [
      'field' => 'semester',
      'label' => 'Semester',
      'rules' => 'required'
    ],
    [
      'field' => 'hari',
      'label' => 'Hari',
      'rules' => 'required'
    ],
    [
      'field' => 'ruang',
      'label' => 'Ruang',
      'rules' => 'required'
    ],
    [
      'field' => 'waktu_mulai',
      'label' => 'Waktu',
      'rules' => 'required'
    ],
    [
      'field' => 'waktu_selesai',
      'label' => 'Waktu',
      'rules' => 'required'
    ]
  ]
];