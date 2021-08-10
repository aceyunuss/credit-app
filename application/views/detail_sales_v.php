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
    </form>
  </div>
</div>

<script>
</script>