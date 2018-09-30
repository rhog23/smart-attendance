<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <p class="text-muted mt-3 mb-0">
          Tambah Jadwal
        </p>
        <a href="<?php echo base_url('jadwal/form_jadwal') ?>">
          <button type="button" class="btn btn-icons btn-rounded btn-primary">
            <i class="fa fa-calendar"></i>
          </button>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Jadwal</h4>
        <div class="d-flex flex-row align-items-center">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Matakuliah</th>
                <th>Prodi</th>
                <th>Dosen</th>
                <th>Semester</th>
                <th>Hari</th>
                <th>Ruang</th>
                <th>Waktu</th>
                <th>Ubah</th>
                <th>Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($all_jadwal as $jadwal) :
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $jadwal['matakuliah']; ?></td>
                  <td><?php echo $jadwal['prodi']; ?></td>
                  <td><?php echo $jadwal['dosen']; ?></td>
                  <td><?php echo $jadwal['semester']; ?></td>
                  <td><?php echo $jadwal['hari']; ?></td>
                  <td><?php echo $jadwal['ruang']; ?></td>
                  <td><?php echo $jadwal['waktu']; ?></td>
                  <td>
                    <a href="<?php echo base_url('jadwal/form_jadwal/' . $jadwal['id_jadwal']) ?>" class="btn btn-icons btn-rounded btn-inverse-outline-success">
                      <i class="mdi mdi-pencil"></i>
                    </a>
                  </td>
                  <td>
                    <a href="http://" class="btn btn-icons btn-rounded btn-inverse-outline-warning">
                      <i class="mdi mdi-delete"></i>
                    </a>
                  </td>
                </tr>
              <?php 
              $no++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
