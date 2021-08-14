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
                  <p><?= $sales['sales_name'] ?> </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Jumlah Pendapatan</label>
                  <p><?= $sales['total'] ?> </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Omzet</label>
                  <p><?= number_format($sales['amount'], 2, ",", ".") ?> </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>


      <?php foreach ((array)$omzet as $key => $value) {  ?>
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0"><?= $key ?></h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr align="center">
                      <th scope="col">Nomor</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Harga Jual</th>
                      <th scope="col">Omzet</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $total = 0;
                    foreach ((array)$value as $k => $v) {
                      $total += $v['item_price'];
                    ?>
                      <tr>
                        <td align="center"><?= $v['sub_number'] ?></td>
                        <td align="center"><?= $v['review_date'] ?></td>
                        <td align="center"><?= $v['item_name'] ?></td>
                        <td align="right"><?= number_format($v['item_price'], 2, ",", ".") ?></td>
                        <td align="right"><?= number_format($total, 2, ",", ".") ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </form>
  </div>
</div>

<script>
</script>