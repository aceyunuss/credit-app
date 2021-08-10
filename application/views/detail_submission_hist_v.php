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

        <h6 class="heading-small text-muted mb-4">Data Diri</h6>
        <div class="pl-lg-4">

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Nama</label>
                <input type="text" class="form-control" value="<?= $subs['name'] ?>" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">NIK</label>
                <input type="number" class="form-control" value="<?= $subs['nik'] ?>" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Alamat Usaha</label>
                <textarea class="form-control" readonly><?= $subs['store_addr'] ?></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Alamat Rumah</label>
                <textarea class="form-control" readonly><?= $subs['home_addr'] ?></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Tempat Tanggal Lahir</label>
                <div class="input-group">
                  <input type="text" class="form-control" value="<?= $subs['birth_place'] ?>" readonly>
                  <input class="form-control" type="date" value="<?= substr($subs['birth_date'], 0, 10) ?>" readonly>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">No Telp</label>
                <input type="number" class="form-control" value="<?= $subs['phone'] ?>" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Lampiran KTP</label>
                <div class="custom-file">
                  <p><a href="<?= site_url('submissionhist/dop/submission/' . $subs['user_id'] . '/' . $subs['ktp']) ?>" target="_blank"><?= $subs['ktp'] ?> </a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Lampiran KK</label>
                <div class="custom-file">
                  <p><a href="<?= site_url('submissionhist/dop/submission/' . $subs['user_id'] . '/' . $subs['kk']) ?>" target="_blank"><?= $subs['kk'] ?> </a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Lampiran Slip Gaji</label>
                <div class="custom-file">
                  <p><a href="<?= site_url('submissionhist/dop/submission/' . $subs['user_id'] . '/' . $subs['gaji']) ?>" target="_blank"><?= $subs['gaji'] ?> </a></p>
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
                <select class="form-control" id="item" readonly>
                  <?php foreach ((array)$items as $k => $v) { ?>
                    <option <?= $v['id'] == $subs['item'] ? "selected" : "" ?>><?= $v['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label class="form-control-label">Angsuran</label>
                <select class="form-control" id="installment" disabled>
                  <?php foreach ((array)$installment as $k => $v) { ?>
                    <option <?= $v['id'] == $subs['installment'] ? "selected" : "" ?>><?= $v['period'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Uang Muka</label>
                <input type="text" class="form-control" value="<?= number_format($subs['dp'], 2, ',', '.')  ?>" name="dp" readonly id="dp">
              </div>
            </div>

          </div>
          <div class="col-5">
            <div class="col-12">
              <div class="form-group">
                <label class="form-control-label">Preview</label>
                <p>
                  <img id="prev_img" src="<?= base_url('uploads/item/' . $subs['item_pict']) ?>" style="max-width: 250px; max-height:250px; border: 2px solid lightgrey;  padding: 1rem;   border-radius: 7px;">
              </div>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <h6 class="heading-small text-muted mb-4">Pertanyaan</h6>
        <div class="pl-lg-4">

          <?php foreach ((array)$quest as $ky => $val) {  ?>
            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                  <label class="form-control-label"><?= $val['cid_desc'] ?></label>
                  <select class="form-control" id="criteria" disabled>
                    <option><?= $val['cidx_desc'] ?></option>
                  </select>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <hr class="my-4">
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-md-12">
              &nbsp;
              <center>
                <div class="alert alert-<?= $badge ?>">
                  <b style="font-size: 20px;"><?= $subs['status'] ?></b>
                </div>
              </center>
              &nbsp;
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>