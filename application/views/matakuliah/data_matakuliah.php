<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-book-multiple text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Jumlah Matakuliah</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo $jumlah_matakuliah; ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          Tambah Matakuliah
        </p>
        <a href="<?php echo base_url('matakuliah/form_matakuliah') ?>">
          <button type="button" class="btn btn-icons btn-rounded btn-primary">
            <i class="mdi mdi-plus"></i>
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
        <h4 class="card-title">Data Matakuliah</h4>
        <div class="d-flex flex-row align-items-center">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Kode Matakuliah</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Ubah</th>
                <th>Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($all_matakuliah as $matakuliah) :
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $matakuliah['kode_matakuliah']; ?></td>
                  <td><?php echo $matakuliah['nama_matakuliah']; ?></td>
                  <td><?php echo $matakuliah['sks']; ?></td>
                  <td>
                    <a href="<?php echo base_url('matakuliah/form_matakuliah/' . $matakuliah['kode_matakuliah']) ?>" class="btn btn-icons btn-rounded btn-inverse-outline-success">
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
