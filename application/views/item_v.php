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
            <h3 class="mb-0">Data Barang</h3>
          </div>
          <div class="col text-right">
            <a href="<?= site_url('item/add') ?>" class="btn btn-md btn-success">Tambah Barang</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr align="center">
              <th scope="col" style="width: 10%;">Aksi</th>
              <th scope="col" style="width: 20%;">Gambar</th>
              <th scope="col" style="width: 15%;">Kode</th>
              <th scope="col" style="width: 25%;">Nama</th>
              <th scope="col" style="width: 15%;">Harga</th>
              <th scope="col" style="width: 15%;">DP</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ((array)$item as $key => $value) { ?>
              <tr>
                <td align="center">
                  <a class="btn btn-sm btn-info" href="<?= site_url('item/detail/' . $value['id']) ?>">Ubah</a>
                  <a class="btn btn-sm btn-danger" href="<?= site_url('item/delete/' . $value['id']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus barang?')">Hapus</a>
                </td>
                <td align="center">
                  <img src="<?= base_url('uploads/item/' . $value['pict']) ?>" style="max-width: 50px; max-height:50px">
                </td>
                <td align="center"><?= $value['kode_barang'] ?></td>
                <td align="center"><?= $value['name'] ?></td>
                <td align="right"><?= number_format($value['price'], 2, ",", ".") ?></td>
                <td align="right"><?= number_format($value['dp'], 2, ",", ".") ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>