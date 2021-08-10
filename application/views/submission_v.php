<div class="row">
  <div class="col-xl-12 order-xl-1">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Form Pengajuan</h3>
          </div>
        </div>
      </div>
      <div class="card-body">

        <form action="<?= site_url('submission/submitsubmission') ?>" method="POST" enctype="multipart/form-data">
          <h6 class="heading-small text-muted mb-4">Data Diri</h6>
          <div class="pl-lg-4">

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Nama</label>
                  <input type="text" class="form-control" name="name" value="<?= $usr['fullname'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">NIK</label>
                  <input type="number" class="form-control" name="nik" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Alamat Usaha</label>
                  <textarea class="form-control" name="store_addr" required></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Alamat Rumah</label>
                  <textarea class="form-control" name="home_addr" required><?= $usr['address'] ?></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Tempat Tanggal Lahir</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="birth_place" maxlength="30" required>
                    <input class="form-control" type="date" name="birth_date" max="<?= $mindate ?>" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">No Telp</label>
                  <input type="number" class="form-control" name="phone" value="<?= $usr['phone'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Lampiran KTP</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="ktp" required>
                    <label class="custom-file-label">Select file</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Lampiran KK</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="kk" required>
                    <label class="custom-file-label">Select file</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Lampiran Slip Gaji</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gaji" required>
                    <label class="custom-file-label">Select file</label>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <hr class="my-4">

          <h6 class="heading-small text-muted mb-4">Data Barang</h6>

          <div class="row">
            <div class="col-7">

              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label">Nama Barang</label>
                  <select class="form-control" id="item" name="item" required>
                    <option value="">---Pilih Barang---</option>
                    <?php foreach ((array)$items as $k => $v) { ?>
                      <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label class="form-control-label">Angsuran</label>
                  <select class="form-control" id="installment" name="installment" required>
                    <option value="">---Pilih Angsuran---</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label">Nama Sales</label>
                  <select class="form-control" name="sales" required>
                    <option value="">---Pilih Sales---</option>
                    <?php foreach ((array)$sales as $k => $v) { ?>
                      <option value="<?= $v['sales_id'] ?>"><?= $v['sales_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label">Uang Muka</label>
                  <p>*Sesuai permintaan sales</p>
                </div>
              </div>

            </div>
            <div class="col-5">
              <div class="col-12">
                <div class="form-group">
                  <label class="form-control-label">Preview</label>
                  <p>
                    <img id="prev_img" src="<?= base_url('assets/img/theme/noi.png') ?>" style="max-width: 250px; max-height:250px; border: 2px solid lightgrey;  padding: 1rem;   border-radius: 7px;">
                </div>
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h6 class="heading-small text-muted mb-4">Pertanyaan</h6>
          <div class="pl-lg-4">

            <?php foreach ((array)$criteria as $ky => $val) {
              $mx = 0; ?>
              <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <label class="form-control-label"><?= $val['desc'] ?></label>
                    <select class="form-control" id="criteria" name="criteria[]" required>
                      <option value="">---Pilih---</option>
                      <?php foreach ((array)$criteria_index as $k => $v) {
                        if ($val['id'] == $v['cid']) {  ?>
                          <option value="<?= $v['cid'] . '|' . $val['desc'] . '|' . $v['id'] . '|' . $v['desc'] . '|' . $v['index'] . '|' . $val['weight'] ?>"><?= $v['desc'] ?></option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
            <?php } ?>

            <center>
              <button type="submit" class="btn btn-info mt-5">Submit</button>
            </center>
            &nbsp;
          </div>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(function() {

    $("#item").change(function() {
      $.ajax({
        url: "<?php echo site_url('submission/getinstallment?item='); ?>" + $("#item").val(),
        type: "get",
        dataType: "json",
        success: function(data) {
          $("#installment").html("");
          $("#installment").append("<option value=''>---Pilih Angsuran---</option>");
          // $("#dp").val(data[0].dp)
          $("#prev_img").attr("src", data[0].pict)
          $.each(data, function(index, row) {
            $("#installment").append("<option value='" + row.id + "'>" + row.period + "</option>");
          });

        }
      });
    })
  })
</script>