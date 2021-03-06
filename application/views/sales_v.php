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
        <div class="row align-saless-center">
          <div class="col">
            <h3 class="mb-0"><?= ($this->session->userdata('role') == 'Manager') ? "Laporan " : "Data" ?> Sales</h3>
          </div>
          <?php if ($this->session->userdata('role') != 'Manager') { ?>
            <div class="col text-right">
              <a href="<?= site_url('sales/add') ?>" class="btn btn-md btn-success">Tambah Sales</a>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-saless-center table-flush">
          <thead class="thead-light">
            <tr align="center">
              <?php if ($this->session->userdata('role') != 'Manager') { ?>
                <th scope="col" style="width: 10%;">Aksi</th>
              <?php } ?>
              <th scope="col" style="width: 20%;">Nama</th>
              <th scope="col" style="width: 10%;">Jumlah Pendapatan</th>
              <th scope="col" style="width: 25%;">Omzet Pendapatan</th>
              <th scope="col" style="width: 5%;">Detail Omzet</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ((array)$sales as $key => $value) { ?>
              <tr>
                <?php if ($this->session->userdata('role') != 'Manager') { ?>
                  <td align="center">
                    <a class="btn btn-sm btn-info" href="<?= site_url('sales/detail/' . $value['sales_id']) ?>">Lihat</a>
                    <a class="btn btn-sm btn-danger" href="<?= site_url('sales/delete/' . $value['sales_id']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus sales?')">Hapus</a>
                  </td>
                <?php } ?>
                <td align="center"><?= $value['sales_name'] ?></td>
                <td align="center"><?= $value['total'] ?></td>
                <td align="right"><?= number_format($value['amount'], 2, ",", ".") ?></td>
                <td align="center">
                  <a class="btn btn-sm btn-success" href="<?= site_url('sales/detail_omzet/' . $value['sales_id']) ?>">Lihat</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>