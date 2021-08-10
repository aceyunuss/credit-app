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
                <p><?= $asm['name'] ?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">NIK</label>
                <p><?= $asm['nik'] ?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Alamat Usaha</label>
                <p><?= $asm['store_addr'] ?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Alamat Rumah</label>
                <p><?= $asm['home_addr'] ?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Tempat Tanggal Lahir</label>
                <p><?= $asm['birth_place'] . ", " . substr($asm['birth_date'], 0, 10) ?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">No Telp</label>
                <p><?= $asm['phone'] ?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Lampiran KTP</label>
                <div class="custom-file">
                  <p><a href="<?= site_url('submissionhist/dop/submission/' . $asm['user_id'] . '/' . $asm['ktp']) ?>" target="_blank"><?= $asm['ktp'] ?> </a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Lampiran KK</label>
                <div class="custom-file">
                  <p><a href="<?= site_url('submissionhist/dop/submission/' . $asm['user_id'] . '/' . $asm['kk']) ?>" target="_blank"><?= $asm['kk'] ?> </a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label">Lampiran Slip Gaji</label>
                <div class="custom-file">
                  <p><a href="<?= site_url('submissionhist/dop/submission/' . $asm['user_id'] . '/' . $asm['gaji']) ?>" target="_blank"><?= $asm['gaji'] ?> </a></p>
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
                <?php foreach ((array)$items as $k => $v) { ?>
                  <?= $v['id'] == $asm['item'] ? "<p>" . $v['name'] . "</p>" : "" ?>
                <?php } ?>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label class="form-control-label">Angsuran</label>
                <?php foreach ((array)$installment as $k => $v) { ?>
                  <?= $v['id'] == $asm['installment'] ? "<p>" . $v['period'] . "</p>" : "" ?>
                <?php } ?>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label class="form-control-label">Nama Sales</label>
                <?php foreach ((array)$sales as $k => $v) { ?>
                  <?= $v['sales_id'] == $asm['sales_id'] ? "<p>" . $v['sales_name'] . "</p>" : "" ?>
                <?php } ?>
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
                  <img id="prev_img" src="<?= base_url('uploads/item/' . $asm['item_pict']) ?>" style="max-width: 180px; max-height:180px; border: 2px solid lightgrey;  padding: 1rem;   border-radius: 7px;">
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
                  <p><?= $val['cidx_desc'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <hr class="my-4">
        <div class="pl-lg-4">

          <br>
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label">Bobot Kriteria</label>
              <p>
                <?php foreach ((array)$criteria as $key => $value) { ?>
              <p class="small"><?= $value['code'] . " - " . $value['desc'] . " <b>(" . $value['item_weight'] . ")</b>" ?></p>
            <?php } ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p></p>
              <label class="form-control-label">Nilai Minimal : <b>65</b></label>
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr align="center">
                      <th scope="col" rowspan="2"></th>
                      <th scope="col" colspan="<?= count($criteria) ?>">Kriteria</th>
                    </tr>
                    <tr align="center">
                      <?php foreach ((array)$criteria as $key => $value) { ?>
                        <th scope="col"><?= $value['code'] ?></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr align="center">
                      <th scope="col">Skor</th>
                      <?php foreach ($quest as $k => $v) { ?>
                        <td><?= $v['score'] . '/' . $v['max_score'] ?></td>
                      <?php } ?>
                    </tr>
                    <tr align="center">
                      <th scope="col">Normalisasi</th>
                      <?php foreach ($quest as $k => $v) { ?>
                        <td><?= round(($v['score'] / $v['max_score']), 2) ?></td>
                      <?php } ?>
                    </tr>
                    <tr align="center">
                      <th scope="col">Nilai</th>
                      <?php
                      $score_tot = 0;
                      foreach ($quest as $k => $v) {
                        $score = ($v['score'] / $v['max_score']) * $v['weight']; ?>
                        <td><?= $score = round($score, 2) ?></td>
                      <?php $score_tot += $score;
                      }
                      $label = $score_tot < 65 ? "Dibawah" : "Diatas";
                      $class = $score_tot < 65 ? "danger" : "success";
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <h2>Total Nilai : <?= $score_tot ?>&nbsp;&nbsp;<span class="badge badge-<?= $class ?>"><?= $label . " Nilai Minimal" ?></span></h2>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-md-12">
              &nbsp;
              <center>
                <!-- <div class="alert alert-<?= $asm['status'] == 'Disetujui' ? 'success' : 'danger' ?>">
                  <b style="font-size: 20px;"><?= $asm['status'] ?></b>
                </div> -->
              </center>
              &nbsp;
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>