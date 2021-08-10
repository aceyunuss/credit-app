<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Data Hasil Penilaian</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr align="center">
              <th scope="col">Aksi</th>
              <th scope="col">Nomor</th>
              <th scope="col">Nama</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Nama Sales</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ((array)$asm as $key => $value) {
              $bd = $value['status'] == "Disetujui" ? "success" : ($value['status'] == "Ditolak" ? "danger" : ($value['status'] == "Survey Ulang" ? "warning" : "primary")); ?>
              <tr>
                <td align="center">
                  <a class="btn btn-sm btn-info" href="<?= site_url('assessmentresult/detail/' . $value['id']) ?>">Lihat</a>
                </td>
                <td align="center"><?= $value['sub_number'] ?></td>
                <td align="center"><?= $value['name'] ?></td>
                <td align="center"><?= $value['item_name'] ?></td>
                <td align="center"><?= $value['sales_name'] ?></td>
                <td align="center"><?= $value['insert_date'] ?></td>
                <td align="center">
                  <div class="badge badge-<?= $bd ?>"><?= $value['status'] ?></div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>