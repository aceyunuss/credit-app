<div class="row">
  <div class="col-xl-12 order-xl-1">
    <form action="<?= site_url('item/submititem') ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" value="<?= $item_id ?>" name="item_id">

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
          <div class="row align-items-center">
            <div class="col-12">
              <h3 class="mb-0">Form Barang</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="pl-lg-5">
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Nama</label>
                  <input type="text" class="form-control" name="name" value="<?= isset($item['name']) ? $item['name'] : "" ?>" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Kode</label>
                  <input type="text" class="form-control" name="code" value="<?= isset($item['kode_barang']) ? $item['kode_barang'] : "" ?>" maxlength="10" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Harga</label>
                  <input type="number" class="form-control" name="price" id="realprice" value="<?= isset($item['price']) ? $item['price'] : "" ?>" required>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Harga Jual</label>
                  <input type="number" class="form-control" id="sellprice" value="<?= isset($item['price']) ? $item['price'] * 1.2 : "" ?>" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">DP</label>
                  <p>*Sesuai permintaan sales</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Gambar</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="item">
                    <label class="custom-file-label">Select file</label>
                  </div>
                </div>
                <?php if (isset($item['pict'])) { ?>
                  <img src="<?= base_url('uploads/item/' . $item['pict']) ?>" style="max-width: 150px; max-height:150px; border: 2px solid lightgrey;  padding: 1rem;   border-radius: 7px;">
                <?php } ?>
              </div>
            </div>

          </div>

          <br>
          <hr>
          <br>

          <div class="row align-items-center">
            <div class="col-12">
              <h3 class="mb-0">Form Kriteria</h3>
            </div>
          </div>
          <br>
          <p></p>
          <div class="pl-lg-5">
            <div class="row">
              <div class="col-lg-11">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr align="center">
                        <th style="width: 10%;" scope="col">No</th>
                        <th style="width: 20%;" scope="col">Kode</th>
                        <th style="width: 35%;" scope="col">Kriteria</th>
                        <th style="width: 20%;" scope="col">Tipe</th>
                        <th style="width: 15%;" scope="col">Bobot</th>
                      </tr>
                    </thead>
                    <tbody class="tbl_criteria">
                      <?php foreach ((array)$criteria as $ky => $val) { ?>
                        <tr>
                          <td class="text-center">
                            <?= $ky + 1 ?>
                            <input type="hidden" name="citem_id[<?= $val['id'] ?>]" value="<?= isset($val['citem_id']) ? $val['citem_id'] : "" ?>">
                          </td>
                          <td class="text-center">
                            <?= $val['code'] ?>
                          </td>
                          <td>
                            <?= $val['desc'] ?>
                          </td>
                          <td class="text-center">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" required id="r1<?= $val['id']?>" <?= (isset($val['item_type']) && $val['item_type'] == 'Cost') ? "checked" : "" ?> name="r<?= $val['id']?>" class="custom-control-input" value="Cost">
                              <label class="custom-control-label" for="r1<?= $val['id']?>">Cost</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" required id="r2<?= $val['id']?>" <?= (isset($val['item_type']) && $val['item_type'] == 'Benefit') ? "checked" : "" ?> name="r<?= $val['id']?>" class="custom-control-input" value="Benefit">
                              <label class="custom-control-label" for="r2<?= $val['id']?>">Benefit</label>
                            </div>
                          </td>
                          <td>
                            <input type="number" class="form-control form-control-sm cr_bobot" min="1" max="100" name="item_weight[<?= $val['id'] ?>]" value="<?= isset($val['item_weight']) ? $val['item_weight'] : "" ?>">
                          </td>
                        </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <br>
          <hr>
          <br>

          <div class="row align-items-center">
            <div class="col-12">
              <h3 class="mb-0">Form Angsuran</h3>
            </div>
          </div>
          <br>
          <p></p>
          <div class="pl-lg-5">

            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Periode Angsuran</label>
                  <input type="text" id="idesc" class="form-control idiform" value="">
                  <input type="hidden" id="idi" class="form-control idiform" value="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <center>
                  <button type="button" class="btn btn-outline-info add_idi">Tambah</button>
                  <button type="button" class="btn btn-outline-danger del_idi">Hapus</button>
                </center>
              </div>
            </div>
            <br>
            <br>


            <div class="row">
              <div class="col-lg-11">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr align="center">
                        <th style="width: 20%;" scope="col">#</th>
                        <th style="width: 80%;" scope="col">Periode Angsuran</th>
                      </tr>
                    </thead>
                    <tbody class="tbl_idi">
                      <?php foreach ((array)$installment as $k => $v) { ?>
                        <tr data-row='<?= $k + 1 ?>'>
                          <td class='xaf' align='center'>
                            <button type='button' class='btn btn-sm btn-warning edit_idi'><i class='ni ni-fat-delete'></i></button>
                            <input type='hidden' class='idi_<?= $k + 1 ?>' name='idi[]' value='<?= $v["id"] ?>'>
                          </td>
                          <td class='nm'>
                            <input type='hidden' class='desc_<?= $k + 1 ?>' name='desc[]' value='<?= $v["period"] ?>'><?= $v['period'] ?>
                          </td>
                        </tr>
                      <?php } ?>

                    </tbody>
                  </table>
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
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $('form').submit(function(e) {

    let total = 0;
    let irow = $('.tbl_idi tr').length;

    $('.cr_bobot').each(function(index) {
      total += ($(this).val() != "") ? parseInt($(this).val()) : 0;
    });

    if (total != 100) {
      e.preventDefault();
      alert('Total bobot kriteria harus 100');
    }

    if (irow == 0) {
      e.preventDefault();
      alert('Angsuran tidak boleh kosong');
    }
  })


  $(document).ready(function() {

    $('.add_idi').click(function() {

      let d = $('#idesc').val()
      let i = $('.tbl_idi tr').length + 1;
      let idi = $('#idi').val()

      if (d == "") {

        alert("Harap mengisi kolom yang tersedia");

      } else {


        let rw = "<tr data-row='" + i + "'>\
                    <td class='bttn' align='center'>\
                      <button type='button' class='btn btn-sm btn-warning edit_idi'><i class='ni ni-fat-delete'></i></button>\
                      <input type='hidden' class='idi_" + i + "' name='idi[]' value='" + idi + "'>\
                    </td>\
                    <td class='nm'>\
                      <input type='hidden' class='desc_" + i + "' name='desc[]' value='" + d + "'>" + d + "\
                    </td>\
                  </tr>";

        $('.tbl_idi').append(rw)

        $('.idiform').val("")


      }
    })


    $(document).on('click', '.edit_idi', function() {

      rowid = $(this).parent().parent().data('row');
      tdesc = $('.desc_' + rowid).val();
      tidi = $('.idi_' + rowid).val();

      $('#idesc').val(tdesc)
      $('#idi').val(tidi)

      $(this).parent().parent().remove();
    })


    $(document).on('click', '.del_idi', function() {

      $('#idesc').val("")
      $('#idi').val("")
    });

    $(document).on('keyup', '#realprice', function() {
      let price = $(this).val()
      $('#sellprice').val(price * 1.2);
    })

  });
</script>