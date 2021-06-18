<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Kriteria</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr align="center">
              <th scope="col">Aksi</th>
              <th scope="col">Kode</th>
              <th scope="col">Kriteria</th>
              <th scope="col">Tanggal Update</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ((array)$criteria as $key => $value) { ?>
              <tr>
                <td align="center">
                  <a href="<?= site_url('assessmentcriteria/updatecriteria/') . $value['id'] ?>" class="btn btn-info btn-sm">Ubah </a>
                </td>
                <td align="center"><?= $value['code'] ?></td>
                <td ><?= $value['desc'] ?></td>
                <td align="center"><?= $value['updated_date'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>