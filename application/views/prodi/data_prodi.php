<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-mortar-board text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Jumlah Program Studi</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo $jumlah_prodi; ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          Tambah Program Studi
        </p>
        <a href="<?php echo base_url('prodi/form_prodi') ?>">
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
        <h4 class="card-title">Data Program Studi</h4>
        <div class="d-flex flex-row align-items-center">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Kode Prodi</th>
                <th>Nama Prodi</th>
                <th>Ubah</th>
                <th>Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($all_prodi as $prodi) :
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $prodi['kode_prodi']; ?></td>
                  <td><?php echo $prodi['nama_prodi']; ?></td>
                  <td>
                    <a href="<?php echo base_url('prodi/form_prodi/' . $prodi['kode_prodi']); ?>" class="btn btn-icons btn-rounded btn-inverse-outline-success">
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