<div class="row">
  <div class="col-xl-12 order-xl-1">

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
          <input type="hidden" value="4" name="user_id">

          <div class="pl-lg-5">

            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Deskripsi</label>
                  <input type="text" id="idesc" class="form-control idxform" value="" name="name">
                  <input type="hidden" id="idx" class="form-control idxform" value="" name="ix">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-2">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Nilai</label>
                  <input type="number" id="ival" class="form-control idxform" value="" max-length="3" name="email">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <center>
                  <button type="button" class="btn btn-outline-info add_idx">Tambah</button>
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
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Nilai</th>
                      </tr>
                    </thead>
                    <tbody class="tbl_idx">

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
      let i = $('#idx').val() == "" ? $('.tbl_idx tr:last').length + 9000 : $('#idx').val()
      console.log(i)

      if (d == "" || v == "") {

        alert("Deskripsi dan nilai harus diisi");

      } else if (v > 100) {

        alert("Nilai maksimal 100")

      } else {

        ext = checkRowVal(v)

        if (ext) {
          alert("Tidak dapat memasukkan nilai yang sama");

        } else {

          let rw = "<tr>\
                      <td class='nm'>\
                        <input type='hidden' name='desc[]' value='" + d + "'>" + d + "\
                        <input type='hidden' name='idx[]' value='" + i + "'>\
                      </td>\
                      <td class='vl' align='center'>\
                        <input type='hidden' name='val[]' value='" + v + "'>" + v + "\
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

  });
</script>