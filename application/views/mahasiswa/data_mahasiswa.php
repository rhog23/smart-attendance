<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Mahasiswa</h4>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>Ubah</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_mahasiswa as $mahasiswa) : ?>
              <tr>
                <td><?php echo $mahasiswa['nim']; ?></td>
                <td><?php echo $mahasiswa['mhs_nama']; ?></td>
                <td>
                  <a href="http://" class="btn btn-icons btn-rounded btn-inverse-outline-success">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                </td>
                <td>
                  <a href="http://" class="btn btn-icons btn-rounded btn-inverse-outline-warning">
                    <i class="mdi mdi-delete"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>