<div class="row">
  <div class="col-xl-12 order-xl-1">
    <form action="<?= site_url('sales/submitsales') ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" value="<?= $sales_id ?>" name="sales_id">

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
        <div class="card-header">
          <div class="row align-saless-center">
            <div class="col-12">
              <h3 class="mb-0">Form Sales</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="pl-lg-5">
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Nama</label>
                  <input type="text" class="form-control" name="name" value="<?= isset($sales['sales_name']) ? $sales['sales_name'] : "" ?>" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <center>
                  <button type="submit" class="btn btn-info btn-md mt-5">Simpan</button>
                  &nbsp;
                </center>
              </div>
            </div>
          </div>

          <br>
          <hr>
          <br>


        </div>
      </div>

      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data Pengajuan</h3>
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

                  <?php foreach ((array)$hist as $key => $value) {
                    $bd = $value['status'] == "Disetujui" ? "success" : ($value['status'] == "Ditolak" ? "danger" : ($value['status'] == "Survey Ulang" ? "warning" : "primary")); ?>
                    <tr>
                      <td align="center">
                        <a class="btn btn-sm btn-info" target="_blank" href="<?= site_url('assessmentresult/detail/' . $value['id']) ?>">Lihat</a>
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
    </form>
  </div>
</div>

<script>
</script>