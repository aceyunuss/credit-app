<div class="row">
  <div class="col-xl-12 order-xl-1">

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
            <h3 class="mb-0"><strong><?= $criteria['code'] ?></strong> - <?= $criteria['desc'] ?></h3>
          </div>
        </div>
      </div>
      <div class="card-body">

        <form method="POST" action="<?= site_url('assessmentcriteria/submiteditindex') ?>">
          <input type="hidden" value="<?= $criteria['id'] ?>" name="cid">

          <div class="pl-lg-5">

            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Deskripsi</label>
                  <input type="text" id="idesc" class="form-control idxform" value="">
                  <input type="hidden" id="idx" class="form-control idxform" value="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-2">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Nilai</label>
                  <input type="number" id="ival" class="form-control idxform" value="" max-length="3">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <center>
                  <button type="button" class="btn btn-outline-info add_idx">Tambah</button>
                  <button type="button" class="btn btn-outline-danger del_idx">Hapus</button>
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
                        <th scope="col">#</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Nilai</th>
                      </tr>
                    </thead>
                    <tbody class="tbl_idx">
                      <?php foreach ((array)$idx_list as $k => $v) { ?>
                        <tr data-row='<?= $k+1 ?>'>
                          <td class='xaf' align='center'>
                            <button type='button' class='btn btn-sm btn-warning edit_idx'><i class='ni ni-fat-delete'></i></button>
                            <input type='hidden' class='idx_<?= $k+1 ?>' name='idx[]' value='<?= $v["id"] ?>'>
                          </td>
                          <td class='nm'>
                            <input type='hidden' class='desc_<?= $k+1 ?>' name='desc[]' value='<?= $v["desc"] ?>'><?= $v['desc'] ?>
                          </td>
                          <td class='vl' align='center'>
                            <input type='hidden' class='val_<?= $k+1 ?>' name='val[]' value='<?= $v["index"] ?>'><?= $v['index'] ?>
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

        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $('.add_idx').click(function() {

      let d = $('#idesc').val()
      let v = $('#ival').val()
      let i = $('.tbl_idx tr').length + 1;
      let idx = $('#idx').val()

      if (d == "" || v == "") {

        alert("Deskripsi dan nilai harus diisi");

      } else if (v > 100) {

        alert("Nilai maksimal 100")

      } else {

        ext = checkRowVal(v)

        if (ext) {
          alert("Tidak dapat memasukkan nilai yang sama");

        } else {

          let rw = "<tr data-row='" + i + "'>\
                      <td class='bttn' align='center'>\
                        <button type='button' class='btn btn-sm btn-warning edit_idx'><i class='ni ni-fat-delete'></i></button>\
                        <input type='hidden' class='idx_" + i + "' name='idx[]' value='" + idx + "'>\
                      </td>\
                      <td class='nm'>\
                        <input type='hidden' class='desc_" + i + "' name='desc[]' value='" + d + "'>" + d + "\
                      </td>\
                      <td class='vl' align='center'>\
                        <input type='hidden' class='val_" + i + "' name='val[]' value='" + v + "'>" + v + "\
                      </td>\
                    </tr>";

          $('.tbl_idx').append(rw)

          $('.idxform').val("")

        }
      }
    })


    function checkRowVal(tv) {

      let ret = false

      $('.tbl_idx tr').each(function(a, b) {
        let value = $('.vl', b).text();
        if (value == tv) {
          ret = true
        }
      });

      return ret
    }


    $(document).on('click', '.edit_idx', function() {

      rowid = $(this).parent().parent().data('row');
      tdesc = $('.desc_' + rowid).val();
      tval = $('.val_' + rowid).val();
      tidx = $('.idx_' + rowid).val();
      
      $('#idesc').val(tdesc)
      $('#ival').val(tval)
      $('#idx').val(tidx)

      $(this).parent().parent().remove();
    })


    $(document).on('click', '.del_idx', function() {

      $('#idesc').val("")
      $('#ival').val("")
      $('#idx').val("")
    });

  });
</script>