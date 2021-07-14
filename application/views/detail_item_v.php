<div class="row">
  <div class="col-xl-12 order-xl-1">
    <form action="<?= site_url('item/submititem') ?>" method="POST" enctype="multipart/form-data">

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
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Kode</label>
                  <input type="text" class="form-control" name="code" maxlength="10">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Harga</label>
                  <input type="number" class="form-control" name="price">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">DP</label>
                  <input type="number" class="form-control" name="dp">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Gambar</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="item" required>
                    <label class="custom-file-label">Select file</label>
                  </div>
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

  });
</script>