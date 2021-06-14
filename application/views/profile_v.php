<div class="row">
  <div class="col-xl-4 order-xl-2">
    <div class="card card-profile">
      <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
          <div class="card-profile-image">
            <a href="#">
              <img src="<?= base_url('assets/img/theme/default-pict.jpg') ?>" class="rounded-circle">
            </a>
          </div>
        </div>
      </div>
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-between">
        </div>
      </div>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center">
              <div>
                <span class="heading text-success">22</span>
                <span class="description">Disetujui</span>
              </div>
              <div>
                <span class="heading text-primary">10</span>
                <span class="description">Pengajuan</span>
              </div>
              <div>
                <span class="heading text-danger">89</span>
                <span class="description">Ditolak</span>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
          <h5 class="h2"> <?= $profile['fullname'] ?> </h5>
          <div class="h5 badge badge-primary">
            <?= $profile['role'] ?>
          </div>
          <div class="h5 mt-4">
            Terdaftar sejak <?= substr($profile['created_date'], 0, 10) ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-8 order-xl-1">
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
          <div class="col-8">
            <h3 class="mb-0">Edit profil</h3>
          </div>
        </div>
      </div>
      <div class="card-body">

        <form method="POST" action="<?= site_url('auth/submitEditProfile') ?>">
          <input type="hidden" value="<?= $profile['id'] ?>" name="user_id">

          <div class="pl-lg-5">
            <div class="row">
              <div class="col-lg-11">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Nama</label>
                  <input type="text" id="input-username" class="form-control" value="<?= $profile['fullname'] ?>" name="name">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Email</label>
                  <input type="email" id="input-email" class="form-control" value="<?= $profile['email'] ?>" name="email">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">No Telp</label>
                  <input type="text" id="input-first-name" class="form-control" value="<?= $profile['phone'] ?>" name="phone">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Alamat</label>
                  <textarea rows="4" class="form-control" name="addr"><?= $profile['address'] ?></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Tanggal Lahir</label>
                  <input class="form-control" placeholder="dob" type="datetime-local" name="dob" value="<?= str_replace(' ', 'T', $profile['birthdate']) ?>" name="dob" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-11">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Jenis Kelamin</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="gender">
                    <option disabled="">Jenis Kelamin</option>
                    <option <?= $profile['gender'] == 'm' ? 'selected' : '' ?> value="m">Laki-laki</option>
                    <option <?= $profile['gender'] == 'f' ? 'selected' : '' ?> value="f">Perempuan</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <center>
            <button type="submit" class="btn btn-info mt-5">Ubah</button>
          </center>
          &nbsp;
        </form>
      </div>
    </div>
  </div>
</div>