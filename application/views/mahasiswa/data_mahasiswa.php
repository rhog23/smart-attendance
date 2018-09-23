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
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_mahasiswa as $mahasiswa) : ?>
              <tr>
                <td><?php echo $mahasiswa['nim']; ?></td>
                <td><?php echo $mahasiswa['mhs_nama']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>