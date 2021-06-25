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
        <form method="POST" action="<?= site_url('assessment/submitassessment') ?>">
          <input type="hidden" name="sub_id" value="<?= $subs['id'] ?>">
          <h6 class="heading-small text-muted mb-4">Data Diri</h6>
          <div class="pl-lg-4">

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Nama</label>
                  <p><?= $subs['name'] ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">NIK</label>
                  <p><?= $subs['nik'] ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Alamat Usaha</label>
                  <p><?= $subs['store_addr'] ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Alamat Rumah</label>
                  <p><?= $subs['home_addr'] ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">No Telp</label>
                  <p><?= $subs['phone'] ?></p>
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

          </div>

          <hr class="my-4">

          <h6 class="heading-small text-muted mb-4">Data Barang</h6>
          <div class="pl-lg-4">

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Nama Barang</label>
                  <?php foreach ((array)$items as $k => $v) { ?>
                    <?= $v['id'] == $subs['item'] ? "<p>" . $v['name'] . "</p>" : "" ?>
                  <?php } ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                  <label class="form-control-label">Uang Muka</label>
                  <p><?= $subs['dp'] ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label">Angsuran</label>
                  <?php foreach ((array)$installment as $k => $v) { ?>
                    <?= $v['id'] == $subs['installment'] ? "<p>" . $v['period'] . "</p>" : "" ?>
                  <?php } ?>
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
                <p class="small"><?= $value['code'] . " - " . $value['desc'] . " <b>(" . $value['weight'] . ")</b>" ?></p>
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
                          <td><?= $v['score'] / $v['max_score'] ?></td>
                        <?php } ?>
                      </tr>
                      <tr align="center">
                        <th scope="col">Nilai</th>
                        <?php
                        $score_tot = 0;
                        foreach ($quest as $k => $v) {
                          $score = ($v['score'] / $v['max_score']) * $v['weight']; ?>
                          <td><?= $score ?></td>
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
                <input type="hidden" name="score" value="<?= $score_tot ?>">
              </div>
            </div>
          </div>
          <hr class="my-4">
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-md-12">
                &nbsp;
                <center>
                  <input type="hidden" name="status" value="" id="status">
                  <button type="submit" class="btn btn-danger act" data-stat="n">Tidak Setuju</button>
                  <button type="submit" class="btn btn-info act" data-stat="y">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setuju&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </center>
                &nbsp;
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.act').click(function() {
      let stat = $(this).data("stat");
      $('#status').val(stat)
    })

  })
</script>