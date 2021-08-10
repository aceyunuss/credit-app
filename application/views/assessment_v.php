<div class="row">
  <div class="col-xl-12">

    <?php if (!empty($this->session->userdata('result'))) {
      $type = (strpos($this->session->userdata('result'), 'Sukses') !== false) ? "success" : "danger";  ?>
      <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
        <span class="alert-text"><?= $this->session->userdata('result'); ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php $this->session->unset_userdata("result");
    } ?>

    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Data Penilaian</h3>
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

            <?php foreach ((array)$subs as $key => $value) {
              $bd = $value['status'] == "Disetujui" ? "success" : ($value['status'] == "Ditolak" ? "danger" : ($value['status'] == "Survey Ulang" ? "warning" : "primary")); ?>
              <tr>
                <td align="center">
                  <a class="btn btn-sm btn-info" href="<?= site_url('assessment/process/' . $value['id']) ?>">Proses</a>
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